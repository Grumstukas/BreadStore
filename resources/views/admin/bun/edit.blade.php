@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Naujo produkto registracija</div>

                    <div class="card-body">

                        <div class="form-group">

                            <form method="POST" action="{{route('admin.bun.update',[$bun])}}" enctype="multipart/form-data">

                                <label>Produkto pavadinimas:</label>
                                <input type="text" name="bun_name" class="form-control"
                                       value="{{old('bun_name', $bun->name)}}">

                                <label>Nuotrauka</label>
                                <input type="file" class="form-control" name="bun_photo">

                                <label>Aprašas:</label>
                                <textarea name="bun_description" id="summernote"
                                          class="form-control">{{old('bun_description', $bun->description)}}</textarea>

                                <label>Kaina:</label>
                                <input type="number" name="bun_price" step="0.01" min="0" max="100" class="form-control"
                                       value="{{old('bun_price', $bun->price)}}">

                                <label>Kaina su nuolaida:</label>
                                <input type="number" name="bun_price_discount" step="0.01" min="0" max="100" class="form-control"
                                       value="{{old('bun_price_discount', $bun->price_discount)}}">

                                <label>Bandelės požymiai:</label><br>
                                <?php $countTag = 0; ?>

                                @foreach ($tags as $tag)
                                    @if(in_array($tag->id, $oldTagsID))
                                        <input type="checkbox" id="inlineCheckbox{{$countTag}}" name="tag[]" value="{{$tag->id}}"checked> {{$tag->title}}<br>
                                    @else(!in_array($tag->id, $oldTagsID))
                                        <input type="checkbox" id="inlineCheckbox{{$countTag}}" name="tag[]" value="{{$tag->id}}"> {{$tag->title}}<br>
                                    @endif
                                        <?php $countTag++; ?>
                                @endforeach

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

