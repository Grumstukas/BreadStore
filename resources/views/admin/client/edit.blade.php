@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kliento informacija</div>

                    <div class="card-body">

                        <div class="form-group">

                            <form method="POST" action="{{route('admin.client.update',[$client])}}">

                                <label>Vardas:</label>
                                <input type="text" name="client_name" class="form-control"
                                       value="{{$client->name}}">

                                <label>Pavardė:</label>
                                <input type="text" name="client_surname" class="form-control"
                                       value="{{old('client_surname', $client->surname)}}">

                                <label>Elektroninis paštas:</label>
                                <input type="email" name="client_email" class="form-control"
                                       value="{{old('client_email', $client->email)}}">

                                <label>Miestas:</label>
                                <input type="text" name="client_city" class="form-control"
                                       value="{{old('client_city', $client->city)}}">

                                <label>Gatvė:</label>
                                <input type="text" name="client_street" class="form-control"
                                       value="{{old('client_street', $client->street)}}">

                                <label>Pašto kodas:</label>
                                <input type="text" name="client_post_code" class="form-control"
                                       value="{{old('client_post_code', $client->post_code)}}">

                                <label>Telefono numeris:</label>
                                <input type="text" name="client_phone" class="form-control"
                                       value="{{old('client_phone', $client->phone)}}">

                                @csrf
                                <button type="submit" style="margin-top: 20px;"><small>Atnaujinti</small></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

