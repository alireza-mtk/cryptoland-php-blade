@extends('layout.app')


@push("style")

@endpush

@push("script")



@endpush


@section("main")

<section class="section section--no-pad-bot services" id="services">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-header section-header--animated section-header--center section-header--medium-margin">
                    <h4>Awesome services</h4>
                    <h2>Why it needs?</h2>
                </div>

                <div class="services__items">
                    <div class="services__left">
                        <div class="service">
                            <div class="service__bg" style="background-color: #e85f70; box-shadow: 0 0 51px rgba(232, 95, 112, 0.74); box-shadow: 0 0 51px rgba(232, 95, 112, 0.74);"></div>
                            <img src="{{ asset("assets/images/service-icon-1.svg")}}" alt="">
                            <div class="service__title">
                                Mining Service
                            </div>
                        </div>
                        <div class="service">
                            <div class="service__bg" style="background-color: #fa8936; background-image: linear-gradient(-234deg, #ea9d64 0%, #fa8936 100%); box-shadow: 0 0 51px rgba(250, 137, 54, 0.74);"></div>
                            <img src="{{ asset("assets/images/service-icon-2.svg")}}" alt="">
                            <div class="service__title">
                                Cryptoland App
                            </div>
                        </div>
                    </div>
                    <div class="services__right">
                        <div class="service" >
                            <div class="service__bg" style="background-image: linear-gradient(-234deg, #6ae472 0%, #4bc253 100%); box-shadow: 0 0 51px rgba(75, 194, 83, 0.74);"></div>
                            <img src="{{ asset("assets/images/service-icon-3.svg")}}" alt="">
                            <div class="service__title">
                                Blockchain
                            </div>
                        </div>
                        <div  class="service">
                            <div class="service__bg" style="background-color: #0090d5; background-image: linear-gradient(-234deg, #29aceb 0%, #0090d5 100%); box-shadow: 0 0 51px rgba(0, 144, 213, 0.74);"></div>
                            <img src="{{ asset("assets/images/service-icon-4.svg")}}" alt="">
                            <div class="service__title">
                                Exchange
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img src="{{ asset("assets/images/services-bg1.png")}}" alt="" class="services__bg">
    <img src="{{ asset("assets/images/services-bg-1.png")}}" class="services__cosmos" alt="">
</section>
<section class="section cases">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-header section-header--animated section-header--center section-header--medium-margin">
                    <h4>Some facts</h4>
                    <h2>Use Cases</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col cases__list">
                <div class="cases__item">
                    <img src="{{ asset("assets/images/cases-icon-1.png")}}" alt="" class="cases__item-icon">
                    <div class="cases__item-content">
                        <div class="cases__item-title">
                            Cryptoland App
                        </div>
                        <p class="cases__item-text">
                            Asiatic glassfish pilchard sandburrower, orangestriped triggerfish hamlet Molly Miller trunkfish spiny dogfish! Jewel tetra frigate mackerel
                        </p>
                    </div>
                </div>
                <div  data-aos-delay="200" class="cases__item">
                    <img src="{{ asset("assets/images/cases-icon-2.png")}}" alt="" class="cases__item-icon">
                    <div class="cases__item-content">
                        <div class="cases__item-title">
                            Mining Service
                        </div>
                        <p class="cases__item-text">
                            Spend real fights effective anything extra by leading. Mouthwatering leading how real formula also locked-in have can mountain thought. Jumbo
                        </p>
                    </div>
                </div>
                <div class="cases__item">
                    <img src="{{ asset("assets/images/cases-icon-3.png")}}" alt="" class="cases__item-icon">
                    <div class="cases__item-content">
                        <div class="cases__item-title">
                            Blockchain
                        </div>
                        <p class="cases__item-text">
                            Clownfish catfish antenna codlet alfonsino squirrelfish deepwater flathead sea lamprey. Bombay duck sand goby snake mudhead
                        </p>
                    </div>
                </div>
                <div  data-aos-delay="200" class="cases__item">
                    <img src="{{ asset("assets/images/cases-icon-4.png")}}" alt="" class="cases__item-icon">
                    <div class="cases__item-content">
                        <div class="cases__item-title">
                            Exchange
                        </div>
                        <p class="cases__item-text">
                            Barbelless catfish pelican gulper candlefish thornfishGulf menhaden ribbonbearer riffle dace black dragonfish denticle herring
                        </p>
                    </div>
                </div>
                <div class="cases__item">
                    <img src="{{ asset("assets/images/cases-icon-5.png")}}" alt="" class="cases__item-icon">
                    <div class="cases__item-content">
                        <div class="cases__item-title">
                            Cryptoland
                        </div>
                        <p class="cases__item-text">
                            Clownfish catfish antenna codlet alfonsino squirrelfish deepwater flathead sea lamprey. Bombay duck sand goby snake mudhead
                        </p>
                    </div>
                </div>
                <div  data-aos-delay="200" class="cases__item">
                    <img src="{{ asset("assets/images/cases-icon-6.png")}}" alt="" class="cases__item-icon">
                    <div class="cases__item-content">
                        <div class="cases__item-title">
                            Cryptoland App
                        </div>
                        <p class="cases__item-text">
                            Asiatic glassfish pilchard sandburrower, orangestriped triggerfish hamlet Molly Miller trunkfish spiny dogfish!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="#" class="btn btn--orange btn--uppercase"><span>Join ICO</span></a>
        </div>
    </div>
    <img src="{{ asset("assets/images/cases-bg.png")}}"  class="cases__bg" alt="">
    <img src="{{ asset("assets/images/cases-imgs.png")}}"  class="cases__elements" alt="">
</section>

@endsection