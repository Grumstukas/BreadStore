<form method="POST" action="{{route('admin.client.processing')}}">

    <div class="identification column">

        <div class="title">Asmeniniai duomenys</div>

        <div class="box">
            <label>Vardas:</label>
            <input type="text" name="client_name" class="form-control">
        </div>


        <div class="box">
            <label>Pavardė:</label>
            <input type="text" name="client_surname" class="form-control">
        </div>


        <div class="box">
            <label>El.paštas:</label>
            <input type="email" name="client_email" class="form-control">
        </div>


        <div class="box">
            <label>Telefonas:</label>
            <input type="tel" name="client_phone" class="form-control">
        </div>


        <div class="box">
            <label>Miestas / Kaimas:</label>
            <input type="text" name="client_city" class="form-control">
        </div>


        <div class="box">
            <label>Gatvė:</label>
            <input type="text" name="client_street" class="form-control">
        </div>


        <div class="box">
            <label>Pašto kodas:</label>
            <input type="text" name="client_post_code" class="form-control">
        </div>

    </div>

    <div class="delivery_method column">
        <div class="title">Pristatymas</div>

        @foreach($delivery_info as $info => $value)
            <div class="box">
                <input type="radio" class="deliveryMethod" data-way="{{$info}}" id="{{$info}}" name="delivery"
                       value="{{$info}}" data-url="{{route('front-end.complete.update')}}">
                <label for="{{$info}}">
                    <div class="text">
                        <div class="how"><b>{{$value['how']}}</b></div>
                        <div class="when">{{$value['when']}}</div>
                    </div>
                    <div class="price">{{$value['price']}} €</div>
                </label>
            </div>
        @endforeach

    </div>
    <div class="payment_method column">
        <div class="title">Mokėjimo būdas</div>

        @foreach($bank_info as $info => $value)

            <div class="box">
                <input type="radio" id="{{$info}}" name="bank" value="{{$info}}">
                <label for="{{$info}}">
                    <img src="../images/delivery/{{$value['img']}}" alt="{{$value['name']}}">
                </label>
            </div>


        @endforeach

    </div>

    @csrf
    <button type="submit" class="myButton" style="margin-top: 20px;"><small>Sumokėti:
            <div class="totalPrice">{{$totalCartSum}}</div> €
        </small></button>
</form>
