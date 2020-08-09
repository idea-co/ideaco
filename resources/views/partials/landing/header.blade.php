<header class="ideaco_header ideaco_header--mobile ">
    <a href="{{ route('home') }}">
        <img src="{{ asset('/img/primary_logo.png') }}"/>
    </a>
    <a class="ideaco_header__menu" onclick="toggle_menu()">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times"></i>
    </a>

    <div class="ideaco_header__navbar1">
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('faq') }}">FAQ</a>
        <a href="{{ route('contact') }}">Contact Us</a>
    </div>
    <div class="ideaco_header__navbar2">
        <a href="{{ url('/start/#/join') }}" class="login">Log In</a>
        <button onclick="window.location.href='/start'">Get Started</button>
    </div>
</header>