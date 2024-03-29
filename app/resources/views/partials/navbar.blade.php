@push('script')
@endpush
<header class="header">
    <a href="#" class="logo">
        <img class="logo__img logo__img--big" src="{{ asset('assets/images/lidoma-logo-green-1-1.png') }}" alt="">
        {{-- <div class="logo__title">Cryptoland</div> --}}
    </a>

    <ul class="menu">
        <li class="menu__item">
            <a href="{{ route('index') }}" class="menu__link">Home</a>
        </li>
        <li class="menu__item">
            <a href="{{ route('service') }}" class="menu__link">Services</a>
        </li>
        {{-- <li class="menu__item">
            <a href="{{route("token")}}" class="menu__link">Token</a>
        </li> --}}
        <li class="menu__item">
            <a href="{{ route('blog') }}" class="menu__link">Blog</a>
        </li>
        <li class="menu__item">
            <a href="{{ route('team') }}" class="menu__link">Team</a>
        </li>
        <li class="menu__item">
            <a href="{{ route('faq') }}" class="menu__link">FAQ</a>
        </li>
        <li class="menu__item">
            <a href="{{ route('about') }}" class="menu__link">About us</a>
        </li>
        <li class="menu__item">
            <a href="{{ route('contact') }}" class="menu__link">contact us</a>
        </li>
    </ul>

    <div class="header__right">

        <div class="sign-in-wrap">
            <a href="#" class="btn-sign-in">Join to Lidoma family </a>
        </div>
    </div>

    <div class="btn-menu">
        <div class="one"></div>
        <div class="two"></div>
        <div class="three"></div>
    </div>
</header>
<div class="fixed-menu">
    <div class="fixed-menu__header">
        <a href="#" class="logo">
            <div class="logo__img"></div>
            <div class="logo__title">Cryptoland</div>
        </a>

        <div class="btn-close">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                x="0px" y="0px" viewBox="0 0 47.971 47.971"
                style="enable-background:new 0 0 47.971 47.971;" xml:space="preserve" width="512px" height="512px">
                <path
                    d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88   c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242   C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879   s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"
                    fill="#006DF0" />
            </svg>
        </div>
    </div>

    <div class="fixed-menu__content">

        <ul class="mob-menu">
            <li class="mob-menu__item">
                <a href="{{ route('index') }}" class="menu__link">Home</a>
            </li>
            <li class="mob-menu__item">
                <a href="{{ route('service') }}" class="menu__link">Services</a>
            </li>
            <li class="mob-menu__item">
                <a href="{{ route('token') }}" class="menu__link">Token</a>
            </li>
            <li class="mob-menu__item">
                <a href="{{ route('blog') }}" class="menu__link">Blog</a>
            </li>
            <li class="mob-menu__item">
                <a href="{{ route('team') }}" class="menu__link">Team</a>
            </li>
            <li class="mob-menu__item">
                <a href="{{ route('faq') }}" class="menu__link">FAQ</a>
            </li>
            <li class="mob-menu__item">
                <a href="{{ route('about') }}" class="menu__link">About us</a>
            </li>
            <li class="mob-menu__item">
                <a href="{{ route('contact') }}" class="menu__link">contact us</a>
            </li>
        </ul>


        <div class="btn-wrap">
            <a href="#" class="btn-sign-in">Join Cryptoland ICO</a>
        </div>


    </div>
</div>
