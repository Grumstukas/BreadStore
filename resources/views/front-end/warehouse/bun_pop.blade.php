<div class="popup">
    <div class="left" style="background-image: {{asset('/img/'.$bun->file)}}">
        <img src="{{asset('/img/'.$bun->file)}}" alt="{{$bun->name}}">
    </div>
    <div class="right">
        <div class="bun_name text">{{$bun->name}}</div>
        <div class="bun_description text">{{$bun->description}}</div>
        <div class="bun_tag text">
            <?php $counter = 1; ?>
            @foreach($tags as $tag)
                @if($counter == count($tags))
                    {{$tag->title}}
                @else
                    {{$tag->title}} /
                @endif
                <?php $counter++; ?>
            @endforeach
        </div>
        <div class="price">
            @if(isset($bun->price_discount))
                <span class="bun_price text" style="width: 50%; text-align: right">{{$bun->price}} €</span>
                <span class="bun_price_discount text"
                      style="width: 50%; text-align: left">{{$bun->price_discount}} €</span>
            @else
                <span class="bun_price_discount text" style="width: 100%; text-align: center">{{$bun->price}} €</span>
            @endif
        </div>

        <label>Kiekis:</label>
        <input id="count" type="number" name="amount" min="1" class="form-control">
        <button id="buy" class="myButton" type="button" data-url="{{route('front-end.warehouse.add')}}"
                data-id="{{$bun->id}}"><small>Į krepšelį</small></button>

    </div>
    <a href="{{route('front-end.warehouse.index')}}" id="clear" class="myButton clear">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path
                d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </a>
</div>


