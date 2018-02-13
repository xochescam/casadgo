<!DOCTYPE html>
<html>
<head>
    <title>C.A.S.A</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cleartype" content="on">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->
    @if (config('app.env') === 'local')
        <link rel="stylesheet" href="{{ asset('css/main.min.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/main.min.' . config('cache.css.main') . '.css') }}">
    @endif

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body id="@yield('id')" class="@yield('class')">

    @include('partials.header')

    @yield('content')

    @include('partials.footer')


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-cp812HT5751ViiUf_kjS9W5sL3YHCdw"></script>

    @if (config('app.env') === 'local')
        <script src="{{ asset('js/dependencies.min.js') }}"></script>
        <script src="{{ asset('js/main.min.js') }}"></script>
        <script src="{{ asset('js/admin.min.js') }}"></script>
    @else
        <script src="{{ asset('js/dependencies.min.'. config('cache.js.dependencies') . '.js') }}"></script>
        <script src="{{ asset('js/main.min.'. config('cache.js.main') . '.js') }}"></script>
        <script src="{{ asset('js/admin.min.'. config('cache.js.admin') . '.js') }}"></script>
    @endif

</body>
</html>