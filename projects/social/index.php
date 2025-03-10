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
                        <h3 id="content-update">Update - Data Visualization</h3>
                        <p>
                            Additional content has been added to this page since initially publishing this project. The initial publication, whose state is encapsulated by git commit hash <a href='https://github.com/alanmmckay/alanmmckay.github.io/tree/a1d800f2d92ec2f1f54a10051f520b2496b31138'
                             target="_blank" rel="noopener noreferrer">a1d800f</a>, went far beyond the scope of the original problem statement of analysis. The initial analysis included a set of static figures containing images that show scatter-plot distributions and network graphs. The usage of these static figures aligns with what is typical of academic publications.
                        </p>
                        <p>
                            This publication has been further updated with the inclusion of more intuitive data presentation. This was accomplished by using the d3 <a href="https://d3js.org/" target="_blank" rel="noopener noreferrer">data visualization library</a>. The implementation of these new figures allow users to interact with the data being discussed more closely. These new additions are described as follows:
                        </p>
                        <ul>
                            <li>
                                A <a href="#force_graph_social">force directed graph</a> which represents a network of agents as nodes where a user can inspect the physical properties of said network with respect to its connectivity. A user can mouse over each node to reveal the agent's id in addition to revealing a report of how many other users have referred to it. The edges connecting these nodes represent one of these references.
                                <ul>
                                    <li>
                                        The <a href='#six_degrees_of_separation'>Six degrees of separation</a> subsection was added to provide an intuitive approach to correlating the properties that can be explored via the force directed graph to the statistical analysis discussed within this project page.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                A set of interactive scatter-plot graphs which allow a user to pan and zoom in on the data that each scatter-plot represents. Each set of static figures will present an option to switch to a view where these interactive graphs can be looked at within the following subsections:
                                <ul>
                                    <li>
                                        <a href="#social_distribution_toggle">Social Network - Linear Scale</a>
                                    </li>
                                    <li>
                                        <a href="#social_distribution_log_toggle">Social Network - Log-Log Scale</a>
                                    </li>
                                    <li>
                                        <a href="#random_distribution_toggle">Random Network - Linear Scale</a>
                                    </li>
                                    <li>
                                        <a href="#random_distribution_log_toggle">Random Network - Log-Log Scale</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <hr>
                    </section>
                    <header id="main-content">
                        <h1>Data Science: Social Computing</h1>
                    </header>
                    <p>
                        Consider a dataset which describes interactions between Reddit users for two different subreddits during the span of a specific month.
                        <ul>
                            <li>
                                The given dataset is given as a file which is formatted as an adjacency list. Each line of the file is represented as such: <code>User1, User2, User3, ... , Userx\n</code> where User1 replied to a comment made by User2 and another one by User3, and every user up to and including Userx.
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
                    <header style='display:flex;flex-wrap:wrap;justify-content:space-between;align-items:center;margin-top:15px;margin-bottom:15px'>
                    <h2 style='margin:0px'>Parsing and presenting the adjacency list</h2>
                    <a href='#analysis-section'>Skip to analysis</a>
                    </header>
                    <h3>Transforming the extracted data</h3>
                    <p>
                        Parsing through the adjacency list is necessary to run meaningful analysis of the data.  To calculate the above facets of data, one only needs to run through the adjacency list and maintain a running tally of unique node identifiers and edge combinations. When discovering the node with the smallest out-degree and the node with the largest out-degree, one only needs to maintain a maximum and minimum value while evaluating the amount of nodes contained in each adjacency list entry. That is, for every line in the adjacency list, the overall minimum is min(current min, line count) and the overall maximum is max(current max, line count).
                    </p>

                    <p>
                        To determine which nodes have the minimum and maximum in-bound degrees, more effort than a simple pass of the adjacency list is required. Accomplishing this task takes advantage of the fact that different tools require different data structures. To run analysis through Gephi, a set of edges are required. Here, the format of said edge list is simply a csv file where each line represents a single edge. Each line contains one comma where the set of characters on the left-hand side of the comma represents the origin of the edge and the characters on the right-hand side of the comma represents the target of said edge. For example, <code>userone,usertwo</code> is a case where <code>userone</code> is tagging or responding to <code>usertwo</code> in a message.
                    </p>

                    <p>
                        Creating an edge list forms a data structure that can be used by Gephi and can also be parsed through with linear pass in which a dictionary can be set up to create a reverse-index of nodes. After creating this reverse-index, another linear pass can be made where the nodes which have the minimum and maximum quantity of in-bound edges can be discovered.
                    </p>

                    <p>
                        These linear passes can be then altered to maintain a running total of nodes that have x in-bound edges, out-bound edges, and a total of both in-bound and out-bound edges (used for creating an undirected graph). Creating these buckets is helpful in visualizing the distribution of values.
                    </p>

                    <p>
                        The parsing routine for creating a bucket of values for out-bound degrees, (while creating an edge list), is as follows:
                    </p>
                    <figure class='code-figure'>
                        <iframe class='non-dominant-code' frameborder="0" style='width:100%;overflow:auto;max-height:1535px' max-height='1535' src='code/01.php'></iframe>
                        <figcaption></figcaption>
                    </figure>
                    <p>
                        Take note that <code>kdictionary</code> contains the mapping of degree counts to the amount of nodes that have the degree count. From the edge list, a reverse-index can be formed:
                    </p>
                    <figure class='code-figure'>
                        <iframe class='non-dominant-code' frameborder="0" style='width:100%;overflow:auto;max-height:700px' max-height='700' src='code/02.php'></iframe>
                        <figcaption></figcaption>
                    </figure>
                    <p>
                        Using this reverse-index, the bucket of values for in-bound degrees can be calculated:
                    </p>
                    <figure class='code-figure'>
                        <iframe class='non-dominant-code' frameborder="0" style='width:100%;overflow:auto;max-height:1045px' max-height='1045' src='code/03.php'></iframe>
                        <figcaption></figcaption>
                    </figure>
                    <p>
                        Finally, the same process can be applied to form the bucket of values for an undirected graph. Here, we can confirm that the minimum and maximum of this undirected graph is equivalent to k_out_min + k_in_min and k_out_min + k_out_max, respectively:
                    </p>
                    <figure class='code-figure'>
                        <iframe class='non-dominant-code' frameborder="0" style='width:100%;overflow:auto;max-height:990px' max-height='990' src='code/04.php'></iframe>
                        <figcaption></figcaption>
                    </figure>
                    <h3>Using the transformed data</h3>
                    <p>
                        Three dictionaries have been established. They are currently labeled <code>kdictionary</code>, <code>k_out_dictionary</code>, and <code>k_in_dictionary</code>. Each contains a mapping of degree counts to the quantity of nodes with the given degree count. To calculate the amount of nodes that exists within this network, one could sum up all the values associated with each key in any of these dictionaries. This facet can be used to help form a scatter plot of the distribution of degree counts within the network:
                    </p>
                    <figure class='code-figure'>
                        <iframe class='non-dominant-code' frameborder="0" style='width:100%;overflow:auto;max-height:730px' max-height='730' src='code/05.php'></iframe>
                        <figcaption></figcaption>
                    </figure>
                    <p>
                        Instead of using list comprehension to calculate the total, the lists which contain raw degree counts can instead be used. To do so, the <code>distribution_graphing</code> function definition should expect an extra argument for one of these lists where <code>total</code> is instead calculated as the length of said list.
                    </p>
                    <p>
                        In this context, calling <code>distributon&shy;_graphing&shy;(k&shy;_&shy;out&shy;_dictionary,&shy;out_raw,&shy;"k_out")</code>, <code>distribution&shy;_graphing(k&shy;_&shy;in_&shy;dictionary,&shy;in_raw,&shy;"k_in")</code>, and <code>distribution&shy;_graphing&shy;(kdictionary&shy;,raw&shy;,"k")</code> create the first three figures for analysis.
                    </p>
                    <h2 id="analysis-section">Analysis of the network</h2>
                    <p>
                        How are the various degrees distributed? The following figures are indicative of distribution:
                    </p>

                    <div>
                        <div style="padding-top:15px;padding-bottom:15px;background-color:rgba(255,255,255,0.80);position:sticky;top:0px;display:flex;gap:10px;display:none" class='interactive-graph-toggle'>
                            <label for='social_distribution_toggle' class="pointer" style='color:#3b4044' onclick='toggle_scatter_view("social_distribution_toggle","social_distributions")'>View Interactive Graphs</label>
                            <input id='social_distribution_toggle' class="pointer range_switch" class="interactive_graph_switch" type='range' min=0 max=1 value=0 style='accent-color:grey;width:25px'
                            onchange='toggle_scatter_view(this.id,"social_distributions")'/>
                        </div>
                        <dialog id='social_distributions' style='width:85%;max-width:875px;background-color:rgba(255,255,255,0.95);height:100%'>
                            <div class='dialog-content'>
                                <div style="padding-top:10px;padding-bottom:10px;display:flex;justify-content:end;">
                                    <span style='color:#3b4044;' class="pointer" onclick='toggle_scatter_view("social_distribution_toggle","social_distributions")' >Close interactive graph [ x ]</span>
                                </div>
                                <hr>
                                <select name='social_dist_selector' id ='social_dist_selector' onchange="switch_scatter(this.value,'social_distribution_figures')" style="border:1px solid #7b869d; padding: 3px; color: #414858; background-color: white;display:inline-block">
                                    <option value='figure1'>out-degree (k_out)</option>
                                    <option value='figure2'>in-degree (k_in)</option>
                                    <option value='figure3'>total-degree (k_total)</option>
                                </select>
                                <div id='social_distribution_figures'>
                                    <figure id='figure1' style=''>
                                        <figcaption style='text-align:center'>Figure 1: Distribution plotting of node out-degrees.</figcaption>
                                        <svg id='scatter1' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>

                                    <figure id='figure2' style='display:none'>
                                        <figcaption style='text-align:center'>Figure 2: Distribution plotting of node in-degrees.</figcaption>
                                        <svg id='scatter2' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>

                                    <figure id='figure3' style='display:none'>
                                        <figcaption style='text-align:center'>Figure 3: Distribution plotting of node degrees (inbound and outbound)</figcaption>
                                        <svg id='scatter3' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>
                                </div>
                                <hr>
                            </div>
                        </dialog>

                        <div class='fig-col'>
                            <figure class='graph'>
                                <img class='primed_pointer'' src='./images/dist-outdeg.webp' alt='A graph showing the distribution plotting of nodes in terms of out-degrees.' onclick="toggle_scatter_view('social_distribution_toggle','social_distributions');switch_scatter('figure1','social_distribution_figures','social_dist_selector');" >
                                <figcaption>
                                    Figure 1: Distribution plotting of node out-degrees.
                                </figcaption>
                            </figure>


                            <figure class='graph'>
                                <img class='primed_pointer'' src='./images/dist-indeg.webp' alt='A graph showing the distribution plotting of nodes in terms of in-degrees.' onclick="toggle_scatter_view('social_distribution_toggle','social_distributions');switch_scatter('figure2','social_distribution_figures','social_dist_selector');" >
                                <figcaption>
                                    Figure 2: Distribution plotting of node in-degrees.
                                </figcaption>
                            </figure>

                            <figure class='graph' style='float:none'>
                                <img class='primed_pointer'' src='./images/dist-degree.webp' alt='A graph showing the distribution plotting of nodes in terms of both degrees.' onclick="toggle_scatter_view('social_distribution_toggle','social_distributions');switch_scatter('figure3','social_distribution_figures','social_dist_selector');" >
                                <figcaption>
                                    Figure 3: Distribution plotting of node degrees (inbound and outbound)
                                </figcaption>
                            </figure>
                        </div>
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
                    <div>
                        <div style="padding-top:15px;padding-bottom:15px;background-color:rgba(255,255,255,0.80);position:sticky;top:0px;display:flex;gap:10px;display:none" class='interactive-graph-toggle'>
                            <label for='social_distribution_log_toggle' class="pointer" style='color:#3b4044' onclick='toggle_scatter_view("social_distribution_log_toggle","social_distributions_log")'>View Interactive Graphs</label>
                            <input id='social_distribution_log_toggle' class="pointer range_switch" class="interactive_graph_switch" type='range' min=0 max=1 value=0 style='accent-color:grey;width:25px'
                            onchange='toggle_scatter_view(this.id,"social_distributions_log")'/>
                        </div>
                        <dialog id='social_distributions_log' style='width:85%;max-width:875px;background-color:rgba(255,255,255,0.95);height:100%'>
                            <div class='dialog-content'>
                                <div style="padding-top:10px;padding-bottom:10px;display:flex;justify-content:end;">
                                    <span style='color:#3b4044;' class="pointer" onclick='toggle_scatter_view("social_distribution_log_toggle","social_distributions_log")' >Close interactive graph [ x ]</span>
                                </div>
                                <hr>
                                <select name='social_dist_log_selector' id ='social_dist_log_selector' onchange="switch_scatter(this.value,'social_distribution_log_figures')" style="border:1px solid #7b869d; padding: 3px; color: #414858; background-color: white;display:inline-block">
                                    <option value='figure4'>out-degree (k_out)</option>
                                    <option value='figure5'>in-degree (k_in)</option>
                                    <option value='figure6'>total-degree (k_total)</option>
                                </select>
                                <div id='social_distribution_log_figures'>
                                    <figure id='figure4' style=''>
                                        <figcaption style='text-align:center'>Figure 4: Log-log scale distribution plotting of node-out degrees</figcaption>
                                        <svg id='scatter4' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>

                                    <figure id='figure5' style='display:none'>
                                        <figcaption style='text-align:center'>Figure 5: Log-log scale distribution plotting of node-in degrees</figcaption>
                                        <svg id='scatter5' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>

                                    <figure id='figure6' style='display:none'>
                                        <figcaption style='text-align:center'>Figure 6: Log-log scale distribution plotting of node degrees (inbound and outbound)</figcaption>
                                        <svg id='scatter6' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>
                                </div>
                                <hr>
                            </div>
                        </dialog>

                        <div class='fig-col'>

                            <figure class='graph'>
                                <img class='primed_pointer'' src='./images/pldist-outdeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of out-degrees.' onclick="toggle_scatter_view('social_distribution_log_toggle','social_distributions_log');switch_scatter('figure4','social_distribution_log_figures','social_dist_log_selector');">
                                <figcaption>
                                    Figure 4: Log-log scale distribution plotting of node-out degrees
                                </figcaption>
                            </figure>

                            <figure class='graph'>
                                <img class='primed_pointer'' src='./images/pldist-indeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of in-degrees.' onclick="toggle_scatter_view('social_distribution_log_toggle','social_distributions_log');switch_scatter('figure5','social_distribution_log_figures','social_dist_log_selector');">
                                <figcaption>
                                    Figure 5: Log-log scale distribution plotting of node-in degrees
                                </figcaption>
                            </figure>

                            <figure class='graph' style='float:none'>
                                <img class='primed_pointer'' src='./images/pldist-degree.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.' onclick="toggle_scatter_view('social_distribution_log_toggle','social_distributions_log');switch_scatter('figure6','social_distribution_log_figures','social_dist_log_selector');">
                                <figcaption>
                                    Figure 6: Log-log scale distribution plotting of node degrees (inbound and outbound)
                                </figcaption>
                            </figure>
                        </div>

                        <p style='clear:both;'>
                            These log-scale graphs, and the calculation of the aformentioned γ and c values, can be created by calling the logic of the following function definition:
                        </p>
                        <figure class='code-figure'>
                            <iframe class='non-dominant-code' frameborder="0" style='width:100%;overflow:auto;max-height:1430px' max-height='1430' src='code/06.php'></iframe>
                            <figcaption></figcaption>
                        </figure>
                        <hr>
                    </div>
                    <h3>Synthetically generated networks</h3>
                    <p>
                        Random networks were generated to contrast this data. The algorithm that created these networks ensured the same node count and edge count. It also ensured there exists no node that does not have an edge – as is the case for the reddit data set. This synthetically generated network is created as follows:
                    </p>
                    <figure class='code-figure'>
                        <iframe class='non-dominant-code' frameborder="0" style='width:100%;overflow:auto;max-height:1150px' max-height='1150' src='code/07.php'></iframe>
                        <figcaption></figcaption>
                    </figure>
                    <p>
                        The distribution of this network differs from the social network. Consider the following figures:
                    </p>
                    <div>
                        <div style="padding-top:15px;padding-bottom:15px;background-color:rgba(255,255,255,0.80);position:sticky;top:0px;display:flex;gap:10px;display:none;" class='interactive-graph-toggle'>
                            <label for='random_distribution_toggle' class="pointer" style='color:#3b4044' onclick='toggle_scatter_view("random_distribution_toggle","random_distributions")'>View Interactive Graphs</label>
                            <input id='random_distribution_toggle' class="pointer range_switch" class="interactive_graph_switch" type='range' min=0 max=1 value=0 style='accent-color:grey;width:25px'
                            onchange='toggle_scatter_view(this.id,"random_distributions")'/>
                        </div>
                        <dialog id='random_distributions' style='width:85%;max-width:875px;background-color:rgba(255,255,255,0.95);height:100%'>
                            <div class='dialog-content'>
                                <div style="padding-top:10px;padding-bottom:10px;display:flex;justify-content:end;">
                                    <span style='color:#3b4044;' class="pointer" onclick='toggle_scatter_view("random_distribution_toggle","random_distributions")' >Close interactive graph [ x ]</span>
                                </div>
                                <hr>
                                <select name='random_dist_selector' id ='random_dist_selector' onchange="switch_scatter(this.value,'random_distribution_figures')" style="border:1px solid #7b869d; padding: 3px; color: #414858; background-color: white;display:inline-block">
                                    <option value='figure7'>out-degree (k_out)</option>
                                    <option value='figure8'>in-degree (k_in)</option>
                                    <option value='figure9'>total-degree (k_total)</option>
                                </select>
                                <div id='random_distribution_figures'>
                                    <figure id='figure7' style=''>
                                        <figcaption style='text-align:center'>Figure 7: Distribution plotting of node out-degrees</figcaption>
                                        <svg id='scatter7' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>

                                    <figure id='figure8' style='display:none'>
                                        <figcaption style='text-align:center'>Figure 8: Distribution plotting of node in-degrees of Randomized Network</figcaption>
                                        <svg id='scatter8' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>

                                    <figure id='figure9' style='display:none'>
                                        <figcaption style='text-align:center'>Figure 9: Distribution plotting of node degrees (outbound and inbound) of Randomized Network</figcaption>
                                        <svg id='scatter9' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>
                                </div>
                                <hr>
                            </div>
                        </dialog>

                        <div class='fig-col'>
                           <figure class='graph'>
                                <img class='primed_pointer'' src='./images/rdist-outdeg.webp' alt='A graph showing the distribution plotting of nodes in terms of out-degrees.'  onclick="toggle_scatter_view('random_distribution_toggle','random_distributions');switch_scatter('figure7','random_distribution_figures','random_dist_selector');">
                                <figcaption>
                                    Figure 7: Distribution plotting of node out-degrees
                                </figcaption>
                            </figure>

                            <figure class='graph'>
                                <img class='primed_pointer'' src='./images/rdist-indeg.webp' alt='A graph showing the distribution plotting of nodes in terms of in-degrees.' onclick="toggle_scatter_view('random_distribution_toggle','random_distributions');switch_scatter('figure8','random_distribution_figures','random_dist_selector');">
                                <figcaption>
                                    Figure 8: Distribution plotting of node in-degrees of Randomized Network
                                </figcaption>
                            </figure>

                            <figure class='graph' style='float:none;'>
                                <img class='primed_pointer'' src='./images/rdist-degree.webp' alt='A graph showing the distribution plotting of nodes in terms of both degrees.' onclick="toggle_scatter_view('random_distribution_toggle','random_distributions');switch_scatter('figure9','random_distribution_figures','random_dist_selector');">
                                <figcaption>
                                    Figure 9: Distribution plotting of node degrees (outbound and inbound) of Randomized Network
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <p style='clear:both;'>
                        The distribution figures are similar for the other four randomized networks. This similarity holds true for the log-log scale plotting of the same data:
                    </p>

                    <div>
                        <div style="padding-top:15px;padding-bottom:15px;background-color:rgba(255,255,255,0.80);position:sticky;top:0px;display:flex;gap:10px;display:none;" class='interactive-graph-toggle'>
                            <label for='random_distribution_log_toggle' class="pointer" style='color:#3b4044' onclick='toggle_scatter_view("random_distribution_log_toggle","random_distributions_log")'>View Interactive Graphs</label>
                            <input id='random_distribution_log_toggle' class="pointer range_switch" class="interactive_graph_switch" type='range' min=0 max=1 value=0 style='accent-color:grey;width:25px'
                            onchange='toggle_scatter_view(this.id,"random_distributions_log")'/>
                        </div>
                        <dialog id='random_distributions_log' style='width:85%;max-width:875px;background-color:rgba(255,255,255,0.95);height:100%'>
                            <div class='dialog-content'>
                                <div style="padding-top:10px;padding-bottom:10px;display:flex;justify-content:end;">
                                    <span style='color:#3b4044;' class="pointer" onclick='toggle_scatter_view("random_distribution_log_toggle","random_distributions_log")' >Close interactive graph [ x ]</span>
                                </div>
                                <hr>
                                <select name='random_dist_log_selector' id ='random_dist_log_selector' onchange="switch_scatter(this.value,'random_distribution_log_figures')" style="border:1px solid #7b869d; padding: 3px; color: #414858; background-color: white;display:inline-block">
                                    <option value='figure10'>out-degree (k_out)</option>
                                    <option value='figure10_b'>in-degree (k_in)</option>
                                    <option value='figure10_c'>total-degree (k_total)</option>
                                </select>
                                <div id='random_distribution_log_figures'>
                                    <figure id='figure10' style=''>
                                        <svg id='scatter10' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>

                                    <figure id='figure10_b' style='display:none'>
                                        <svg id='scatter10_b' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>

                                    <figure id='figure10_c' style='display:none'>
                                        <svg id='scatter10_c' viewBox="0 0 600 500" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                                        <span style='display:block;width:100%;text-align:center;font-size:18px;color:#5f666d'>
                                            node degree (k)
                                        </span>
                                    </figure>
                                </div>
                                <hr>
                            </div>
                        </dialog>
                            <figure class='graph'>
                            <img class='primed_pointer'' src='./images/plrdist-degree.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.' onclick="toggle_scatter_view('random_distribution_log_toggle','random_distributions_log');switch_scatter('figure10','random_distribution_log_figures','random_dist_log_selector');">
                            <figcaption>
                                Figure 10: Power Law Distribution plotting of node degrees (inbound and outbound) of Randomized Network
                            </figcaption>
                        </figure>

                        <p>
                            The following table of figures are the log-log scale plotting of four other randomized networks, with respect to evaluating out-bound degree:
                        </p>

                        <figure class='col-fig'>

                            <img src='./images/rdist2-outdeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.'>

                            <img src='./images/rdist3-outdeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.'>

                            <img src='./images/rdist4-outdeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.'>

                            <img src='./images/rdist5-outdeg.webp' alt='A graph showing the log-log scale distribution plotting of nodes in terms of both degrees.'>


                            <figcaption style='clear:both;padding-top:25px'>
                                Figure 12: Power Law distribution plotting of outbound node degrees for four other randomized networks.
                            </figcaption>

                        </figure>
                    </div>
                    <p>
                        These distributions are Poisson/binomial. They do not allow for the reasonable probability of having nodes with large degrees, (degrees that approach kmax). This is emphasized by the values given in the x-axis. The maximum node degree here is anywhere from 7 to 9; much smaller than the maximum node degrees of the Reddit dataset. There seems to be a higher occurrence nodes with degree quantities close to the maximum as well. This is shown in the network representation of the involved data, shown in the following figures:
                    </p>

                    <figure class='graph'>
                        <img src='./images/rnet-vis.webp' alt='A Gephi visualized graph which shows the clustering of the agents within a randomized network. The clustering shows consistency all around.'>
                        <figcaption>
                            Figure 13: Full visualization of randomized network indicates a lack of any hubs. The network seems to have reached a transition where there exists only one component.
                        </figcaption>
                    </figure>

                    <figure class='graph'>
                        <img src='./images/sfnet-vis.webp' alt='A Gephi visualized graph which shows the clustering of the agents within a social network. Clustering is not consistent here, where clustering seems to revolve around a select few agents.'>
                        <figcaption>
                            Figure 14: Partial visualization of network representative of the Reddit dataset. Notice the significant hubs which are indicative of a higher degree.
                        </figcaption>
                    </figure>

                    <figure class='graph'>
                        <img src='./images/sf-outliers.webp' alt='A gephi visualized grpah which shows outliers of the social network; disconnected interactions between a subset of agents involved.'>
                        <figcaption>
                            Figure 15: Partial visualization of the network representative of the Reddit dataset; structures like these exist in the orbit of the larger connected component of the prior figure. This is a property not observed in the generated randomized networks.
                        </figcaption>
                    </figure>

                    <p>
                        The connectivity of Figure 13 tracks once consideration of average node degree is taken. The average degree measured by Gephi is 2.141. This tracks considering the expected node degree of |E|/|V| which is 17406/8129 =  2.141. Once the average node degree surpasses 1, a randomized graph is in the super critical regime where there exists some gigantic component. This component is not fully connected, though; the average node degree has not reached a point to exceed ln(|V|).
                    </p>

                    <p>
                        The observation of the paragraph above helps us see the property of the complex network given by the Reddit dataset is a scale-free network; a means to visually support this assertion.
                    </p>
                    <h3 id="six_degrees_of_separation">Six degrees of separation</h3>
                    <p>
                        Six degrees of separation is the term that encapsulates the idea that all individuals are six or fewer social connections away from each other. The network science discussed on this page acts as a means to validate this. The contrast of the Reddit social network graph and the graph of randomly generated connections also acts as evidence. The average distance between nodes will be higher in a randomized graph, leading to the assertion that there are more than six degrees of separation in this context.
                    </p>
                    <p>
                        This can easily be illustrated in the following figure which displays an dynamic graph taken from the datasets discussed thus far. The figure contains an option to switch between these categories of graphs and a slider which a threshold can be set to determine how many nodes are displayed on the graph. This threshold indicates the minimum amount of inbound connections to a node - the higher the value set by the slider, a lesser amount of nodes will be displayed.
                    </p>
                    <p>
                        While using these graphs, one can mouse over a given node to report the user name and inbound connections. A button is also given to allow a user to expand the distance between nodes. This can be useful to unclutter the space. The user also has the ability to drag each node within the graph.
                    </p>
                    <p>
                        The initial threshold set for mobile users will be set to 16 inbound connections. The initial threshold for desktop users will be 6. Setting the threshold below these values will prompt the user for confirmation. These graphs can be CPU and memory intensive as the node and edge count increases which may impact performance.
                    </p>
                    <hr>
                    <p class='noscript'>
                        <i>Please enable JavaScript to view dynamic representation of the small-world networks.</i>
                    </p>
                    <figure id='force_graph_social' style='display:none'>
                        <div style="color:#7b869d;">
                            <label for="network_selector" style="display:inline-block;">Select Network:</label>
                            <select name='network_selector' id ='network_selector' onchange="change_graph(this.value)" style="border:1px solid #7b869d; padding: 3px; color: #414858; background-color: white;display:inline-block">
                                <option value='reddit'>Social Network</option>
                                <option value='random'>Randomized Network</option>
                            </select>
                            <p id='node_counter' style='display:block;margin:0px;text-align:start;'></p>
                        </div>
                        <div id='social_graph_container'>
                            <svg id='force-graph-svg' viewBox="0 0 1048 800" preserveAspectRatio="xMidYMid meet" style="width:100%"></svg>
                            <div id='range-wrapper' style='position:sticky;bottom:0px;padding-top:10px;padding-bottom:10px;background-color:rgba(255, 255, 255, 0.85);'>
                                <div id='confirm_wrapper' style='display:none;align-items:flex-starts;gap:10px;justify-content:space-between;flex-wrap:wrap;'>
                                    <label id="confirm_label" for="" style='text-align:start;max-width:80%'>
                                        <strong>Warning:</strong> Increasing node count beyond this threshold requires greater system resources. Only do so if device has adequate memory and cpu.
                                    </label>
                                    <input type="button" id="confirm_button" style='padding:5px;flex-grow:1;max-height:35px;align-self:center' value="Proceed" onclick='button_kickoff()' />
                                </div>
                                <div style='display:flex;align-items:flex-end;gap:15px;justify-content:space-between'>
                                    <label for="node_range" style='text-align:start'>
                                        Node Range: (lower value increases amount of nodes)
                                    </label>
                                    <p style='margin:0px;min-width:115px'>Value: <span id='nodeSliderVal'> </span></p>
                                </div>
                                <input type="range" id="node_range" value="6" min="1" max="16" style='width:95%;accent-color:grey;margin-bottom:5px;' oninput='slider_kickoff()'/>
                            </div>
                        </div>
                        <div style="color:#7b869d;">
                            <div style='display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-top:10px'>
                                <label for="" style='text-align:start;max-width:80%;'>
                                    Expand gap between nodes:
                                </label>
                                <input type="button" id="explode_button" value="Expand Nodes" onclick="explode_graph(true)" style='padding:5px;max-height:35px;' />
                            </div>
                        </div>
                        <figcaption>
                            Figure 16: Dynamic representation of the small-world networks. Mousing over a node will report the inbound connection count for each node. Nodes can be dragged to be moved around.
                        </figcaption>
                    </figure>
                    <hr>
                    <!-- 8129 -->
                    <script src="<?php echo $relative_path ?>js/d3.v7.min.js"></script>
                    <script src="social_dataset.js"></script>
                    <script src="random_dataset.js"></script>
                    <script src="js/force_graph.js"></script>

                    <h4>Observable properties</h4>
                    <p>
                        An immediate observation is the fact that the range slider in the above figure restricts access to the graphs containing all nodes. This was primarily done as a measure to save system resources; the average browser environment is not optimized to perform the calculations needed to render all 8029 nodes along with 17406 edges.
                    </p>
                    <p>
                        The properties of these universal graphs can be surmised, though. Taking the difference of node count presented with each threshold can be correlated to the set of distribution graphs discussed prior.
                    </p>
                    <p>
                        Knowing this, consider the following node counts sorted by their inbound edge quantities for the social network:
                    </p>
                    <ul>
                        <li>
                            Exactly 1 inbound edge: 3029 nodes
                        </li>
                        <li>
                            Exactly 2 inbound edges: 1225 nodes
                        </li>
                        <li>
                            Exactly 3 inbound edges: 632 nodes
                        </li>
                        <li>
                            Exactly 4 inbound edges: 368 nodes
                        </li>
                        <li>
                            etc
                        </li>
                    </ul>
                    <p>
                        Here, the distribution pattern shown in figures 2 and 5 are confirmed such that the edge count is continually decreasing at a rate that conforms to the power-law. This can be contrasted to the edge quantities for the nodes contained in the randomly generated network:
                    </p>
                    <ul>
                        <li>
                            Exactly 1 inbound edge: 1978 nodes
                        </li>
                        <li>
                            Exactly 2 inbound edges: 2242 nodes
                        </li>
                        <li>
                            Exactly 3 inbound edges: 1537 nodes
                        </li>
                        <li>
                            Exactly 4 inbound edges:  1377 nodes
                        </li>
                        <li>
                            etc
                        </li>
                    </ul>
                    <p>
                        These values also conform to the distribution graphs discussed prior. The value associated with each tier of distribution initially increases and then starts decreasing at a lesser rate than the graphs governed by the power-law. Node counts are more evenly spread out among these buckets until a steep fallout at the tail.
                    </p>
                    <p>
                        Contrasting the tails between both networks also highlights a difference in distribution. The randomly generated network contains only 188 nodes with 6 or more inbound edges. This is roughly 2% of the distribution. The remaining 98% is distributed among nodes with 5 or less inbound edges. An equivalent tail occurs within the social network while looking at nodes with 12 or more inbound edges. Going beyond 12, the rate at which nodes are filtered decreases much more slowly. To evaluate the random network's tail from 2% to 0% requires walking the range of edges from 6 inbound edges to 11 - a quantity smaller than the start of the social network's tail. Doing the equivalent requires walking the social network through the range of 12 inbound edges to 144 inbound edges. This gives the social network the long tail property power-law distributions are famous for.
                    </p>
                    <p>
                        To further illustrate six degrees of separation, grabbing a node within the dynamic graph and peeling it from the node cluster it belongs will exhibit two different behaviors between the graph types:
                    </p>
                    <ul>
                        <li>
                            Within the social network, displacing a node will cause the cluster to shift with it in a manner that maintains a general coherency.
                        </li>
                        <li>
                            Within the randomized network, displacing a node will only cause a micro cluster to shift. This micro cluster unfurls more easily as each node is more likely to be connected to a smaller quantity of nodes. This implies an unfurling action where a singular strand of nodes is peeled from the global group.
                        </li>
                    </ul>
                    <p>
                        These behaviors imply that it takes less node hops along edges to discover another node within the social network than it does within the randomized network. This intuitively describes how the properties of the power-law provides six degrees of separation.
                    </p>
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

        <script src="social_distributions.js"></script>
        <script src="random_distributions.js"></script>
        <script src="js/scatter_plot.js"></script>

        <script>

            create_scatter(social_dist["k_out"],"linear","scatter1",[-10,210],[-0.01,0.50]);
            create_scatter(social_dist["k_in"],"linear","scatter2",[-10,160],[-0.01,0.4]);
            create_scatter(social_dist["k_total"],"linear","scatter3",[-10,375],[-0.01,0.40]);

            create_scatter(social_dist["k_out"],"log","scatter4",[10**-.25, 10**2.75],[10**-4.5,1],[1,10**1,10**2],[1,10**-1,10**-2,10**-3,10**-4]);
            create_scatter(social_dist["k_in"],"log","scatter5",[10**-.25, 10**2.75],[10**-4.5,1],[1,10**1,10**2],[1,10**-1,10**-2,10**-3,10**-4]);
            create_scatter(social_dist["k_total"],"log","scatter6",[10**-.25, 10**2.75],[10**-4.5,1],[1,10**1,10**2],[1,10**-1,10**-2,10**-3,10**-4]);

            create_scatter(random_dist["k_out"],"linear","scatter7",[0,10],[-0.01,0.35]);
            create_scatter(random_dist["k_in"],"linear","scatter8",[0,11],[-0.01,0.35]);
            create_scatter(random_dist["k_total"],"linear","scatter9",[0,15],[-0.01,0.25]);

            create_scatter(random_dist["k_out"],"log","scatter10",[10**-.25, 10**1.15],[10**-4.5,1],[1,10**1,10**2],[1,10**-1,10**-2,10**-3,10**-4]);
            create_scatter(random_dist["k_in"],"log","scatter10_b",[10**-.25, 10**1.15],[10**-4.5,1],[1,10**1,10**2],[1,10**-1,10**-2,10**-3,10**-4]);
            create_scatter(random_dist["k_total"],"log","scatter10_c",[10**-.25, 10**1.15],[10**-4.5,1],[1,10**1,10**2],[1,10**-1,10**-2,10**-3,10**-4]);
        </script>

        <script src='../../js/project_functions.js'></script>

        <script>
            var current_dialog
            var modal;
            window.addEventListener('load', function () {
                let modals = document.getElementsByTagName('dialog')
                current_dialog = document.getElementsByTagName("dialog")[0].id;
                let index = 0;
                while(index < modals.length){
                    let modal = modals[index];
                    modal.addEventListener('click', function(){
                        modal.getElementsByTagName("span")[0].click();
                    });
                    index += 1;
                    let content = modal.getElementsByClassName('dialog-content')[0];
                    content.addEventListener('click', function(event){event.stopPropagation()});
                }

                window.addEventListener('keydown', function(e) {
                    if (e.key == "Escape"){
                        let switches = document.getElementsByClassName("range_switch");
                        let index = 0;
                        while(index < switches.length){
                            switch_element = switches[index];
                            switch_element.parentNode.style['visibility'] = 'inherit';
                            switch_element.value = 0;
                            switch_element.setAttribute("value",0);
                            index += 1;
                        }
                        document.getElementsByTagName("html")[0].style['overflow'] = 'inherit';
                        document.getElementsByTagName("body")[0].style['overflow'] = 'inherit';
                    }
                });

                setCodeSizeSliders(14);

                let toggleDivs = document.getElementsByClassName('interactive-graph-toggle');
                index = 0;
                while(index < toggleDivs.length){
                    let toggleDiv = toggleDivs[index];
                    toggleDiv.style['display'] = 'flex';
                    index += 1;
                }

                let primed_images = document.getElementsByClassName('primed_pointer');
                index = 0;
                while(index < primed_images.length){
                    let primed_image = primed_images[index];
                    primed_image.classList.add('pointer');
                    index += 1;
                }

                let noScripts = document.getElementsByClassName('noscript');
                index = 0;
                while(index < noScripts.length){
                    let noScriptElement = noScripts[index];
                    noScriptElement.style['display'] = 'none';
                    index += 1;
                }

                document.getElementById('force_graph_social').style['display'] = 'inherit';

            });

            window.onresize = function(){
                resize_scatter_view(current_dialog);
            }
            <?php
                if(isset($_GET)){
                    if(isset($_GET['preview'])){
                        echo 'toggle_scatter_view("social_distribution_toggle","social_distributions");';
                    }
                }
            ?>
        </script>
    </body>
</html>
