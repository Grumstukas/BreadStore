<!DOCTYPE html>
<html lang="LT_lt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Lora&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <title>@yield('title', 'BREADY-warehouse')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Style -->

    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">


</head>
<body>

{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-9">--}}
{{--            @if(session()->has('success_message'))--}}
{{--                <div class="alert alert-success" role="alert">--}}
{{--                    {{session()->get('success_message')}}--}}
{{--                </div>--}}
{{--            @endif--}}

{{--            @if(session()->has('info_message'))--}}
{{--                <div class="alert alert-info" role="alert">--}}
{{--                    {{session()->get('info_message')}}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


@include('front-end.common_blades.header')

@include('front-end.warehouse.body')

{{--@include('front-end.common_blades.delivery')--}}

@include('front-end.common_blades.footer')

</body>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</html>
