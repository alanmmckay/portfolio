<?php

$canonical = 'https://alanmckay.blog/projects/social/';

$title = 'Alan McKay | Project | Social Computing';

$meta['title'] = 'Alan McKay | Social Computing';

$meta['description'] = 'Exploration of data science methodology to explore and explain social behaviors exhibited within the domain of social media networks.';

$meta['url'] = 'https://alanmckay.blog/projects/social/';

$relative_path = "../../";

include('../../header.php');

produce_front_matter("Social Computing","Projects");
?>
                    <section class='info'>
                        <header>
                            <h2>Preface</h2>
                        </header>
                        <p>
                            The final semester of my Master's degree had me taking a course called Web Mining. Admittedly, I was fatigued at the time of registering for this course, which motivated my registration as the course's description reminded me of one that I took as an undergrad student - Information Storage and Retrieval (ISR).
                        </p>

                        <p>
                            ISR covered document representation and how to provide query mechanisms for groupings of texts. Typical search engine fodder involving scoring and term weighting which would then culminate into discussions of the vector space model. The course project was to build a crawler to collect and represent texts taken from <a href='http://shakespeare.mit.edu/' target="_blank" rel="noopener noreferrer">MIT's collection of Shakespeare writings</a>.
                        </p>

                        <blockquote>
                            Natural language processing; analysis of textual material by statistical, syntactic, and logical methods; retrieval systems models, dictionary construction, query processing, file structures, content analysis; automatic retrieval systems and question-answering systems; and evaluation of retrieval effectiveness. <cite>- Verbatim course description from the University of Northern Iowa</cite>
                        </blockquote>

                        <p>
                            ISR was fascinating as it gave insight to how complex data search can work. One invaluable resource to helping build an intuition for the subject was supplementary lecture provided by Victor Lavrenko through <a href='https://www.youtube.com/user/victorlavrenko' target="_blank" rel="noopener noreferrer">at his Youtube Channel</a>. Specifically, his lecture series labeled <a href='https://www.youtube.com/playlist?list=PLBv09BD7ez_77rla9ZYx-OAdgo2r9USm4' target="_blank" rel="noopener noreferrer">ISR3 Vector Space Model</a>. This supplement also complemented thorough reading from "<a href='https://nlp.stanford.edu/IR-book/' target="_blank" rel="noopener noreferrer">Introduction to Information Retrieval</a>" authored by Manning, Raghavan, and Schütze. The textbook would also be a required reading within Web Mining, where a good chunk of time was also spent discussing language models and how to represent texts.
                        </p>

                        <p>
                            Web Mining would turn out to be a deceptive course title. It differed from ISR by the exclusion of a project in which one would build a web crawler to harvest information. The course instead revolved around reading various research papers involving the processing of big data while interpreting the results said data provided. These papers asked questions such as "How has happiness shifted since a given event?" or "How does misinformation spread throughout social media communities?"
                        </p>

                        <blockquote>
                            Core methods underlying development of applications on the Web; examples of relevant applications, including those pertaining to information retrieval, summarization of Web documents, and identifying social networks. <cite>- Verbatim course description from the University of Iowa</cite>
                        </blockquote>

                        <p>
                            To answer these types of questions, one needs a basic understanding of network science. Network science is the study of complex networks; In the context of this course, it was an application of social computing to understand how networks of humans interact. It provides the understanding of scale-free networks and how they have a power-law distribution. These were concepts unknown to me prior to taking the course, which provided a pleasant surprise in terms of giving something new and interesting to study.
                        </p>

                        <p>
                            To provide a basic understanding, "<a href='http://www.networksciencebook.com/' target="_blank" rel="noopener noreferrer">Network Science</a>" authored by <a href='https://barabasi.com/' target="_blank" rel="noopener noreferrer">Albert-László Barabási</a> was used. The chapters on graph theory, random networks, and the scale-free property provide a great resource in terms of understanding complex social networks. Additionally, <a href='http://www.leonidzhukov.net/hse/2020/datascience/' target="_blank" rel="noopener noreferrer">Leonid Zhukov's</a> <a href='https://www.youtube.com/playlist?list=PLriUvS7IljvkGesFRuYjqRz4lKgodJgh2' target="_blank" rel="noopener noreferrer">lecture series on YouTube</a> discussing Network Science was another invaluable resource.
                        </p>

                        <p id='note_origin'>
                            An assigned project that I found interesting involved assigning each student a web scrape from a social network. Each student was ambiguously tasked to analyze the data. Below is the result of data analysis that I personally drew from the dataset. I feel this is worth sharing to help those who have a genuine interest in the subject understand the processes involved.<a href='#note'>*</a>
                        </p>
                    <hr>
                    </section>
                    <header>
                        <h1>Project: Social Computing</h1>
                    </header>
                    <p>
                        Consider a dataset which describes interactions between Reddit users for two different subreddits during the span of a specific month.
                        <ul>
                            <li>
                                The given dataset is given as a file which is formatted as an adjacency list. Each line of the file is represented as such: <code>User1, User2, User3, ... Userx\n</code> where User1 replied to a comment made by User2 and another one by User3, and every user up to and including Userx.
                            </li>
                        </ul>
                    </p>

                    <p>
                        Many different software solutions can be chosen for analysis. Gephi is one that is often recommended. Personal experience has found that Gephi is limited; It is handy for network visualization and generating a set of metrics which are indeed indicative of the properties of the network. Unfortunately, there seems to be no mechanism to display the calculated metrics using different scaling factors for any given scatterplot graph. For example, displaying a degree distribution graph in log-log scale doesn't seem to be an available option. To account for this, Python was leveraged, taking advantage of the <code>matplotlib</code>, <code>numpy</code>, and <code>powerlaw</code> libraries.
                        <ul>
                            <li>
                                <code>numpy</code> arrays are used to interface with <code>matplotlib.pyplot</code> and <code>powerlaw</code>.
                            </li>
                            <li>
                                <code>powerlaw</code> allows the generation of a fitting function for a bin of data. It can also generate relevant alpha values, (the gamma value with respect to the textbook used in this class), for a power-law distribution function. <code>powerlaw</code> also interfaces with matplotlib to allow visual representation of these functions.
                                <ul>
                                    <li>
                                        Relevant class methods are <code>powerlaw.Fit</code> and <code>powerlaw.plot_pdf</code>. Relevant instance methods are <code>powerlaw.Fit(&lt;args&gt;).plot_pdf</code>. Relevant instance variables are <code>powerlaw.Fit(&lt;args&gt;).alpha</code>.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <code>matplotlib.pyplot</code> allows plotting of arrays as scatterplot. It has scaling methods to allow for the display of some graph in log-log scale.
                            </li>
                        </ul>
                        The python files associated with this are ad hoc scripts leveraged to complete the required analysis.
                    </p>

                    <p>
                         It's worth elaborating on what is happening within the represention of the dataset. The existence of some edge in the adjacency list is a means of communication. Communication can be interpreted ambiguously. So it should also be noted that communication here is directed. The node that is representative of a list entry is replying to a comment made by a user within that list entry:
                         <ul>
                            <li>
                                User1 replied to a comment by User2 and another comment by User3;
                            </li>
                            <li>
                                Can be interpreted as (user1 -> user2) and (user1 -> user3)
                            </li>
                         </ul>
                         Thus, an entry of the adjacency list is indicative of the out-degree of a given node, (a node representing a user). In order to calculate the in-degree of the same node requires parsing through the adjacency list and taking note of how many times communication is directed towards it.
                    </p>

                    <p>
                        This was considered whilst initially examining the data. The initial dataset contains 17406 edges which connect 8129 nodes. While parsing through the data, it can be determined that the minimum out-degree is 1 and the minimum in-degree is 0. Likewise, the maximum out-degree is 203 while the maximum in-degree is 144. While examining the network as an undirected graph, the minimum degree is 1 and the maximum degree is 347.
                    </p>

                    <p>
                        How are the various degrees distributed? The following figures are indicative of distribution:
                    </p>

                    <div class='fig-col'>
                        <a href='./images/dist-outdeg.webp' target="_blank" rel="noopener noreferrer">
                            <figure class='graph'>
                                <img src='./images/dist-outdeg.webp' alt='A graph showing the distribution plotting of nodes in terms of out-degrees.'>
                                <figcaption>
                                    Figure 1: Distribution plotting of node out-degrees.
                                </figcaption>
                            </figure>
                        </a>


                        <a href='./images/dist-indeg.webp' target="_blank" rel="noopener noreferrer">
                            <figure class='graph'>
                                <img src='./images/dist-indeg.webp' alt='A graph showing the distribution plotting of nodes in terms of in-degrees.'>
                                <figcaption>
                                    Figure 2: Distribution plotting of node-indegrees.
                                </figcaption>
                            </figure>
                        </a>

                        <a href='./images/dist-degree.webp' target="_blank" rel="noopener noreferrer">
                            <figure class='graph' style='float:none'>
                                <img src='./images/dist-degree.webp' alt='A graph showing the distribution plotting of nodes in terms of both degrees.'>
                                <figcaption>
                                    Figure 3: Distribution plotting of node degrees (inbound and outbound)
                                </figcaption>
                            </figure>
                        </a>
                    </div>

                    <p style='clear:both;'>
                        The associated distribution function seems to be exponential in shape. What is this function? The proportion of some node having degree k must be k raised to a negative power: k<sup>-γ</sup>, with some constant factor, c. Discovering the value of this power can be made on the observation that kmax ≈ kmin * N<sup>(1/γ-1)</sup>, where N is the total number of nodes in the network.
                        <ul>
                            <li>
                                Algebraic manipulation can isolate gamma here with application of the logarithm manipulation rules. This generates an approximation of the exponent. The constant factor, c, can be discovered once gamma is found; c = (γ-1)*kmin<sup>-γ+1</sup>
                            </li>
                        </ul>
                        The powerlaw python library makes use of statistical binning to generate these values with respect to a continuous power-law distribution function:
                        <ul class='formulas'>
                            <li>
                                γ-out: 2.931904108581441; c-in: 1.931904108581441
                            </li>

                            <li>
                                γ-in: 2.586342073080467; c-in: 1.5863420730804672
                            </li>

                            <li>
                                γ-total: 2.0875259166393976; c-total: 1.0875259166393976
                            </li>
                        </ul>
                    </p>

                    <p>
                        With gamma values in hand, average expected degrees can be calculated, dependent on statistical moment. This occurs when gamma is in [2,3]. The formula used here is &lt;k&gt; = (γ-1)/(γ-2)*kmin
                        <ul class='formulas'>
                            <li>
                                &lt;kout&gt; ≈ 2.0730717793724676  ≈ &lt;kin&gt; ≈ &lt;k&gt;
                            </li>
                        </ul>
                        Average expected distance can also be computed:
                        <ul class='formulas'>
                            <li>
                                &lt;d&gt; ≈ lnlnN ≈ lnln(8129) ≈ 2.1975793137150044
                            </li>
                        </ul>
                        The actual values computed by Gephi are as such:
                        <ul>
                            <li>
                                &lt;k&gt;: 2.141
                            </li>

                            <li>
                                &lt;d&gt;: 7.07
                            </li>
                        </ul>
                    </p>

                    <p>
                        Curiously, there is a significant difference between the expected distance and the actual distance. This likely is due to the fact the sample set fits in the ultra-small-world regime and the slice taken from reddit doesn't represent the full expected picture.
                    </p>

                    <p>
                        To confirm a power-law distribution, these distributions can be plotted in a log-log scale. The following figures show that a power-law distribution is indeed in play. The light blue points represent the distribution plot. The dotted blue line overlayed by the red line is a plotting of the power-law distribution function (C*k<sup>-γ</sup>).
                    </p>
                    <div class='fig-col'>

                        <a href='./images/pldist-outdeg.webp' target="_blank" rel="noopener noreferrer">
                            <figure class='graph'>
                                <img src='./images/pldist-outdeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of out-degrees.'>
                                <figcaption>
                                    Figure 4: Log-log scale distribution plotting of node-out degrees
                                </figcaption>
                            </figure>
                        </a>

                        <a href='./images/pldist-indeg.webp' target="_blank" rel="noopener noreferrer">
                            <figure class='graph'>
                                <img src='./images/pldist-indeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of in-degrees.'>
                                <figcaption>
                                    Figure 5: Log-log scale distribution plotting of node-in degrees
                                </figcaption>
                            </figure>
                        </a>

                        <a href='./images/pldist-degree.webp' target="_blank" rel="noopener noreferrer">
                            <figure class='graph' style='float:none'>
                                <img src='./images/pldist-degree.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.'>
                                <figcaption>
                                    Figure 6: Log-log scale distribution plotting of node degrees (inbound and outbound)
                                </figcaption>
                            </figure>
                        </a>
                        <hr>

                    </div>

                    <p style='clear:both;'>
                        Random networks were generated to contrast this data. The algorithm that created these networks ensured the same node count and edge count. It also ensured there exists no node that does not have an edge – as is the case for the reddit data set. The distribution of these networks differ. Consider the following figures:
                    </p>

                    <div class='fig-col'>
                        <a href='./images/rdist-outdeg.webp' target="_blank" rel="noopener noreferrer">
                            <figure class='graph'>
                                <img src='./images/rdist-outdeg.webp' alt='A graph showing the distribution plotting of nodes in terms of out-degrees.'>
                                <figcaption>
                                    Figure 7: Distribution plotting of node out-degrees
                                </figcaption>
                            </figure>
                        </a>

                        <a href='./images/rdist-indeg.webp' target="_blank" rel="noopener noreferrer">
                            <figure class='graph'>
                                <img src='./images/rdist-indeg.webp' alt='A graph showing the distribution plotting of nodes in terms of in-degrees.'>
                                <figcaption>
                                    Figure 8: Distribution plotting of node in-degrees of Randomized Network
                                </figcaption>
                            </figure>
                        </a>

                        <a href='./images/rdist-degree.webp' target="_blank" rel="noopener noreferrer">
                            <figure class='graph' style='float:none;'>
                                <img src='./images/rdist-degree.webp' alt='A graph showing the distribution plotting of nodes in terms of both degrees.'>
                                <figcaption>
                                    Figure 9: Distribution plotting of node degrees (outbound and inbound) of Randomized Network
                                </figcaption>
                            </figure>
                        </a>
                    </div>

                    <p style='clear:both;'>
                        The distribution figures are similar for the other four randomized networks. This similarity holds true for the log-log scale plotting of the same data:
                    </p>

                    <a href='./images/plrdist-degree.webp' target="_blank" rel="noopener noreferrer">
                        <figure class='graph'>
                            <img src='./images/plrdist-degree.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.'>
                            <figcaption>
                                Figure 10: Power Law Distribution plotting of node degrees (inbound and outbound) of Randomized Network
                            </figcaption>
                        </figure>
                    </a>

                    <p>
                        The following table of figures are the log-log scale plotting of four other randomized networks, with respect to evaluating out-bound degree:
                    </p>

                    <figure class='col-fig'>

                        <a href='./images/rdist2-outdeg.webp' target="_blank" rel="noopener noreferrer">
                            <img src='./images/rdist2-outdeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.'>
                        </a>
                        <a href='./images/rdist3-outdeg.webp' target="_blank" rel="noopener noreferrer">
                            <img src='./images/rdist3-outdeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.'>
                        </a>
                        <a href='./images/rdist4-outdeg.webp' target="_blank" rel="noopener noreferrer">
                            <img src='./images/rdist4-outdeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.'>
                        </a>
                        <a href='./images/rdist5-outdeg.webp' target="_blank" rel="noopener noreferrer">
                            <img src='./images/rdist5-outdeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.'>
                        </a>

                        <figcaption style='clear:both;padding-top:25px'>
                            Figure 12: Power Law distribution plotting of outbound node degrees for four other randomized networks.
                        </figcaption>

                    </figure>

                    <p>
                        These distributions are Poisson/binomial. They do not allow for the reasonable probability of having nodes with large degrees, (degrees that approach kmax). This is emphasized by the values given in the x-axis. The maximum node degree here is anywhere from 7 to 9; much smaller than the maximum node degrees of the Reddit dataset. There seems to be a higher occurrence nodes with degree quantities close to the maximum as well. This is shown in the network representation of the involved data, shown in the following figures:
                    </p>

                    <a href='./images/rnet-vis.webp' target="_blank" rel="noopener noreferrer">
                    <figure class='graph'>
                        <img src='./images/rnet-vis.webp' alt='A Gephi visualized graph which shows the clustering of the agents within a randomized network. The clustering shows consistency all around.'>
                        <figcaption>
                            Figure 13: Full visualization of randomized network indicates a lack of any hubs. The network seems to have reached a transition where there exists only one component.
                        </figcaption>
                    </figure>
                    </a>

                    <a href='./images/sfnet-vis.webp' target="_blank" rel="noopener noreferrer">
                    <figure class='graph'>
                        <img src='./images/sfnet-vis.webp' alt='A Gephi visualized graph which shows the clustering of the agents within a social network. Clustering is not consistent here, where clustering seems to revolve around a select few agents.'>
                        <figcaption>
                            Figure 14: Partial visualization of network representative of the Reddit dataset. Notice the significant hubs which are indicative of a higher degree.
                        </figcaption>
                    </figure>
                    </a>

                    <a href='./images/sf-outliers.webp' target="_blank" rel="noopener noreferrer">
                    <figure class='graph'>
                        <img src='./images/sf-outliers.webp' alt='A gephi visualized grpah which shows outliers of the social network; disconnected interactions between a subset of agents involved.'>
                        <figcaption>
                            Figure 15: Partial visualization of the network representative of the Reddit dataset; structures like these exist in the orbit of the larger connected component of the prior figure. This is a property not observed in the generated randomized networks.
                        </figcaption>
                    </figure>
                    </a>

                    <p>
                        The connectivity of Figure 13 tracks once consideration of average node degree is taken. The average degree measured by Gephi is 2.141. This tracks considering the expected node degree of |E|/|V| which is 17406/8129 =  2.141. Once the average node degree surpasses 1, a randomized graph is in the super critical regime where there exists some gigantic component. This component is not fully connected, though; the average node degree has not reached a point to exceed ln(|V|).
                    </p>

                    <p>
                        The observation of the paragraph above helps us see the property of the complex network given by the Reddit dataset is a scale-free network; a means to visually support this assertion.
                    </p>
                    <figure id='force_graph_social'>
                        <div id='social_graph_container'>
                            <svg viewBox="0 0 1048 800" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                        </div>
                        <figcaption>
                            <div style='display:flex;align-items:flex-end;gap:15px;justify-content:space-between'>
                                <label for="node_range" style='text-align:start'>
                                    Node Range: (lower value increases amount of nodes)
                                </label>
                                <p style='margin:0px;min-width:100px'>Value: <span id='nodeSliderVal'> </span></p>
                            </div>
                                <input type="range" id="node_range" value="6" min="2" max="16" style='width:95%;accent-color:grey;margin-bottom:5px;' oninput='slider_kickoff()'/>
                            <div id='confirm_wrapper' style='display:none;align-items:flex-starts;gap:10px;justify-content:space-between;flex-wrap:wrap;'>
                                <label for="" style='text-align:start;max-width:80%'>
                                    <strong>Warning:</strong> Increasing node count beyond this threshold requires greater system resources. Only do so if device has adequate memory and cpu.
                                </label>
                                <input type="button" id="confirm_button" style='padding:5px;flex-grow:1;max-height:35px;' value="Proceed" onclick='button_kickoff()' />
                            </div>
                            <div style='display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-top:10px'>
                                <label for="" style='text-align:start;max-width:80%;'>
                                    Expand gap between nodes:
                                </label>
                                <input type="button" id="explode_button" value="Expand Nodes" onclick="explode_graph()" style='padding:5px;max-height:35px;' />
                            </div>
                        </figcaption>
                    </figure>

                    <script src="<?php echo $relative_path ?>js/d3.v7.min.js"></script>
                    <script src="social_dataset.js"></script>

                    <script>
                        var width = 1048;
                        var height = 800;
                        var set_color = d3.scaleLog([6,60,144],["brown","orange","red"]);

                        var links;
                        var nodes;
                        var simulation;
                        var link;
                        var node;

                        var kickoff_array = {
                            "2": -5,
                            "3": -7,
                            "4": -10,
                            "5": -15,
                            "6": -20,
                            "7": -25,
                            "8": -30,
                            "9": -35,
                            "10": -45,
                            "11": -50,
                            "12": -55,
                            "13": -65,
                            "14": -75,
                            "15": -85,
                            "16": -95
                        }

                        function kickoff(filter,link_strength,collision_strength,force_strength){
                            var svg = d3.select('svg');
                            links = data.links.filter(d => (d.source_strength >= filter && d.target_strength >= filter)).map(d => ({...d}));
                            nodes = data.nodes.filter(d => d.inbound >= filter).map(d => ({...d}));

                            simulation = d3.forceSimulation(nodes)
                            .force("charge", d3.forceManyBody().strength(force_strength))
                            .force("link", d3.forceLink(links).id(d=>d.id).distance(d=>d.strength*link_strength))
                            .force("collide",d3.forceCollide(d => collision_strength(d)))
                            .force("center", d3.forceCenter(width/2,height/2))
                            .force("x", d3.forceX())
                            .force("y", d3.forceY())
                            .alphaTarget(0.05);

                            link = svg.append("g")
                            .attr("stroke", "#999")
                            .attr("stroke-opacity", 0.6)
                            .selectAll("line")
                            .data(links)
                            .join("line")
                            .attr("stroke-width",0.25);

                            node = svg.append("g")
                            .attr("stroke", "brown")
                            .attr("stroke-width", 1)
                            .selectAll("circle")
                            .data(nodes)
                            .join("circle")
                            .attr("r", (d => d.inbound/4))
                            .attr("fill", d => set_color(d.inbound));

                            node.append("title")
                            .text(d => "User: " +d.id + ";\nInbound Degree: " + d.inbound + ";");

                            simulation.on("tick", () => {
                            link
                                .attr("x1", d => d.source.x)
                                .attr("y1", d => d.source.y)
                                .attr("x2", d => d.target.x)
                                .attr("y2", d => d.target.y);

                            node
                                .attr("cx", d => d.x)
                                .attr("cy", d => d.y);
                            });

                            function drag(simulation) {
                                function dragstarted(event) {
                                    if (!event.active) simulation.alphaTarget(0.05).restart();
                                    event.subject.fx = event.subject.x;
                                    event.subject.fy = event.subject.y;
                                }
                                function dragged(event) {
                                    event.subject.fx = event.x;
                                    event.subject.fy = event.y;
                                }
                                function dragended(event) {
                                    if (!event.active) simulation.alphaTarget(0.00).restart();
                                    event.subject.fx = null;
                                    event.subject.fy = null;
                                }
                                return d3.drag().on('start', dragstarted).on('drag', dragged).on('end', dragended);
                            }
                            node.call(drag(simulation));
                        }

                        var col_func = function(obj){
                            return (obj.inbound / 4)+1;
                        }


                        function explode_graph(){
                            simulation.force("link", d3.forceLink(links).id(d=>d.id).distance(d=>d.strength*3*1));
                            document.getElementById("explode_button").disabled = true;
                        }


                        function prime_svg(){
                            node.remove();
                            link.remove();
                            node = false;
                            link = false;
                            nodes = false;
                            links = false;
                            simulation = false;

                            document.getElementsByTagName("svg")[0].remove();
                            let new_svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                            new_svg.setAttribute("viewBox","0 0 1048 800");
                            new_svg.setAttribute("preserveAspectRatio","xMidYMid meet");
                            new_svg.setAttribute("style","width:100%;");
                            document.getElementById("social_graph_container").appendChild(new_svg);
                        }

                        var slider_value;
                        var kickoff_switch = true;
                        function slider_kickoff(){
                            slider = document.getElementById('node_range');
                            if(slider.value < node_threshold){
                                kickoff_switch = false;
                                document.getElementById('confirm_wrapper').style.display = "flex";
                                document.getElementById('confirm_button').disabled = false;
                                document.getElementById('nodeSliderVal').innerHTML = slider_value + " -> " + slider.value;
                            }else{
                                kickoff_switch = true;
                                document.getElementById('confirm_button').disabled = true;
                            }

                            if(kickoff_switch == true){
                                prime_svg();
                                document.getElementById("explode_button").disabled = false;
                                slider_value = slider.value;
                                document.getElementById('nodeSliderVal').innerHTML = slider_value
                                kickoff(slider.value,0,col_func,kickoff_array[String(slider.value)]);
                            }
                        }

                        function button_kickoff(){
                            prime_svg();
                            slider = document.getElementById('node_range');
                            slider_value = slider.value;
                            document.getElementById('nodeSliderVal').innerHTML = slider_value
                            kickoff(slider.value,0,col_func,kickoff_array[String(slider.value)]);
                            document.getElementById('confirm_button').disabled = true;
                            kickoff_switch = true;
                            document.getElementById("explode_button").disabled = false;
                        }

                        var isMobile = window.matchMedia || window.msMatchMedia;
                        isMobile = isMobile("(pointer:coarse)").matches;

                        if(isMobile){
                            var node_threshold = 16;
                        }else{
                            var node_threshold = 6;
                        }

                        slider_value = node_threshold;
                        document.getElementById('nodeSliderVal').innerHTML = slider_value;
                        kickoff(node_threshold,0,col_func,kickoff_array[String(node_threshold)]);
                    </script>

                    <section class='info'>
                        <hr>
                        <h3>Concluding notes</h3>
                        <p>
                            <a href='#note_origin' id='note'>*</a> - <a href='../organization/' target="_blank" rel="noopener noreferrer">My writing on pedagogy</a> makes the following claims:
                            <blockquote>
                                In the domain of computer science, there are three different types of students:
                                <ul>
                                    <li>
                                        There are those who are studying a different discipline who are required to take a CS course as a prerequisite.
                                    </li>

                                    <li>
                                        There are those who have heard jobs related to the field pay well, and thus are studying on the prospect of future paycheck.
                                    </li>

                                    <li>
                                        Finally, there are the individuals who are genuinely curious of the subject.
                                    </li>
                                </ul>
                            </blockquote>
                            <blockquote>
                                Students who are genuinely curious of the subject will succeed. The definition of success is that they will get a degree and they will have a solid and flexible intuition of the machinations of the discipline.
                                <ul>
                                    <li>
                                        The students in the other categories will get just a degree.
                                    </li>
                                </ul>
                            </blockquote>
                        </p>

                        <p>
                            I feel the need to emphasize on the fact this is for an individual who is genuinely curious. The description of the project as described is ambiguous, but there are metrics listed here that can turn a learning experience into an easy grade. Should this be the case, you are doing yourself as much of a disservice as an instructor who chooses to not provide a new/different dataset.
                        </p>
                        <hr>
                    </section>
                </article>
                <nav>
                    <a href='../'>Back</a>
                </nav>
            </section>
        </section>
    </body>
</html>
