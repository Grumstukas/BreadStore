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

<div class="message">
    <div class="text_place">
        <div class="text">{{{$text}}}</div>
        <a href="{{route('paysera.return.your_order.pdf',[$order_id])}}">Sąskaita faktūra</a>
        <button class="myButton">Grįžti įpradinį puslapį</button>

    </div>
    <img src="{{asset('/images/'.$img)}}" alt="happy_boy">
</div>


@include('front-end.common_blades.footer')

</body>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</html>
