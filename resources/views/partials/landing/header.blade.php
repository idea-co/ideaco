<header class="ideaco_header ideaco_header--mobile ">
    <a href="{{ route('home') }}">
        <img src="{{ asset('/img/primary_logo.svg') }}"/>
    </a>
    <a class="ideaco_header__menu">
        <img class="menu_icon" src="{{ asset('/img/menu_icon.svg') }}"/>
        <i class="fas fa-times"></i>
    </a>

    <div class="ideaco_header__navbar1">
        <a href="{{ route('about') }}">ABOUT</a>
        <a href="{{ route('faq') }}">FAQ</a>
        <a href="{{ route('contact') }}">CONTACT US</a>
    </div>
    <div class="ideaco_header__navbar2">
        <a href="{{ url('/start/#/sign-in') }}" class="login">Log In</a>
        <button onclick="window.location.href='/start'">Get Started</button>
    </div>
</header>