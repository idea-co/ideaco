<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
</head>
<body>
    @yield('content')

    @stack('js')

    <script src="{{ assets('js/onboarding.js') }}"></script>
</body>
</html>