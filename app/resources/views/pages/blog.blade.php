@extends('layout.app')


@push("style")
<link rel="stylesheet" href="{{ asset("assets/css/cus-blog.css") }}" />
<link rel="stylesheet" href="{{ asset("assets/css/blog.css") }}" />
@endpush

@push("script")


<script type="text/javascript" src="{{ asset("assets/js/blog.js")}}"></script>
@endpush


@section("main")

  
        
<section class="section-gap">
    
        <div class="row">
            <div class="col-md-8 pr-lg-5 pb-5">

                <article class="blog-post">
                    <header class="blog-post-header mb-4">
                        <a href="#">
                            <img src="{{ asset("assets/images/b1.jpg")}}" class="" alt="">
                        </a>
                    </header>
                    <h2>
                        <a href="#" class="">
                            This is a standard post with preview image
                        </a>
                    </h2>
                    <div class="d-flex mb-3 post-meta">
                        <span class="post-date pr-3">Author: <a href="#">John Doe</a></span>
                        <span class="post-date border border-top-0 border-bottom-0 px-3">June 10, 2018</span>
                        <a href="#">
                            <span class="d-flex align-items-center px-3"><i class="fa fa-comments-o text-3 mr-1" aria-label="4 users comment this post"></i> 4</span>
                        </a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus vestibulum lacus non sodales. Aenean pretium augue tellus, dapibus molestie sapien vestibulum venenatis. Curabitur eulr...</p>
                    <a href="#" class="view-link">Read More</a>
                </article>

                <hr class="my-5">

                <article class="blog-post">
                    <header class="blog-post-header mb-4">
                        <div class="owl-carousel owl-theme js_post_carousel">
                            <div>
                                <a href="#">
                                    <img src="{{ asset("assets/images/b2.jpg")}}" alt="">
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <img src="{{ asset("assets/images/b3.jpg")}}" alt="">
                                </a>
                            </div>
                            <div>
                                <a href="#">
                                    <img src="{{ asset("assets/images/b1.jpg")}}" alt="">
                                </a>
                            </div>
                        </div>
                    </header>
                    <h2>
                        <a href="#" class="">
                            This is a gallery image post
                        </a>
                    </h2>
                    <div class="d-flex mb-3 post-meta">
                        <span class="post-date pr-3">Author: <a href="#">John Doe</a></span>
                        <span class="post-date border border-top-0 border-bottom-0 px-3">June 10, 2018</span>
                        <a href="#">
                            <span class="d-flex align-items-center px-3"><i class="fa fa-comments-o text-3 mr-1" aria-label="4 users comment this post"></i> 4</span>
                        </a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus vestibulum lacus non sodales. Aenean pretium augue tellus, dapibus molestie sapien vestibulum venenatis. Curabitur eulr...</p>
                    <a href="#" class="view-link">Read More</a>
                </article>

                <hr class="my-5">

                <article class="blog-post">
                    <header class="blog-post-header mb-4">
                        <div class="video-fit">
                            <iframe width="560" height="315" src="http://www.youtube.com/embed/L9r1M0MxcqA" allowfullscreen></iframe>
                        </div>
                    </header>
                    <h2>
                        <a href="#" class="">
                            This is a video post
                        </a>
                    </h2>
                    <div class="d-flex mb-3 post-meta">
                        <span class="post-date pr-3">Author: <a href="#">John Doe</a></span>
                        <span class="post-date border border-top-0 border-bottom-0 px-3">June 10, 2018</span>
                        <a href="#">
                            <span class="d-flex align-items-center px-3"><i class="fa fa-comments-o text-3 mr-1" aria-label="4 users comment this post"></i> 4</span>
                        </a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus vestibulum lacus non sodales. Aenean pretium augue tellus, dapibus molestie sapien vestibulum venenatis. Curabitur eulr...</p>
                    <a href="#" class="view-link">Read More</a>
                </article>

                <hr class="my-5">

                <article class="blog-post">
                    <header class="blog-post-header mb-4">
                        <div class="audio-fit">
                            <iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/115637399&amp;color=ff5500&amp;auto_play=false&amp;show_artwork=true"></iframe>
                        </div>
                    </header>
                    <h2>
                        <a href="#" class="">
                            This is a audio post
                        </a>
                    </h2>
                    <div class="d-flex mb-3 post-meta">
                        <span class="post-date pr-3">Author: <a href="#">John Doe</a></span>
                        <span class="post-date border border-top-0 border-bottom-0 px-3">June 10, 2018</span>
                        <a href="#">
                            <span class="d-flex align-items-center px-3"><i class="fa fa-comments-o text-3 mr-1" aria-label="4 users comment this post"></i> 4</span>
                        </a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus vestibulum lacus non sodales. Aenean pretium augue tellus, dapibus molestie sapien vestibulum venenatis. Curabitur eulr...</p>
                    <a href="#" class="view-link">Read More</a>
                </article>

                <hr class="my-5">

                <article class="blog-post">
                    <header class="blog-post-header bg-light p-5 mb-4">
                        <blockquote class="blockquote blockquote-custom">
                            <p class="mb-4 font-tertiary font-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla gravida ipsum a est iaculis, sit amet ullamcorper odio egestas.</p>
                        </blockquote>
                    </header>
                    <h2>
                        <a href="#" class="">
                            This is a blockquote post
                        </a>
                    </h2>
                    <div class="d-flex mb-3 post-meta">
                        <span class="post-date pr-3">Author: <a href="#">John Doe</a></span>
                        <span class="post-date border border-top-0 border-bottom-0 px-3">June 10, 2018</span>
                        <a href="#">
                            <span class="d-flex align-items-center px-3"><i class="fa fa-comments-o text-3 mr-1" aria-label="4 users comment this post"></i> 4</span>
                        </a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus vestibulum lacus non sodales. Aenean pretium augue tellus, dapibus molestie sapien vestibulum venenatis. Curabitur eulr...</p>
                    <a href="#" class="view-link">Read More</a>
                </article>

                <hr class="my-5">

                <div class="text-center">
                    <ul class="custom-pagination">
                        <li><a href="#">Prev</a>
                        </li>
                        <li class="active"><a href="#">1</a>
                        </li>
                        <li><a href="#">2</a>
                        </li>
                        <li><a href="#">3</a>
                        </li>
                        <li><a href="#">4</a>
                        </li>
                        <li><a href="#">5</a>
                        </li>
                        <li><a href="#">Next</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-md-4">
                <div class="widget">
                    <form class="form-inline" role="form">
                        <div class="search-row">
                            <button class="search-btn" type="submit" title="Search">
                                <i class="fa fa-search"></i>
                            </button>
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                    </form>
                </div>
                <div class="widget">
                    <div class="widget-title">
                        <h3>Categories</h3>
                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Audio</a>
                        </li>
                        <li>
                            <a href="#">Gallery</a>
                        </li>
                        <li>
                            <a href="#">Image</a>
                        </li>
                        <li>
                            <a href="#">Uncategorized</a>
                        </li>
                        <li>
                            <a href="#">Video</a>
                        </li>
                    </ul>
                </div>

                <div class="widget">
                    <div class="widget-title">
                        <h3>Tags</h3>
                    </div>
                    <div class="tagcloud">
                        <a href="#">coupon</a>
                        <a href="#">deals</a>
                        <a href="#">discount</a>
                        <a href="#">envato</a>
                        <a href="#">gallery</a>
                        <a href="#">sale</a>
                        <a href="#">shop</a>
                        <a href="#">store</a>
                        <a href="#">video</a>
                        <a href="#">youtube</a>
                    </div>
                </div>


                <div class="widget">
                    <div class="widget-title">
                        <h3>Meta</h3>
                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#">Login</a>
                        </li>
                        <li>
                            <a href="#">Entries RSS</a>
                        </li>
                        <li>
                            <a href="#">Comments RSS</a>
                        </li>
                        <li>
                            <a href="#">WordPress.org</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
  
    <img src="{{ asset("assets/images/subscribe-bg.png")}}" class="contact-bg" alt="">
</section>
       
       
       
    


@endsection