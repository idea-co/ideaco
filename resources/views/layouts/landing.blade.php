<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/favicon.png') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @yield('title')
    </head>
<body id="home">

    <!--header section-->
    @include('partials.landing.header')
    
    <!-- main section -->
    @yield('content')

  	<!--footer section-->
  	<footer class="ideaco_footer">
        <div class="ideaco_footer__1">
            <img src="{{ asset('/img/secondary_logo.png') }}"/>
                <p>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                </p>
            <p>&#169; 2020 IDEACO Management System</p>
        </div>
        <div class="ideaco_footer__2">
            <div class="ideaco_footer__2__links">
                <h5>Links</h5>
                <a href="{{ route('about') }}">About</a>
                <a href="{{ route('faq') }}">FAQ</a>
                <a href="{{ route('contact') }}">Contact Us</a>
            </div>
            <div class="ideaco_footer__2__sociallinks">
                <img src="{{ asset('/img/twitter.png') }}"/>
                <img src="{{ asset('/img/instagram.png') }}"/>
                <img src="{{ asset('/img/facebook.png') }}"/>
            </div>
        </div>
        <p class="ideaco_footer__copyright--mobile">&#169; 2020 IDEACO Management System</p>
	</footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/landing.js') }}"></script>
</body>
</html>