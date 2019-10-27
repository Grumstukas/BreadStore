<div class="kontainer sb">
    <div class="tableHead">
        <div class="img th">&nbsp;</div>
        <div class="products th">prekės</div>
        <div class="price th">kaina, vnt</div>
        <div class="quantity th">kiekis</div>
        <div class="total th">viso</div>
    </div>
    @if(!empty($wholeCart))
        @foreach($wholeCart as $item)
            <div class="tableRow">
                <div class="total tr">{{$item['price']}} €</div>

                <div class="plus tr">
                    <a href="{{route('front-end.shopping_basket.change')}}" data-key="add" data-id="{{$item['id']}}" class="amount">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"/>
                            <path
                                d="M13 7h-2v4H7v2h4v4h2v-4h4v-2h-4V7zm-1-5C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                        </svg>
                    </a>


                </div>
                <div class="quantity tr">{{$item['amount']}}</div>
                <div class="minus tr">

                    <a href="{{route('front-end.shopping_basket.change')}}" data-key="delete" data-id="{{$item['id']}}" class="amount">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"/>
                            <path
                                d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zm2.46-7.12l1.41-1.41L12 12.59l2.12-2.12 1.41 1.41L13.41 14l2.12 2.12-1.41 1.41L12 15.41l-2.12 2.12-1.41-1.41L10.59 14l-2.13-2.12zM15.5 4l-1-1h-5l-1 1H5v2h14V4z"/>
                            <path fill="none" d="M0 0h24v24H0z"/>
                        </svg>
                    </a>
                    <a href="{{route('front-end.shopping_basket.change')}}" data-key="reduce" data-id="{{$item['id']}}" class="amount">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="none" d="M0 0h24v24H0V0z"/>
                            <path
                                d="M7 11v2h10v-2H7zm5-9C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/>
                        </svg>
                    </a>

                </div>


                <div class="price tr">{{$item['unit_price']}} €</div>
                <div class="products tr">{{$item['name']}}</div>
                <img class="tr" src="{{asset('/img/'.$item['file'])}}" alt="{{$item['file']}}">
            </div>
        @endforeach
    @else
        <div class="emptyCart">Jūsų krepšelis šiuo metu tuštut tuštutėlis..</div>
    @endif
    <div class="tableRow totals">
        <div class="super_total tr">{{$totalCartSum}} €</div>
        <div class="super_total tr">Iš viso:</div>
    </div>
    <div class="tableRow totals">
        <div class="super_total tr">{{$pvm}} €</div>
        <div class="super_total tr">PVM 21% :</div>
    </div>
    <div class="tableRow totals">
        <div class="super_total tr">{{$totalCartSumWithoutPVM}} €</div>
        <div class="super_total tr">Kaina be PVM:</div>
    </div>
    <a href="{{route('front-end.complete.index')}}" class="myButton cash_out_btn" ><small>Pirkti</small></a>
</div>
