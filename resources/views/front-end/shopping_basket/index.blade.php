<!DOCTYPE html>
<html lang="LT_lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <title>@yield('title', 'BREADY-basket')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Style -->

    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">


</head>
<body>

@include('front-end.common_blades.header')
<div id="kashikas">
@include('front-end.shopping_basket.body')
</div>
{{--@include('front-end.common_blades.delivery')--}}

@include('front-end.common_blades.footer')

</body>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</html>
