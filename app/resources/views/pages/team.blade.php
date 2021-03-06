@extends('layout.app')


@push("style")

@endpush

@push("script")



@endpush


@section("main")


<section class="section  team" id="team">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-header section-header--tire section-header--medium-margin">
                    <h4>Our brain</h4>
                    <h2>Awesome Team</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava1.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">David Drake</div>
                        <div class="team-member__post">UI Designer</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos-delay="100" class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava4.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">Allan Bellor</div>
                        <div class="team-member__post">Analitics</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos-delay="200" class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava3.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">Joe Doe</div>
                        <div class="team-member__post">Tech Operation</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos-delay="300" class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava4.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">Sam Tolder</div>
                        <div class="team-member__post">CEO</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava5.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">Henry Polar</div>
                        <div class="team-member__post">SEO Specialist</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos-delay="100" class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava6.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">Sandra Pen</div>
                        <div class="team-member__post">Humar Resources</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos-delay="200" class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava7.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">Linda Gampton</div>
                        <div class="team-member__post">UX Team Lead</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos-delay="300" class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava8.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">John Smith</div>
                        <div class="team-member__post">General Director</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>								
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava9.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">Sam Oldrich</div>
                        <div class="team-member__post">Manager</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos-delay="100" class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava10.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">Denis Portlen</div>
                        <div class="team-member__post">Programmer</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos-delay="200" class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava11.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">Den Miller</div>
                        <div class="team-member__post">Economist</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div data-aos-delay="300" class="col-lg-4 col-xl-3 col-6">
                <div class="team-member">
                    <img class="team-member__avatar" src="{{ asset("assets/images/ava6.png")}}" alt="">
                    <div class="team-member__content">
                        <div class="team-member__name">Brawn Lee</div>
                        <div class="team-member__post">Journalist</div>
                        <ul class="team-member__social">
                            <li><a href="#"><img src="{{ asset("assets/images/facebook.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/linkedin.svg")}}" alt=""></a></li>
                            <li><a href="#"><img src="{{ asset("assets/images/google-plus.svg")}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset("assets/images/team-bg.png")}}" data-jarallax-element="40" alt="" class="team__bg">
</section>


@endsection