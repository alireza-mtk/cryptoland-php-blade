@extends('layout.app')


@push('style')
@endpush

@push('script')
@endpush


@section('main')
    <section class="promo">
        <div class="container">
            <div class="row">
                {{-- <img src="{{ asset('assets/images/jahed-png.png') }}" alt="" class="promo__img"> --}}
                <div class="col-12 promo__content ml-5">
                    <h1>You just need a coach <span>for your business </span></h1>
                    <p>
                        Spend real fights effective anything extra by coaching. You can rebuild the structure of your
                        business just with a professional guide.
                    </p>

                    {{-- <div class="timer-wrap">
                        <div id="timer" class="timer"></div>
                        <div class="timer__titles">
                            <div>Days</div>
                            <div>Hours</div>
                            <div>Minutes</div>
                            <div>Seconds</div>
                        </div>
                    </div> --}}

                    <div class="promo__btns-wrap">
                        <a href="tel:09124691077" class="btn btn--medium btn--orange"><span>Direct call</span></a>
                        <a href="#" class="btn btn--big btn--blue">Tell me more</a>
                    </div>

                    {{-- <div class="payments">
                        <img src="{{ asset('assets/images/visa.png') }}" alt="">
                        <img src="{{ asset('assets/images/mc.png') }}" alt="">
                        <img src="{{ asset('assets/images/bitcoin.png') }}" alt="">
                        <img src="{{ asset('assets/images/paypal.png') }}" alt="">
                    </div> --}}
                </div>
            </div>

        </div>
        <div class="scroll-down">
            <img src="{{ asset('assets/images/scroll-down.png') }}" alt="">
        </div>
        <img src="{{ asset('assets/images/chart-bg.png') }}" alt="" class="promo__img2">
        <img src="{{ asset('assets/images/mtk-pro.png') }}" alt="" class="promo__img3">
    </section>

    <section class="economy">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-4">

                    <a data-jarallax-element="-40"
                        href="https://lidoma.agency/wp-content/uploads/2023/05/%D8%B7%D8%B1%D8%A7%D8%AD%DB%8C-%D9%84%D9%88%DA%AF%D9%88-%D8%AF%D8%B1-%DA%A9%D8%B1%D8%AC.mp4"
                        class="economy__video-btn video-btn popup-youtube">
                        <img src="{{ asset('assets/images/video-btn.png') }}" alt="">
                    </a>

                    <div class="economy__block">
                        <div class="economy__block-content">
                            <div
                                class="section-header section-header--white section-header--tire section-header--small-margin">
                                <h4>decentralised economy</h4>
                                <h2>
                                    A banking platform that <span>enables developer solutions</span>
                                </h2>
                            </div>
                            <p>
                                Spend real fights effective anything extra by leading. Mouthwatering leading how real
                                formula also locked-in have can mountain thought. Jumbo plus shine sale.
                            </p>
                            <ul>
                                <li>
                                    <span>Modular structure </span> enabling easy implementation for different softwares
                                </li>
                                <li>
                                    <span>Advanced payment</span> and processing technologies, fine-tuned from more than 3
                                    years of development testing
                                </li>
                                <li>
                                    <span>Unified AppStore</span> for retail cryptocurrency solutions with a Crypterium
                                    products audience
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/images/video-bg.png') }}" alt="" class="economy__bg">
    </section>




    <section class="section map" id="map">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="section-header section-header--animated section-header--center section-header--medium-margin">
                        <h4>Our way</h4>
                        <h2>Road Map</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 offset-lg-4 col-sm-8 offset-sm-4">

                    <div class="road">
                        <div class="road__item">
                            <div class="road__item-metka"></div>
                            <div class="road__item-content">
                                <div class="road__item-title">
                                    June 2017
                                </div>
                                <p>
                                    Dolly Varden trout flathead tui chub bigmouth buffalo golden loach ghost flathead sauger
                                    amur pike, jewel tetra roosterfish mora herring
                                    Pacific lamprey
                                </p>
                            </div>

                        </div>

                        <div class="road__item">
                            <div class="road__item-metka"></div>
                            <div class="road__item-content">
                                <div class="road__item-title">
                                    July 2017
                                </div>
                                <p>
                                    Pirate perch smooth dogfish, flagblenny delta smelt, gopher rockfish bramble shark Sevan
                                    trout queen triggerfish basslet. Redtooth triggerfish prickly shark tarwhine tube-eye
                                    Reef triggerfish rohu longfin dragonfish
                                </p>
                            </div>

                        </div>

                        <div class="road__item">
                            <div class="road__item-metka"></div>
                            <div class="road__item-content">
                                <div class="road__item-title">
                                    December 2017
                                </div>
                                <p>
                                    Pacific argentine. Lined sole masu salmon wolffish cutthroat trout mustard eel huchen,
                                    sea toad grenadier madtom yellow moray Shingle Fish wrymouth giant
                                </p>
                            </div>
                        </div>

                        <div class="road__item">
                            <div class="road__item-metka"></div>
                            <div class="road__item-content">
                                <div class="road__item-title">
                                    December 2017
                                </div>
                                <p>
                                    Pacific argentine. Lined sole masu salmon wolffish cutthroat trout mustard eel huchen,
                                    sea toad grenadier madtom yellow moray Shingle Fish wrymouth giant
                                </p>
                            </div>
                        </div>

                        <div class="road__item road__item-active">
                            <div class="road__item-metka"></div>
                            <div class="road__item-content">
                                <div class="road__item-title">
                                    January 2018
                                </div>
                                <p>
                                    Walleye silverside American sole rockweed gunnel, handfishyellowtail clownfish, rocket
                                    danio; blue gourami, ayu gulper eel false trevally longjaw mudsucker bonytail chub.
                                    Yellow moray french angelfish sand stargazer northern squawfish shiner dab mola yellow
                                    moray sea lamprey torrent catfish sauger blue gourami handfish Sacramento blackfish
                                </p>
                            </div>
                        </div>

                        <div class="road__item road__item-next">
                            <div class="road__item-metka"></div>
                            <div class="road__item-content">
                                <div class="road__item-title">
                                    April 2018
                                </div>
                                <p>
                                    Blue gourami, ayu gulper eel false trevally longjaw mudsucker bonytail chub. Yellow
                                    moray french angelfish sand stargazer
                                </p>
                            </div>
                        </div>

                        <div class="road__item road__item-next">
                            <div class="road__item-metka"></div>
                            <div class="road__item-content">
                                <div class="road__item-title">
                                    May 2018
                                </div>
                                <p>
                                    Livebearer greeneye barred danio mosquitofish king of herring. Sturgeon
                                    tenpounder-píntano tiger shark harelip sucker
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>


    <section class="data" id="stat">
        <div class="container data__container">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('assets/images/data-bg.png') }}" class="data__img" alt="">
                    <div class="counter__item counter__item-1">
                        <div class="counter__item-title">Current elixit price (BTC)</div>
                        <div class="counter counter__item-value counter__item-value--blue numscroller">0.052646</div>
                    </div>
                    <div class="counter__item counter__item-2">
                        <div class="counter__item-title">Avarage batches used</div>
                        <div class="counter counter__item-value counter__item-value--pink">5.658</div>
                    </div>
                    <div class="counter__item counter__item-3">
                        <div class="counter__item-title">Total batches remaining</div>
                        <div class="counter counter__item-value counter__item-value--green">20.324</div>
                    </div>
                    <div class="counter__item counter__item-4">
                        <div class="counter__item-title">Percentage batches</div>
                        <div class="counter counter__item-value counter__item-value--percent counter__item-value--purpure">
                            65</div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/images/data-bg-space.png') }}" class="data__bg" alt="">
    </section>

    <section class="section section--no-pad-bot facts">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="section-header section-header--animated section-header--center section-header--small-margin">
                        <h4>Some facts</h4>
                        <h2>Smart Contract API</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="facts__line">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="facts__line-list">
                            <div class="facts__item">
                                <img src="{{ asset('assets/images/bitcon-round.png') }}" class="facts__icon"
                                    alt="">
                                <div class="facts__title">
                                    Bitcoin + RSK
                                </div>
                            </div>
                            <div class="facts__item">
                                <img src="{{ asset('assets/images/stellar-round.png') }}" class="facts__icon"
                                    alt="">
                                <div class="facts__title">
                                    Stellar Lumens
                                </div>
                            </div>
                            <div class="facts__item">
                                <img src="{{ asset('assets/images/counterparty-round.png') }}" class="facts__icon"
                                    alt="">
                                <div class="facts__title">
                                    Counterparty
                                </div>
                            </div>
                            <div class="facts__item">
                                <img src="{{ asset('assets/images/lisk.png') }}" class="facts__icon" alt="">
                                <div class="facts__title">
                                    Lisk
                                </div>
                            </div>
                            <div class="facts__item">
                                <img src="{{ asset('assets/images/eos-round.png') }}" class="facts__icon"
                                    alt="">
                                <div class="facts__title">
                                    EOS
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{ asset('assets/images/facts-bg.png') }}" class="facts__bg" alt="">
        </div>

    </section>



    <section class="docs" id="docs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="section-header section-header--animated seaction-header--center section-header--tire section-header--medium-margin">
                        <h4>Our files</h4>
                        <h2>Documents</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="#" class="doc">
                        <div class="doc__content">
                            <img src="{{ asset('assets/images/pdf.svg') }}" alt="">
                            <div class="doc__title">
                                Terms & Conditions
                            </div>
                        </div>
                    </a>
                </div>
                <div data-aos-delay="200" class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="#" class="doc">
                        <div class="doc__content">
                            <img src="{{ asset('assets/images/pdf.svg') }}" alt="">
                            <div class="doc__title">
                                White Pappers
                            </div>
                        </div>
                    </a>
                </div>
                <div data-aos-delay="400" class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="#" class="doc">
                        <div class="doc__content">
                            <img src="{{ asset('assets/images/pdf.svg') }}" alt="">
                            <div class="doc__title">
                                Privacy Policy
                            </div>
                        </div>
                    </a>
                </div>
                <div data-aos-delay="600" class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="#" class="doc">
                        <div class="doc__content">
                            <img src="{{ asset('assets/images/pdf.svg') }}" alt="">
                            <div class="doc__title">
                                Business Profile
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/images/docs-bg.png') }}" data-jarallax-element="40" alt="" class="docs__bg">
    </section>

    <section class="data token-data section section--no-pad-bot">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="section-header section-header--animated section-header--medium-margin section-header--center">
                        <h4>Our data</h4>
                        <h2>Token Distribution</h2>
                        <div class="bg-title">
                            Token Distribution
                        </div>
                    </div>
                </div>
            </div>
            <div class="row chart__row align-items-center">
                <div class="col-lg-6">
                    <div class="chart">
                        <img class="chart__bg" src="{{ asset('assets/images/chart-bg.png') }}" alt="">
                        <div class="chart__wrap">
                            <canvas id="myChart" width="400" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-left" class="col-lg-6 token-data__animated-content">
                    <div class="chart__title">
                        Allocation of funds
                    </div>
                    <p class="chart__text">
                        Total token supply - 152,358
                    </p>
                    <ul class="chart__legend">
                        <li>
                            <span style="width: 101px;"></span>
                            9% Founders and Team
                        </li>
                        <li>
                            <span style="width: 153px;"></span>
                            13% Reserved Funding
                        </li>
                        <li>
                            <span style="width: 34px;"></span>
                            2% Advisors
                        </li>
                        <li>
                            <span style="width: 289px;"></span>
                            25% Distribute to Community
                        </li>
                        <li>
                            <span style="width: 22px;"></span>
                            1% Bounty campaign
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>




    <section class="news">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-header section-header--center section-header--small-margin">
                        <h4>In the world</h4>
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="news-carousel owl-carousel">
                        <a href="#" class="news-carousel__item">
                            <div class="news-carousel__item-body">
                                <div class="news-carousel__item-subtitle">Cryptocurrency</div>
                                <h3 class="news-carousel__item-title">
                                    New trends in UI/UX Design World Integration
                                </h3>
                                <p>
                                    Specially for our VIP customers the LH Crypto team representatives Alexander Smirnov and
                                    Antonis Lapos will conduct a number of personal meet-
                                </p>
                                <div class="news-carousel__item-data">
                                    September, 15 2017
                                </div>
                            </div>
                        </a>

                        <a data-aos-delay="200" href="#" class="news-carousel__item">
                            <div class="news-carousel__item-body">
                                <div class="news-carousel__item-subtitle">Cryptocurrency</div>
                                <h3 class="news-carousel__item-title">
                                    New trends in UI/UX Design World Integration
                                </h3>
                                <p>
                                    Specially for our VIP customers the LH Crypto team representatives Alexander Smirnov and
                                    Antonis Lapos will conduct a number of personal meet-
                                </p>
                                <div class="news-carousel__item-data">
                                    September, 15 2017
                                </div>
                            </div>
                        </a>

                        <a data-aos-delay="200" href="#" class="news-carousel__item">
                            <div class="news-carousel__item-body">
                                <div class="news-carousel__item-subtitle">Cryptocurrency</div>
                                <h3 class="news-carousel__item-title">
                                    New trends in UI/UX Design World Integration
                                </h3>
                                <p>
                                    Specially for our VIP customers the LH Crypto team representatives Alexander Smirnov and
                                    Antonis Lapos will conduct a number of personal meet-
                                </p>
                                <div class="news-carousel__item-data">
                                    September, 15 2017
                                </div>
                            </div>
                        </a>

                        <a href="#" class="news-carousel__item">
                            <div class="news-carousel__item-body">
                                <div class="news-carousel__item-subtitle">Cryptocurrency</div>
                                <h3 class="news-carousel__item-title">
                                    New trends in UI/UX Design World Integration
                                </h3>
                                <p>
                                    Specially for our VIP customers the LH Crypto team representatives Alexander Smirnov and
                                    Antonis Lapos will conduct a number of personal meet-
                                </p>
                                <div class="news-carousel__item-data">
                                    September, 15 2017
                                </div>
                            </div>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="partners">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-header section-header--tire section-header--medium-margin">
                        <h4>Our friends</h4>
                        <h2>Partners</h2>
                    </div>

                    <div class="logoes">
                        <div>
                            <img src="{{ asset('assets/images/partners-logo-1.png') }}" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('assets/images/partners-logo-2.png') }}" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('assets/images/partners-logo-3.png') }}" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('assets/images/partners-logo-4.png') }}" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('assets/images/partners-logo-5.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="press section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="section-header section-header--center section-header--medium-margin">
                        <h4>Press About us</h4>
                        <h2>Press About Cryptoland</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-12 col-sm-6">
                    <a href="#" class="press__item">
                        <img src="{{ asset('assets/images/press-logo-1.png') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-12 col-sm-6">
                    <a href="#" class="press__item">
                        <img src="{{ asset('assets/images/press-logo-2.png') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-12 col-sm-6">
                    <a href="#" class="press__item">
                        <img src="{{ asset('assets/images/press-logo-3.png') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-12 col-sm-6">
                    <a href="#" class="press__item">
                        <img src="{{ asset('assets/images/press-logo-4.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
