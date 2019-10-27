@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Naujo požymio registracija</div>

                    <div class="card-body">
                        <div class="form-group">

                            <form method="POST" action="{{route('admin.tag.store')}}">

                                <label>Požymis:</label>
                                <input type="text" name="tag_title" class="form-control">

                                <label>Aprašas:</label>
                                <textarea name="tag_description" id="summernote" class="form-control"></textarea>

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
