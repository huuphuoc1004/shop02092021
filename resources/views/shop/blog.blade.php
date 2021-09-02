@extends('template.shop.master')
@section('main_content')

<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <div class="page-header text-center">
                                <h1>Our blog</h1>
                                <p>News About Us and the World</p>
                            </div><!-- End .page-header -->

                            <div class="mb20"></div><!-- margin -->

                            <div class="row">
                            	<div class="col-md-8">
									<article class="entry">
										<figure class="entry-media">
											<a href="single.html">
												<img src="{{ $publicUrl }}/images/blog/post1.jpg" alt="Post">
											</a>
										</figure>
										<h2 class="entry-title">
											<a href="single.html">starting the shoes revolution</a>
										</h2>

										<div class="entry-meta">
											By: <a href="#">Admin</a>
											<span class="separator">-</span>
											FEb 16
											<span class="separator">-</span>
											16 comments
										</div><!-- End .entry-meta -->

										<div class="entry-content">
											<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions...</p>
										</div><!-- End .entry-content -->
										<div class="text-right">
											<a href="single.html" class="entry-readmore">Read More</a>
										</div>
									</article>

									<article class="entry">
										<figure class="entry-media">
											<a href="single.html">
												<img src="{{ $publicUrl }}/images/blog/post2.jpg" alt="Post">
											</a>
										</figure>
										<h2 class="entry-title">
											<a href="single.html">10 things you can do with coins</a>
										</h2>

										<div class="entry-meta">
											By: <a href="#">Admin</a>
											<span class="separator">-</span>
											FEb 16
											<span class="separator">-</span>
											16 comments
										</div><!-- End .entry-meta -->

										<div class="entry-content">
											<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions...</p>
										</div><!-- End .entry-content -->
										<div class="text-right">
											<a href="single.html" class="entry-readmore">Read More</a>
										</div>
									</article>

									<article class="entry">
										<figure class="entry-media">
											<iframe class="embed-responsive-item" width="560" height="315" src="http://www.youtube.com/embed/ewkHtSlOj3Q" allowfullscreen></iframe>
										</figure>
										<h2 class="entry-title">
											<a href="single.html">3 Old School Photography Principles</a>
										</h2>

										<div class="entry-meta">
											By: <a href="#">Admin</a>
											<span class="separator">-</span>
											FEb 16
											<span class="separator">-</span>
											16 comments
										</div><!-- End .entry-meta -->

										<div class="entry-content">
											<p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions...</p>
										</div><!-- End .entry-content -->
										<div class="text-right">
											<a href="single.html" class="entry-readmore">Read More</a>
										</div>
									</article>
                            	</div><!-- End .col-md-8 -->

                            	<aside class="col-md-4 sidebar">
		                            <div class="widget">
		                            	<form action="#" class="search-form">
		                            		<input type="search" class="form-control" placeholder="SEARCH OUR BLOG">
		                            		<button type="submit" class="btn"><i class="fa fa-search"></i></button>
		                            	</form>
		                            </div><!-- End .widget-->

		                            <div class="widget widget-posts">
		                            	<h3 class="widget-title">Featured Posts</h3>
		                            	<ul class="posts-list">
		                            		<li>
		                            			<figure>
		                            				<a href="single.html">
		                            					<img src="{{ $publicUrl }}/images/blog/post-small-1.jpg" alt="Post">
		                            				</a>
		                            			</figure>
		                            			<h4><a href="single.html">How to make the word a better place.</a></h4>
		                            		</li>
		                            		<li>
		                            			<figure>
		                            				<a href="single.html">
		                            					<img src="{{ $publicUrl }}/images/blog/post-small-2.jpg" alt="Post">
		                            				</a>
		                            			</figure>
		                            			<h4><a href="single.html">Which Responsive Design Is Best?</a></h4>
		                            		</li>
		                            		<li>
		                            			<figure>
		                            				<a href="single.html">
		                            					<img src="{{ $publicUrl }}/images/blog/post-small-3.jpg" alt="Post">
		                            				</a>
		                            			</figure>
		                            			<h4><a href="single.html">A Little Surprise Is Waiting For You Here.</a></h4>
		                            		</li>
		                            	</ul>
		                            </div><!-- End .widget-->

		                            <div class="widget">
		                            	<h3 class="widget-title">Categories</h3>

		                            	<ul class="category-list">
		                            		<li><a href="#">News</a></li>
		                            		<li><a href="#">Announcements</a></li>
		                            		<li><a href="#">Trends</a></li>
		                            		<li><a href="#">Design</a></li>
		                            		<li><a href="#">Fashion</a></li>
		                            	</ul>
		                            </div><!-- End .widget-->

		                            <div class="widget">
		                            	<h3 class="widget-title">Tags</h3>

		                            	<div class="tagcloud">
		                            		<a href="#">Business</a>
		                            		<a href="#">Meeting</a>
		                            		<a href="#">Success</a>
		                            		<a href="#">Happy Clients</a>
		                            		<a href="#">Top Stories</a>
		                            	</div><!-- End .tagcloud -->
		                            </div><!-- End .widget-->
                            	</aside><!-- End .sidebar -->
                            </div><!-- End .row -->
                        </div><!-- End .col-md-9 -->
@stop