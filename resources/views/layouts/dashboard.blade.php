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
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
<title>IDEACO - Dashboard</title>
</head>
<body id="dashboard_layout">
    <div class="dashboard" id="app">
        <!--sidebar-->
        <sidebar></sidebar>
        
        <div class="content">
            <header class="content__header">
                <div class="content__header__section1">
                    <div class="content__header__section1__desc">
                        <a href="/">
                            <img src="{{ asset('../img/primary_logo.png') }}" />
                        </a>
                        <h2>Welcome Jonathan</h2>
                        <p>Your job, your idea</p>
                    </div>
                    <div class="content__header__section1__profile"><i class="far fa-user"></i></div>
                </div>
                <div class="content__header__section2">
                    <h2>Explore</h2>
                    <a class="content__header__section2__link content__header__section2__link--active">Most Active</a>
                    <a class="content__header__section2__link">Highest Voted</a>
                    <a class="content__header__section2__link">Most Recent</a>
                    <a class="content__header__section2__link filter"><i class="fas fa-filter"></i><span> Filter </span><i class="fas fa-caret-down"></i></a>
                    <!--<a class="menu_icon" onclick="toggle_sidebar()"><i class="fas fa-bars"></i></a>-->
                </div>
            </header>
            @yield('content')
        </div>

    </div>

    <div class="shareicon_mobile"><img src="{{ asset('/img/plus.png') }}"/></div>
    <footer class="dashboard_footer">
        <div class="explore active"><img src="{{ asset('/img/Group9.png') }}"/></div>
        <div class="challenge"><img src="{{ asset('/img/Group10.png') }}"/></div>
        <div class="overview"><img src="{{ asset('/img/Group11.png') }}"/></div>
        <div class="history"><img src="{{ asset('/img/Group12.png') }}"/></div>
    <footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>

</body>
</html>