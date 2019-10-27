<!DOCTYPE html>
<html lang="LT_lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('../css/font-awesome.min.css')}}">
    <title>@yield('title', 'BREADY')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Style -->

    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">


</head>
<body>

@include('front-end.common_blades.header')

@include('front-end.home.hero')

@include('front-end.home.about')

@include('front-end.home.quote')

@include('front-end.home.deal_of_the_day')

@include('front-end.home.testimonials')

@include('front-end.home.blog')

{{--@include('front-end.common_blades.delivery')--}}

@include('front-end.common_blades.footer')
</body>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</html>

