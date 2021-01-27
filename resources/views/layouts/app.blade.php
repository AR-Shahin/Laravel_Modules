<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   @stack('css')
    <title>@yield('title') | Laravel module</title>
</head>
<body>
    @yield('app_content')
<script src="{{ asset('js/app.js') }}"></script>
@stack('script')
</body>
</html>
