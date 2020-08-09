<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta name="Description" content="Your typical Idea Management tool"/>
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/favicon.png') }}">
		<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		@yield('title')
	</head>
<body id="join">
    <div id="app">
		<section class="header-section">
			<div class="container ">
				<div class="row justify-content-center">
					<div class="col-md-8 col-sm-11 col-10 text-center">
                        <div class="hero-bg ">
                            <!-- HERADER SECTION -->
                            <div class="shade">
                                <a href="{{ route('home') }}">
                                    <img src="{{ asset('/img/primary_logo.png') }}" alt="Logo">
                                </a>
                            </div>
                            @yield('content')
                            <!-- MAIN NO BACKGROUND SECTION -->
                            <section class="main-section bg-white">
                                <div class="row justify-content-center main">
                                    <div class="sign-in color-white">
                                        <div class="minibox color-grey">    
                                            <div class="mt-3 issue">
                                                <p class="mb-0 mt-3">
                                                    Not sure of your ideaspace? <router-link to="/find">Let’s find it then</router-link>
                                                </p>
                                                <p class="mb-5">
                                                    Don’t have an ideaspace yet? <router-link to="/new">Create one now</router-link>
                                                </p>
                                            </div>               
                                            <!-- FOOTER -->
                                            <section class="footer-section color-grey mb-5">
                                                <p class="">Issus?</p>
                                                <h5><a href="{{ route('contact') }}" class="color-grey">CONTACT US</a> </h5>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @stack('js')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>