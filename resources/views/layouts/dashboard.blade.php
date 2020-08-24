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
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
<title>IDEACO - Dashboard</title>
</head>
<body id="dashboard_layout">
    <div class="dashboard" id="app">
        <!--sidebar-->
        <sidebar></sidebar>
        
        <div class="content">
            
            @yield('content')
        </div>

    </div>

    <div class="shareicon_mobile"><img src="{{ asset('/img/plus.png') }}"/></div>
    <footer class="dashboard_footer">
        <div class="explore active"><img src="{{ asset('/img/Group9.svg') }}"/></div>
        <div class="challenge"><img src="{{ asset('/img/Group10.svg') }}"/></div>
        <div class="overview"><img src="{{ asset('/img/Group11.svg') }}"/></div>
        <div class="history"><img src="{{ asset('/img/Group12.svg') }}"/></div>
    <footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/dashboard.js') }}"></script>
</body>
</html>