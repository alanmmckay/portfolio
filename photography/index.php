<?php

$normalize = '../normalize.css';

$style = '../style.css';

$canonical = 'https://alanmckay.blog/photography/';

$title = 'Alan McKay | Photography';

$meta['title'] = 'Alan McKay | Photography';

$meta['description'] = '';

$meta['url'] = 'https://alanmckay.blog/photography/';

$relative_path = "../";

include('../header.php');

//vsco: width == 1012 kicks into displaying 5 in a row
//      width ==  768 kicks into displaying 4 in a row
//      width ==  543 kicks into displaying 3 in a row
//    Each column has display:grid; There exists a container of the columns that
//      has the same display property. The width of these columns sets the width
//      of the images via percentages and application of max-width.

// . Do a preliminary load of n images, where n is the max amount of columns.
// . Calculate the height of the smallest column
//      - This is a compound measurement of the height values of each image
//          within the column.
// . When a resize occurs which adds a new column, recalculate height of the
//      smallest column.
//      - Rebucket the images in the grid with respect to new quantity of cols
// . When the viewport is determined to be at a point where more images should
//      be loaded, add the next image to the col with the smallest height, re-
//      calculate the smallest column.

//I want to have fade-in animations for the new images being loaded. This can
//  be accomplished by creating a new figure tag whose display is initially set
//  to none.

//Would like to have a buffer of images loaded in which aren't displayed, and
//  the view-port trigger displays these images then loads in a new buffer.

