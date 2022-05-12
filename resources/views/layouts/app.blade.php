<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name')}} - @yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS imports-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @include('layouts/navbar')

    <div id="app">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
