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
                    <div id='galleries'>

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
        <script src='manifest.js'></script>
        <script>

            // --- --- --- Declarations --- --- --- //

            // JSON object which houses image information:
            //var manifest;

            var max_column_size = 4;
            // Integer array to determine amount of entries of the manifest that have been considered for a given column:
            var manifest_trackers = [];
            // Integer array to determine how many images have been loaded for a given column:
            var load_counts = []
            // Integer array to determine how many images have been displayed for a given column:
            var display_counts = []

            // --- --- --- //
            // Priming the above arrays:
            for(i=0;i<max_column_size;i++){
                manifest_trackers.push(0);
                load_counts.push(0);
                display_counts.push(0);
            }
            // -- -- -- //

            // Array to keep track of the heights of each column context:
            var column_heights = [];

            // --- --- --- //
            // Priming column_heights:
            for(i=0;i<max_column_size;i++){
                column = []
                for(j=0;j<=i;j++){
                    column.push(0);
                }
                column_heights.push(column);
            }
            // -- -- -- //

            // Array to track quantity of figures that have been loaded and the quantity of figures that have been displayed for a given grid:
            var col_maps = [];

            // --- --- --- //
            // Priming col_maps:
            for(i=0;i<max_column_size;i++){
                col_map = [];
                for(j=0;j<(i+1);j++){
                    col_map[j] = [];
                    col_map[j]['loaded'] = 0;
                    col_map[j]['displayed'] = -1;
                }
                col_maps.push(col_map);
            }
            // -- -- -- //

            // Switch to determine whether or not more images should be loaded:
            var load_flag = true;
            
            // --- --- --- //
            //Block of logic to create the divs that house the grids of each column length:
            grids_html = document.getElementById('galleries');
            for(i=0;i<max_column_size;i++){
                const grid = document.createElement('div');
                grid.setAttribute('class','image-gallery');
                // TODO: Create a css class for the folowing properties:
                grid.style['display'] = 'grid';
                grid.style['grid-template-columns'] = 'repeat('+(i+1)+', minmax(0px,1fr))';
                grid.style['align-items'] = 'start';
                grid.style['height'] = '0px';
                grid.style['overflow'] = 'scroll';
                for(j=0;j<=i;j++){
                    const column = document.createElement('div');
                    column.setAttribute('class','image-col');
                    column.style['display'] = 'grid';
                    column.style['grid-template-columns'] = 'minmax(0px,1fr)';
                    grid.appendChild(column);
                }
                grids_html.appendChild(grid);
            }
            // -- -- -- //

            // Array of the html elements that act as grids for each set of columns:
            var grids = document.getElementsByClassName('image-gallery');
            // The current active grid; 1-based index:
            var active_grid;

            // --- --- --- ------------ --- --- --- //

            async function get_manifest(){
                /*let manifest_response = await fetch("./manifest.json");
                if (manifest_response.ok){
                    let manifest_result = await manifest_response.json();
                    return manifest_result;
                }*/
                return manifest;
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

            function create_new_figure(manifest_id,init_style){
                const figure = document.createElement('figure');
                figure.style['border-top'] = init_style['border-top'];
                figure.style['opacity'] = init_style['opacity'];
                figure.setAttribute('data_height',init_style['height']);
                const image = document.createElement('img');
                image.src = 'thumbnails/'+manifest_id;
                figure.appendChild(image);

                return figure;
            }

            
            // This agent does **batch** loading of images. It makes decisions based on
            //  the **grouping** of images being loaded in. This is said to refute the notion
            //  of abstracting responsibilities of creation to something more finite.
            async function grid_load_agent(grid_selection){//grid_selection is not zero-based
                //Manifest tracker keeps count of quantity of items pulled from manifest:
                //columns = grids[(grid_selection-1)].children;
                //console.log('grid_selection: '+grid_selection);
                let manifest_tracker = manifest_trackers[grid_selection-1];
                //console.log('manifest_tracker: '+ manifest_tracker);
                let init_manifest = (manifest_tracker);
                //console.log('init_manifest: '+init_manifest);
                let columns = grids[grid_selection-1].children
                //Grab the size of the manifest regardless of pull:
                manifest_size = Object.keys(manifest).length;
                //Check whether we've run out of images to load:
                if(manifest_tracker < manifest_size){
                    //Ensure the amount of columns does not cause us to overdraft:
                    if( (manifest_tracker+grid_selection) >= manifest_size){
                        boundary = manifest_size - manifest_tracker;
                    }else{
                        boundary = grid_selection;
                    }

                    //If the grid_display_agent has flagged that we need to grab more images:
                    if(load_flag){
                        load_count = load_counts[grid_selection-1];
                        display_count = display_counts[grid_selection-1];

                        //console.log('difference: ' + ((load_count) - display_count));
                        //A check to ensure that we don't grab too many images beyond the viewport boundary:
                        if((manifest_tracker - display_count) <= max_column_size){
                            //console.log('loading!');
                            //Increment program's load_counter:
                            load_count = load_count + boundary;
                            load_counts[grid_selection-1] = load_count;
                            //A to-be-ordered list of height values for each figure loaded:
                            height_list = [];
                            //A mapping of figure objects such that the key is it's height:
                            figure_map = {};
                            //A to-be-ordered list of height values with respect to the columns being used for display:
                            col_h_list = [];
                            //A mapping of column objects such that a key is a column's height:
                            col_h_map = {};

                            //Iterate an amount of times equivalent to amount of images being buffered:
                            for(i=0;i<boundary;i++){

                                //Grab the next image from the manifest:
                                reference = manifest[init_manifest+i];

                                //Unecessary check; simply forces the initial set of images to not have animated transition:
                                if(manifest_tracker - grid_selection < 0){
                                    new_figure_data = {
                                                        'object':create_new_figure(reference['webp_file'],{'border-top':'solid 0px white','opacity':0, 'height':reference['height']}),
                                                        'height':reference['height']
                                                    };
                                }else{
                                    new_figure_data = {
                                                        'object':create_new_figure(reference['webp_file'],{'border-top':'solid 25px white','opacity':0, 'height':reference['height']}),
                                                        'height': reference['height']
                                                    };
                                }

                                //Create height buckets within the figure map - accounts for images that may have the same height:
                                if (Object.keys(figure_map).includes(new_figure_data['height'].toString())){
                                    figure_map[new_figure_data['height'].toString()].push(new_figure_data['object']);
                                }else{
                                    figure_map[new_figure_data['height'].toString()] = [];
                                    figure_map[new_figure_data['height'].toString()].push(new_figure_data['object']);
                                }
                                height_list.push(new_figure_data['height']);
                                col_maps[grid_selection-1][i]['loaded'] += 1; //col_map tracks amount of images loaded and displayed for each column.
                                manifest_tracker += 1;
                            }

                            manifest_trackers[grid_selection-1] = manifest_tracker;
                            //position the program to iterate through the figure height values by order of height values:
                            height_list.sort(function(a,b){
                                return b-a;
                            });

                            for(i=0;i<grid_selection;i++){
                                column_height = columns[i].getBoundingClientRect().height//column_heights[(grid_selection-1).toString()][i];
                                col_h_list.push(column_height);
                                if(Object.keys(col_h_map).includes(column_height.toString())){
                                    col_h_map[column_height.toString()].push(i);
                                }else{
                                    col_h_map[column_height.toString()] = [];
                                    col_h_map[column_height.toString()].push(i);
                                }
                            }

                            col_h_list.sort(function(a,b){
                                return a-b;
                            });

                            iteration_index = 0;
                            figure_index = height_list[iteration_index];
                            height_selection = figure_map[figure_index];
                            while(iteration_index < boundary){
                                //allow iteration of multiple columns with the same height-tier:
                                for(i=0;i<height_selection.length;i++){
                                    //Grab the height-value of the next-smallest colulmn:
                                    col_index = col_h_list[iteration_index];
                                    //Get the index of the column with respect to the columns collection:
                                    col_index = col_h_map[col_index].pop();
                                    //Grab the next figure of the current height-tier:
                                    figure = height_selection[i];
                                    columns[col_index].appendChild(figure);
                                    column_heights[grid_selection-1][col_index] += figure_index;
                                    iteration_index += 1;
                                }
                                figure_index = height_list[iteration_index];
                                height_selection = figure_map[figure_index];
                            }
                            setTimeout(function(){
                                grid_display_agent(grid_selection).then(function(){
                                    load_flag = false;
                                })
                            },750);
                        }else{
                            //console.log('no load!');
                        }
                    }
                }
            }
            
            function readjust_columns(grid_selection){
                if(grid_selection != active_grid){
                    active_grid = grid_selection;
                    for(i=0;i<max_column_size;i++){
                        grid = grids[i];
                        if((i+1) == active_grid){
                            grid.style.height = null;
                            grid.style.overflow = null;;
                        }else{
                            grid.style.height = '0px';
                            grid.style.overflow = 'scroll';
                        }
                    }
                    grid_load_agent(grid_selection).then(grid_display_agent(grid_selection));
                }
            }

            async function grid_display_agent(grid_selection){
                load_flag = false;
                for(i=0;i<grid_selection;i++){
                    col = grids[grid_selection-1].children[i];
                    figures = col.getElementsByTagName('figure');
                    for(j=Math.max(0,col_maps[grid_selection-1][i]['displayed']);j<Math.min(figures.length,col_maps[grid_selection-1][i]['loaded']);j++){
                        figure = figures[j];
                        if(isFigureBottom(figure)){
                            //console.log('flag flagged');
                            figure.style['opacity'] = 1;
                            figure.style['border-top'] = 'solid white 5px';
                            col_maps[grid_selection-1][i]['displayed'] += 1;
                            load_flag = true;
                            display_counts[grid_selection-1] = display_counts[grid_selection-1] + 1;
                            //console.log('display count: ' + display_counts[grid_selection-1]);
                            //console.log('load count: ' + load_counts[grid_selection-1]);
                        }else{
                            load_flag = load_flag || false;
                        }
                    }
                }
                if(load_flag){
                    grid_load_agent(grid_selection).then(function(){
                        load_flag = false;
                    });
                }
            }

            window.onscroll = function(){
                setTimeout(function(){
                    grid_load_agent(active_grid).then(
                    grid_display_agent(active_grid));
                    for(i=1;i<=max_column_size;i++){
                        if(i != active_grid){
                            grid_load_agent(i).then(
                            grid_display_agent(i));
                        }
                    }
                }, 750);
            }

            window.onresize = function(){
                //   0 <= x <= 400  -> one col;
                // 400 <  x <= 542  -> two col;
                // 542 <  x <= 768  -> three col;
                // 768 <  x <= 1012 -> four call;
                //1012 <  x         -> five col;
                container = document.getElementById('writingsWrapper');
                container_width = container.getBoundingClientRect().width;
                if(isMobile){
                    max_column_size = 3;
                    if(container_width <= 400){
                        readjust_columns(1);
                    }else if(container_width > 400 && container_width <= 542){
                        readjust_columns(2);
                    }else if(container_width > 542){
                        readjust_columns(3);
                    }
                }else
                if(container_width <= 400){
                    readjust_columns(1);
                }else if(container_width > 400 && container_width <= 542){
                    readjust_columns(2);
                }else if(container_width > 542 && container_width <= 768){
                    readjust_columns(3);
                }else if(container_width > 768){
                    readjust_columns(4);
                }
                if(old_height < window.innerHeight){
                    grid_load_agent(active_grid).then(grid_display_agent(active_grid));
                }
                old_height = window.innerHeight;
            }

            var parse_manifest;
            var old_height = 0;

            var isMobile = window.matchMedia || window.msMatchMedia;
            isMobile = isMobile("(pointer:coarse)").matches;

            window.addEventListener('load', function () {
                container = document.getElementById('writingsWrapper');
                container_width = container.getBoundingClientRect().width;
                if(isMobile){
                    max_column_size = 3;
                    if(container_width <= 400){
                        active_grid = 1;
                    }else if(container_width > 400 && container_width <= 542){
                        active_grid = 2;
                    }else if(container_width > 542){
                        active_grid = 3;
                    }
                }else
                if(container_width <= 400){
                    active_grid = 1;
                }else if(container_width >400 && container_width <= 542){
                    active_grid = 2;
                }else if(container_width > 542 && container_width <= 768){
                    active_grid = 3;
                }else if(container_width > 768){
                    active_grid = 4;
                }
                grids[active_grid-1].style['overflow'] = 'inherit';
                grids[active_grid-1].style['height'] = 'inherit';
                get_manifest().then(function(result){
                    manifest = result;
                    parse_manifest = function(){
                        grid_load_agent(active_grid).then(
                        grid_display_agent(active_grid));
                        for(i=1;i<=max_column_size;i++){
                            if(i != active_grid){
                                load_flag = true;
                                grid_load_agent(i).then(
                                grid_display_agent(i));
                            }
                        }
                    }
                    parse_manifest();
                    old_height = window.innerHeight;
                 });
            });

        </script>
    </body>
</html>

