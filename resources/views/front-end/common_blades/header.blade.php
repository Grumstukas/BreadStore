<!--***--***--***-- header --***--***--***-->
<div class="kontainer header-wide">
    <div class="meniu meniu_left">
        <a href="{{route('front-end.warehouse.index')}}" class="meniu_choice choice">Product</a>
        <a href="{{route('hello')}}" class="meniu_choice choice">Admin</a>
        <a href="{{route('front-end.home.index')}}" class="meniu_choice choice">Home</a>
    </div>
    <div class="meniu logo">
        <a href="/">
            <img src="{{asset('../images/bread/logo-light.png')}}" alt="logo">
        </a>
    </div>
    <div class="meniu meniu_right">
        <a href="/" class="meniu_choice choice">Gallery</a>
        <a href="/" class="meniu_choice choice">Blogs</a>
        <a href="/" class="meniu_choice choice">Contacts</a>
    </div>
    <div class="meniu meniu_icons">
        <a href="/" class="fa fa-search"></a>
        <a href="{{route('front-end.shopping_basket.index')}}" class="fa fa-shopping-basket">
            <div class="goodsCount" data-url="{{route('front-end.home.refresh')}}">&nbsp;</div>
        </a>
    </div>
</div>

{{--<div class="kontainer header-slim">--}}
{{--    <div id="hamburger" class="meniu">--}}
{{--        <!-- class="meniu" -->--}}
{{--        <div class="bar bar1 "></div>--}}
{{--        <div class="bar bar2 "></div>--}}
{{--        <div class="bar bar3 "></div>--}}
{{--    </div>--}}
{{--    <div class="curtainMeniu">--}}
{{--        <div class="curtainMeniuContent"></div>--}}
{{--    </div>--}}
{{--    <div class="meniu logo">--}}
{{--        <a href="/">--}}
{{--            <img src="images/bread/logo-light.png" alt="logo">--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <div class="meniu meniu_icons">--}}
{{--        <a href="/" class="fa fa-search"></a>--}}
{{--        <a href="/" class="fa fa-shopping-basket">--}}
{{--            <div class="goodsCount">0</div>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</div>--}}
