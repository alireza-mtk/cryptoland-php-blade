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
                        <img src="{{ asset("assets/images/b1.jpg")}}" class="" alt="">
                    </header>

                    <div class="d-flex mb-3 post-meta">
                        <span class="post-date pr-3">Author: <a href="#">John Doe</a></span>
                        <span class="post-date border border-top-0 border-bottom-0 px-3">June 10, 2018</span>
                        <a href="#">
                            <span class="d-flex align-items-center px-3"><i class="fa fa-comments-o text-3 mr-1" aria-label="4 users comment this post"></i> 4</span>
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus vestibulum lacus non sodales. Aenean pretium augue tellus, dapibus molestie sapien vestibulum venenatis. Curabitur eulr. Etiam finibus vestibulum lacus non sodales. Aenean pretium augue tellus, dapibus molestie sapien vestibulum venenatis. Curabitur eulr.
                    </p>
                    <p>
                        Integer id metus sit amet turpis facilisis ullamcorper. elementum ac mauris in, venenatis consectetur est. Praesent condimentum ut erat sit amet bibendum. Morbi sit amet commodo est. Donec arcu nulla, pellentesque at mi in, fringilla tincidunt risus. Nunc finibus pellentesque diam in tincidunt. Nulla cursus fermentum neque quis consequat. Maecenas non augue id dui placerat tempor. Duis maximus commodo dui a viverra. Fusce nunc augue, pharetra in sem sed, maximus commodo nisl. Vivamus molestie nisl eu gravida dapibus. Integer ac lacus laoreet, dictum sem sit amet, volutpat turpis. Nulla molestie metus nec nibh vestibulum, vitae porta felis vehicula. Curabitur volutpat, libero eget fermentum ultricies, velit purus luctus arcu, sit amet vulputate dui magna nec nulla.
                    </p>
                    <div class="bg-light p-5 mb-5">
                        <blockquote class="blockquote-custom ">
                            <p class="mb-4 font-italic">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur malesuada malesuada metus ut placerat. Cras a porttitor quam, eget ornare sapien. In sit amet vulputate metus. Nullam eget rutrum nisl. Sed tincidunt lorem sed maximus interdum. </p>
                        </blockquote>
                    </div>

                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam finibus vestibulum lacus non sodales. Aenean pretium augue tellus, dapibus molestie sapien vestibulum venenatis. Curabitur eulr. Etiam finibus vestibulum lacus non sodales. Aenean pretium augue tellus, dapibus molestie sapien vestibulum venenatis. Curabitur eulr.
                    </p>

                    <ul class="list-inline mb-0 border border-right-0 border-left-0 py-3">
                        <li class="list-inline-item font-weight-bold">TAGS:</li>
                        <li class="list-inline-item"><a href="#" class="badge badge-light badge-sm badge-pill px-3 py-2">DESIGN</a></li>
                        <li class="list-inline-item"><a href="#" class="badge badge-light badge-sm badge-pill px-3 py-2">WORDPRESS</a></li>
                        <li class="list-inline-item"><a href="#" class="badge badge-light badge-sm badge-pill px-3 py-2">CRYPTO</a></li>
                    </ul>

                </article>

                <!--comments list start-->
                <div id="comments-section" class="row mt-5 mb-5">
                    <div class="col">
                        <h2 class="comments-title">COMMENTS (5)</h2>
                        <ul class="comments">
                            <li>
                                <div class="comment">
                                    <img class="avatar rounded-circle" alt="" src="{{ asset("assets/images/a1.jpg")}}">
                                    <div class="comment-block">
                                        <span class="comment-by">
                                            <strong class="comment-author">John Doe</strong>
                                            <span class="comment-date">June 10, 2018 at 1:10 am</span>
                                            <span class="comment-reply"><a href="#" class="">REPLY</a></span>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>

                                <ul class="comments reply">
                                    <li>
                                        <div class="comment">
                                            <img class="avatar rounded-circle" alt="" src="{{ asset("assets/images/a2.jpg")}}">
                                            <div class="comment-block">
                                                <span class="comment-by">
                                                    <strong class="comment-author">Jane Doe</strong>
                                                    <span class="comment-date">June 10, 2018 at 1:10 am</span>
                                                    <span class="comment-reply"><a href="#" class="">REPLY</a></span>
                                                </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment">
                                            <img class="avatar rounded-circle" alt="" src="{{ asset("assets/images/a3.jpg")}}">
                                            <div class="comment-block">
                                                <span class="comment-by">
                                                    <strong class="comment-author">John Doe</strong>
                                                    <span class="comment-date">June 10, 2018 at 1:10 am</span>
                                                    <span class="comment-reply"><a href="#" class="">REPLY</a></span>
                                                </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment">
                                    <img class="avatar rounded-circle" alt="" src="{{ asset("assets/images/a1.jpg")}}">
                                    <div class="comment-block">
                                        <span class="comment-by">
                                            <strong class="comment-author">John Doe</strong>
                                            <span class="comment-date">MARCH 5, 2018 at 2:28 pm</span>
                                            <span class="comment-reply"><a href="#" class="">REPLY</a></span>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="comment">
                                    <img class="avatar rounded-circle" alt="" src="{{ asset("assets/images/a1.jpg")}}">
                                    <div class="comment-block">
                                        <span class="comment-by">
                                            <strong class="comment-author text-color-dark text-4">Jane Doe</strong>
                                            <span class="comment-date text-color-light-3">June 10, 2018 at 1:10 am</span>
                                            <span class="comment-reply"><a href="#" class="">REPLY</a></span>
                                        </span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--comments list end-->


                <!--comments form-->
                <div class="row leave-comment">
                    <div class="col">
                        <h2 class="comments-title mb-4">LEAVE A COMMENT</h2>
                        <form class="" action="#" method="post">
                            <div class="form-row">
                                <div class="form-group col">
                                    <textarea class="form-control" placeholder="Comment" rows="5" name="comment" required=""></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" value="" class="form-control" name="name" placeholder="Name" required="">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="email" value="" class="form-control" name="email" placeholder="E-mail" required="">
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" value="" class="form-control" name="website" placeholder="Website">
                                </div>
                            </div>
                            <div class="form-row mt-2">
                                <div class="col">
                                    <input type="submit" value="POST COMMENT" class="btn btn--medium btn--orange">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--comments form-->
            </div>
            <div class="col-md-4">
                <div class="widget">
                    <form class="form-inline" role="form">
                        <div class="search-row">
                            <button class="search-btn" type="submit" title="Search">
                                <i class="fas fa-search"></i>
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