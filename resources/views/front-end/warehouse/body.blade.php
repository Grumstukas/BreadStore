<div class="kontainer wh">
{{--    <div class="warehouse_hero">hero</div>--}}
    <div class="filtering">
        <div class="filtering">
            <div class="section_name">Kategorijos</div>
            @foreach($tags as $tag)
                <a style="width: 100%" href="{{route('front-end.warehouse.index', [$tag])}}">{{$tag->title}}</a>
            @endforeach
                <a style="width: 100%" href="{{route('front-end.warehouse.index')}}">pašalinti filtrą</a>
        </div>
        <div class="filtering">
            <div class="section_name">Pagal kainą</div>
            <a style="width: 100%" href="{{route('front-end.warehouse.index', ['filter'=>'money', 'filter_from'=>0, 'filter_to'=>3 ])}}">0 - 3 €</a>
            <a style="width: 100%" href="{{route('front-end.warehouse.index', ['filter'=>'money', 'filter_from'=>3, 'filter_to'=>6 ])}}">3 - 6 €</a>
        </div>
    </div>
    <div id="bigBun" style="display: none"></div>
    <div class="warehouse grid">
        @foreach($buns as $bun)


        <a href="{{route('front-end.warehouse.bun_pop')}}" data-id="{{$bun->id}}" class="good" id="{{$bun->id}}">
            <img src="{{asset('/img/'.$bun->file)}}" alt="{{$bun->name}}">
            <div class="content">
                <div class="text name">{{$bun->name}}</div>
                <div class="text categories">
                    @foreach ($product_tags as $product_tag)
                        @if($bun->id == $product_tag->bun_id)
                            @foreach ($tags as $tag)
                                @if($tag->id == $product_tag->tag_id)
                                    <b> {{$tag->title}} </b>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <div class="text starring">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                <div class="price">
                    @if(isset($bun->price_discount))
                        <span class="text old_price">{{$bun->price}} €</span>
                        <span class="text new_price">{{$bun->price_discount}} €</span>
                    @else
                        <span class="text new_price">{{$bun->price}} €</span>
                    @endif
                </div>
            </div>
            @if(isset($bun->price_discount))
                <div class="discount">
                    -{{(100 - round(($bun->price_discount / $bun->price) * 100))}}%
                </div>
            @endif

            @if(($today->diff($bun->created_at))->d <= 1)

            <div class="new">new</div>
            @endif
        </a>
        @endforeach
    </div>
</div>
<div id="bun_pop" class="bun_pop"></div>
