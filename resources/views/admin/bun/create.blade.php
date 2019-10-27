@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Naujo produkto registracija</div>

                    <div class="card-body">
                        <div class="form-group">

                            <form method="POST" action="{{route('admin.bun.store')}}" enctype="multipart/form-data">

                                <label>Produkto pavadinimas:</label>
                                <input type="text" name="bun_name" class="form-control">

                                <label>Nuotrauka</label>
                                <input type="file" class="form-control" name="bun_photo">

                                <label>Aprašas:</label>
                                <textarea name="bun_description" id="summernote" class="form-control"></textarea>

                                <label>Kaina:</label>
                                <input type="number" name="bun_price" step="0.01" min="0" max="100" class="form-control">

                                <label>Kaina su nuolaida:</label>
                                <input type="number" name="bun_price_discount" step="0.01" min="0" max="100" class="form-control">

                                <label>Bandelės požymiai:</label><br>
                                <?php $countTag = 0; ?>

                                @if(isset($tags))
                                    @foreach ($tags as $tag)
{{--                                        <input type="checkbox" name="tag{{$countTag}}" value="{{$tag->title}}"> {{$tag->title}}<br>--}}
                                        <input type="checkbox" id="inlineCheckbox{{$countTag}}" name="tag[]" value="{{$tag->id}}"> {{$tag->title}}<br>
                                            <?php $countTag++; ?>
                                    @endforeach
                                @endif
                                @csrf
                                <button type="submit" style="margin-top: 20px;"><small>Pridėti</small></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
