@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div>Bandelės</div>
                        <form action="">
                            <input type="radio" id="id" name="order_id" value="x">pagal Užsakymo ID mažėjančia<br>
                            <input type="radio" id="id" name="order_id" value="x">pagal Užsakymo ID didėjančia<br>

                            <input type="radio" id="id" name="client_id" value="x">pagal Kliento ID mažėjančia<br>
                            <input type="radio" id="id" name="client_id" value="x">pagal Kliento ID didėjančia<br>

                            <input type="radio" id="id" name="bun_id" value="x">pagal Bandelės ID mažėjančia<br>
                            <input type="radio" id="id" name="bun_id" value="x">pagal Bandelės ID didėjančia<br>

                            <input type="radio" id="id" name="count" value="x">pagal Kiekį<br>
                            <input type="radio" id="id" name="count" value="x">pagal Kiekį<br>

                            <input type="radio" id="id" name="price" value="x">pagal Kainą<br>
                            <input type="radio" id="id" name="price" value="x">pagal Kainą<br>

                            <input type="radio" id="id" name="created_at" value="x">pagal OrderID<br>

                            <input type="radio" id="id" name="order_status" value="x">apmokėtas<br>
                            <input type="radio" id="id" name="order_status" value="x">neapmokėtas<br>

                        </form>

                    </div>

                    <div class="card-body">

                        <div style="display: inline-block; width: 100%;border-bottom: 1px solid black">
                            <div style="display: inline-block; float: left; width: 15%"><b>Užsakymo ID</b></div>
                            <div style="display: inline-block; float: left; width: 15%"><b>Kliento ID</b></div>
                            <div style="display: inline-block; float: left; width: 15%"><b>Bandelės ID</b></div>
                            <div style="display: inline-block; float: left; width: 15%"><b>Kiekis</b></div>
                            <div style="display: inline-block; float: left; width: 15%"><b>Kaina</b></div>
                            <div style="display: inline-block; float: left; width: 20%"><b>Užsakymo pateikimo data</b></div>
                            <div style="display: inline-block; float: left; width: 5%"><b>Būsena</b></div>
                        </div>

                        @foreach ($order_lists as $order_list)
                            <div style="display: inline-block; width: 100%;">
                                <div style="display: inline-block; float: left; width: 15%">{{$order_list->order_id}}</div>
                                <div style="display: inline-block; float: left; width: 15%">{{$order_list->client_id}}</div>
                                <div style="display: inline-block; float: left; width: 15%">{{$order_list->bun_id}}</div>
                                <div style="display: inline-block; float: left; width: 15%">{{$order_list->count}}</div>
                                <div style="display: inline-block; float: left; width: 15%">{{$order_list->price}}</div>
                                <div style="display: inline-block; float: left; width: 20%">{{$order_list->created_at}}</div>
                                <div style="display: inline-block; float: left; width: 5%">{{$order_list->order_status}}</div>
                            </div><br>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