//Need to consider the images.json file with respect to finding the order to
//  to load in these images. Should also create my own manifest datastructure.
?>
        <section id='writingsWrapper'>
            <section>
                <article>

                    <section class='info'>
                        <header>
                            <h2>Preface</h2>
                        </header>
                        <p>

                        </p>
                    <hr>
                    </section>

                    <header>
                        <h1>Photography</h1>
                    </header>
                    <div class='image-gallery' style='display:grid;grid-template-columns: repeat(3, minmax(0px,1fr));align-items:start;'>
                        <div class='image-col' style='display:grid;grid-template-columns: minmax(0px,1fr);'>
                        </div>
                        <div class='image-col' style='display:grid;grid-template-columns: minmax(0px,1fr);'>
                        </div>
                        <div class='image-col' style='display:grid;grid-template-columns: minmax(0px,1fr);'>
                        </div>
                    </div>
                    <section class='info'>
                        <hr>
                        <h3>Concluding notes</h3>
                        <p>

                        </p>
                        <hr>
                    </section>

                </article>
                <nav>
                    <a href='../'>Back</a>
                </nav>
            </section>
        </section>
        <script>
            var manifest;
            var load_flag = true;
            var manifest_tracker = 0;
            var columns = document.getElementsByClassName('image-col');
            var grid = document.getElementsByClassName('image-gallery')[0];

            async function get_manifest(){
                let manifest_response = await fetch("./manifest.json");
                if (manifest_response.ok){
                    let manifest_result = await manifest_response.json();
                    return manifest_result;
                }
            }

            function isFigureBottom(fig_object){
                fig_height = fig_object.getBoundingClientRect().height;
                fig_top = fig_object.getBoundingClientRect().top;
                if((window.innerHeight * .95)-fig_top > 0){ 
                    return true;
                }else{
                    return false;
                }
            }

            function isColBottom(col_object){
                col_height = col_object.getBoundingClientRect().height;
                if((window.pageYOffset + window.innerHeight) > (grid.getBoundingClientRect().y + col_height)){
                    return true;
                }else{
                    return false;
                }
            }

            var col_map = [];
            for(i=0;i<columns.length;i++){
                col_map[i] = [];
                col_map[i]['loaded'] = 0;
                col_map[i]['displayed'] = -1;
            }

            function create_new_figure(manifest_id,init_style){
                const figure = document.createElement('figure');
                figure.style['border-top'] = init_style['border-top'];
                figure.style['opacity'] = init_style['opacity'];

                const image = document.createElement('img');
                image.src = 'images/'+manifest_id;
                figure.appendChild(image);

                return figure;
            }

            var load_count = 0;
            var display_count = 0;

            function grid_load_agent(){
                //Manifest tracker keeps count of quantity of items pulled from manifest:
                let init_manifest = (manifest_tracker);
                //Grab the size of the manifest regardless of pull:
                manifest_size = Object.keys(manifest).length;
                //Check whether we've run out of images to load:
                if(manifest_tracker < manifest_size){
                    //Ensure the amount of columns does not cause us to overdraft:
                    if( (manifest_tracker+columns.length) >= manifest_size){
                        boundary = manifest_size - manifest_tracker;
                    }else{
                        boundary = columns.length;
                    }

                    //If the grid_display_agent has flagged that we need to grab more images:
                    if(load_flag){
                        console.log('difference: ' + ((load_count) - display_count));
                        //A check to ensure that we don't grab too many images beyond the viewport boundary:
                        if((load_count - display_count) <= 6){
                            console.log('loading!');
                            //Increment program's load_counter:
                            load_count = load_count + boundary;

                            //A to-be-ordered list of height values for each figure loaded:
                            height_list = []
                            //A mapping of figure objects such that the key is it's height:
                            figure_map = [];
                            //A to-be-ordered list of height values with respect to the columns being used for display:
                            col_h_list = [];
                            //A mapping of column objects such that a key is a column's height:
                            col_h_map = [];

                            //Iterate an amount of times equivalent to amount of images being buffered:
                            for(i=0;i<boundary;i++){

                                //Grab the next image from the manifest:
                                reference = manifest[init_manifest+i];

                                //Unecessary check; simply forces the initial set of images to not have animated transition:
                                if(manifest_tracker - columns.length < 0){
                                    new_figure_data = {
                                                        'object':create_new_figure(reference['file_name'],{'border-top':'solid 0px white','opacity':0}),
                                                        'height':reference['height']
                                                    }
                                }else{
                                    new_figure_data = {
                                                        'object':create_new_figure(reference['file_name'],{'border-top':'solid 25px white','opacity':0}),
                                                        'height': reference['height']
                                                    }
                                }

                                //Create height buckets within the figure map - accounts for images that may have the same height:
                                if (Object.keys(figure_map).includes(new_figure_data['height'].toString())){
                                    figure_map[new_figure_data['height'].toString()].push(new_figure_data['object']);
                                }else{
                                    figure_map[new_figure_data['height'].toString()] = [];
                                    figure_map[new_figure_data['height'].toString()].push(new_figure_data['object']);
                                }
                                height_list.push(new_figure_data['height']);
                                col_map[i]['loaded'] += 1; //col_map tracks amount of images loaded and displayed for each column.
                                manifest_tracker += 1;
                            }

                            //position the program to iterate through the figure height values by order of height values:
                            height_list.sort(function(a,b){
                                return b-a
                            });

                            for(i=0;i<columns.length;i++){
                                column_height = columns[i].getBoundingClientRect().height;
                                col_h_list.push(column_height);
                                if(Object.keys(col_h_map).includes(column_height.toString())){
                                    col_h_map[column_height].push(i);
                                }else{
                                    col_h_map[column_height] = [];
                                    col_h_map[column_height].push(i);
                                }
                            }

                            col_h_list.sort(function(a,b){
                                return a-b
                            });

                            console.log(col_h_list);
                            iteration_index = 0;
                            figure_index = height_list[iteration_index];
                            height_selection = figure_map[figure_index];
                            while(iteration_index < boundary){
                                //allow iteration of multiple columns with the same height:
                                console.log('col selectins: ');
                                for(i=0;i<height_selection.length;i++){
                                    //Grab the height-value of the next-smallest colulmn:
                                    col_index = col_h_list[iteration_index];
                                    //Get the index of the column with respect to the columns collection:
                                    col_index = col_h_map[col_index].pop()
                                    //Grab the next figure of the current height:
                                    figure = height_selection[i]
                                    console.log(col_index);
                                    columns[col_index].appendChild(figure);
                                    iteration_index += 1;
                                }
                                figure_index = height_list[iteration_index];
                                height_selection = figure_map[figure_index];
                            }

                            setTimeout(grid_display_agent,500);
                        }else{
                            console.log('no load!');
                        }
                    }
                }
            }
            
           
            function grid_display_agent(){
                load_flag = false;
                for(i=0;i<columns.length;i++){
                    col = columns[i];
                    figures = col.getElementsByTagName('figure');
                    for(j=Math.max(0,col_map[i]['displayed']);j<col_map[i]['loaded'];j++){
                        figure = figures[j];
                        if(isFigureBottom(figure)){
                            figure.style['opacity'] = 1;
                            figure.style['border-top'] = 'solid white 5px';
                            col_map[i]['displayed'] += 1;
                            load_flag = true;
                            display_count = display_count + 1;
                            console.log('display count: ' + display_count);
                            console.log('load count: ' + load_count);
                        }else{
                            load_flag = load_flag || false;
                        }
                    }
                }
                if(load_flag){
                    grid_load_agent();
                }
            }


            var parse_manifest;

            window.onscroll = function(){
                grid_display_agent();
                console.log(manifest_tracker);
                //need to add a logic that checks to see if a user has scrolled to the bottom of the page;
                //  if so, then switch the load_flag to true and call the load_agent.
            }

            window.addEventListener('load', function () {
                //grid_display_agent();
                get_manifest().then(function(result){
                    manifest = result;
                    parse_manifest = function(){
                        grid_load_agent();
                        grid_display_agent();
                    }
                    parse_manifest();
                 });
            });



        </script>
    </body>
</html>

