@extends('layout.app')


@push("style")
@endpush




@push("script")

@endpush



@section("main")

<section class="section about" id="about">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="section-header section-header--animated section-header--tire section-header--small-margin">
          <h4>About ICO</h4>
          <h2>Cryptoland Theme <span>is the best for your ICO</span>
              </h2>
        </div>
        <div class="about__animated-content">
          <p>
            Spend real fights effective anything extra by leading. Mouthwatering leading how real formula also locked-in have can mountain thought. Jumbo plus shine sale.
          </p>
          <ul>
            <li>
              Mouthwatering leading how real formula also 
            </li>
            <li>Locked-in have can mountain thought</li>
            <li>Locked-in have can mountain thought</li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6 offset-lg-1 align-items-center">
        <img src="{{ asset("assets/images/about-img.png")}}" class="about__img img-responsive" alt="">
      </div>
    </div>
  </div>
  <img src="{{ asset("assets/images/about-bg.png")}}" data-jarallax-element="40" alt="" class="about__bg">
</section>

<section class="advisors">
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="section-header section-header--animated section-header--center section-header--big-margin">
          <h4>Family</h4>
          <h2>Advisors</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="advisor">
          <a href="#" class="advisor__img">
            <img src="{{ asset("assets/images/advisor-avatar-1.jpg")}}" alt="">
            <div class="advisor__sn">
              <img src="{{ asset("assets/images/facebook.svg")}}" alt="">
            </div>
          </a>
          <div class="advisor__content">
            <div class="advisor__title">
              David Drake
            </div>
            <div class="advisor__post">
              CEO Capital Limited
            </div>
            <p class="advisor__text">
              JavaScript virtual machines (VMs) and platforms built upon them have also increased the popularity of JavaScript for server-side web 
            </p>
          </div>
        </div>
      </div>

      <div  data-aos-delay="200" class="col-md-6">
        <div class="advisor">
          <a href="#" class="advisor__img">
            <img src="{{ asset("assets/images/advisor-avatar-2.jpg")}}" alt="">
            <div class="advisor__sn">
              <img src="{{ asset("assets/images/linkedin.svg")}}" alt="">
            </div>
          </a>
          <div class="advisor__content">
            <div class="advisor__title">
              Ann Balock
            </div>
            <div class="advisor__post">
              Cryptonet Speaker
            </div>
            <p class="advisor__text">
              JavaScript virtual machines (VMs) and platforms built upon them have also increased the popularity of JavaScript for server-side web 
            </p>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="advisor">
          <a href="#" class="advisor__img">
            <img src="{{ asset("assets/images/advisor-avatar-3.jpg")}}" alt="">
            <div class="advisor__sn">
              <img src="{{ asset("assets/images/google-plus.svg")}}" alt="">
            </div>
          </a>
          <div class="advisor__content">
            <div class="advisor__title">
              Vladimir Nikitin
            </div>
            <div class="advisor__post">
              Cryptonet Team Lead
            </div>
            <p class="advisor__text">
              Giant wels roach spotted danio Black swallower cowfish bigscale flagblenny central mudminnow. Lighthousefish combtooth blenny
            </p>
          </div>
        </div>
      </div>

      <div  data-aos-delay="200" class="col-md-6">
        <div class="advisor">
          <a href="#" class="advisor__img">
            <img src="{{ asset("assets/images/advisor-avatar-4.jpg")}}" alt="">
            <div class="advisor__sn">
              <img src="{{ asset("assets/images/facebook.svg")}}" alt="">
            </div>
          </a>
          <div class="advisor__content">
            <div class="advisor__title">
              Sam Peters
            </div>
            <div class="advisor__post">
              Team Lead Advisor
            </div>
            <p class="advisor__text">
              Lampfish combfish, roundhead lemon sole armoured catfish saw shark northern stargazer smooth dogfish cod icefish scythe butterfish
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection