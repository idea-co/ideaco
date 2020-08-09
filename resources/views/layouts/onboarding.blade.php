<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
</head>
<body>
    <div id="app">
        <h2>Using the onboarding layout</h2>
        @yield('content')
    </div>

    @stack('js')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>