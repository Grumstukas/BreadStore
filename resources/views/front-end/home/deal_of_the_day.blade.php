<!--***--***--***-- deal_of_the_day --***--***--***-->
<div class="kontainer deal_of_the_day">
    <div class="deal_of_the_day_body">
        <div class="title title_line1">Deal of the day</div>
        <div class="title title_line2">breads every day</div>
        <img src="{{asset('images/bread/floral_grande.png')}}" alt="" class="title title_line3">

        <div class="goods">
            @foreach($buns as $bun)
                <div class="good">
                    <img src="{{asset('/img/'.$bun->file)}}" alt="{{$bun->name}}">
                    <div class="description">
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
                        @if(isset($bun->price_discount))
                            <div class="text old_price">{{$bun->price}} €</div>
                            <div class="text new_price">{{$bun->price_discount}} €</div>
                            <div class="discount" style="background-image: url(../images/bread/badge-brown.png);">
                                -{{(100 - round(($bun->price_discount / $bun->price) * 100))}}%
                            </div>
                        @else
                            <div class="text new_price">{{$bun->price}} €</div>
                        @endif

                        @if(($today->diff($bun->created_at))->d <= 1)

                            <div class="new" style="background-image: url(../images/bread/badge-red.png);">new</div>
                        @endif
                    </div>
                    <div class="amount_to_buy">
                        <label>Kiekis:</label>
                        <input class="count" type="number" name="amount" min="1" class="form-control">
                        <button id="buy" class="myButton" type="button" data-url="{{route('front-end.warehouse.add')}}"
                                data-id="{{$bun->id}}"><small>Į krepšelį</small></button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="button"><a href="{{ route('front-end.warehouse.index') }}">more</a></div>


    </div>
</div>
