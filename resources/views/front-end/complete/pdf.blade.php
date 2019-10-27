<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <style>
        .all{
            display: inline-block;
            float: left;
            width: 100%;
            background-color: #fff6a1;
        }
        .item{
            display: inline-block;
            float: left;
            width: 100%;
            height: 50px;
            border: 1px solid red;
            margin-bottom: 50px;
        }
        .item > .column{
            display: inline-block;
            float: left;
            height: 50px;
            width: 16%;
        }

    </style>

    <title>Saskaita faktūra</title>
</head>
<body>

    <div>Jūsų užsakymas</div>
<div class="all">
    <div class="item header">
        <div class="column"></div>
        <div class="column">Pavadinimas</div>
        <div class="column">Prekės aprašas</div>
        <div class="column">Kiekis</div>
        <div class="column">Vieneto kaina</div>
        <div class="column">Iš viso</div>
        <br>
    </div>
    <div class="item header">
        <div class="column"></div>
        <div class="column">Pavadinimas</div>
        <div class="column">Prekės aprašas</div>
        <div class="column">Kiekis</div>
        <div class="column">Vieneto kaina</div>
        <div class="column">Iš viso</div>
        <br>
    </div>
    <div class="item header">
        <div class="column"></div>
        <div class="column">Pavadinimas</div>
        <div class="column">Prekės aprašas</div>
        <div class="column">Kiekis</div>
        <div class="column">Vieneto kaina</div>
        <div class="column">Iš viso</div>
        <br>
    </div>
</div>

{{--@foreach($buns as $bun)--}}
{{--    <div class="item">--}}
{{--        <div class="column"></div>--}}
{{--        <img src="{{asset('img/'.$bun->file)}}" style="width: 50px;">--}}
{{--        <div class="column">name {{$bun->name}}</div>--}}
{{--        <div class="column">description {{$bun->description}}</div>--}}
{{--        <div class="column">count {{$bun->count}}</div>--}}
{{--        <div class="column">price {{$bun->price}}</div>--}}
{{--        <div class="column">final price {{$bun->final_price}}</div>--}}
{{--        <br>--}}

{{--    </div>--}}
{{--    @endforeach--}}

</body>
</html>
