<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Blog</title>

        <!-- Fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Nunito" >
        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css<?= '?time=' . time() ?>">

        <!--Fixed Css-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css?time='.time())}}">

    </head>
    <body class="d-flex flex-column min-vh-100">
        <div class="wrapper flex-grow-1">
            <div class="screenLoader" style="background: rgba( 255, 255, 255, .8 ) url('{{asset('image/loader.gif')}}') 50% 50% no-repeat;"></div>
            <main>
                @include('layouts.header')
                @yield('content')
            </main>
        </div>
        @include('layouts.footer')


        <!--script area-->
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js<?= '?time=' . time() ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="{{asset('js/jquery.noty.packaged.js?time='.time())}}"></script>        
        <script src="{{asset('js/LaravelFormValidator.js?time='.time())}}"></script>        
        <script src="{{asset('js/custom.js?time='.time())}}"></script>        
    </body>
</html>
