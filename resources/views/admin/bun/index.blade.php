@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bandelės

                        <a href="{{route('admin.bun.index', ['sort'=>'a-z'])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M3 12v1.5l11 4.75v-2.1l-2.2-.9v-5l2.2-.9v-2.1L3 12zm7 2.62l-5.02-1.87L10 10.88v3.74zm8-10.37l-3 3h2v12.5h2V7.25h2l-3-3z"/><path fill="none" d="M0 0h24v24H0z"/></svg>
                        </a>

                        <a href="{{route('admin.bun.index', ['sort'=>'z-a'])}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M21 12v-1.5L10 5.75v2.1l2.2.9v5l-2.2.9v2.1L21 12zm-7-2.62l5.02 1.87L14 13.12V9.38zM6 19.75l3-3H7V4.25H5v12.5H3l3 3z"/><path fill="none" d="M0 0h24v24H0z"/></svg>
                        </a>

                    </div>

                    <div class="card-body">

                        @foreach ($buns as $bun)
                            <div style="display: inline-block; min-height: 100px;">
                            <div style="width: 90%; display: inline-block; float: left;">
                                <div style="height: 100px; width: 150px; display: inline-block; float: left; ">
                                    <img src="{{asset('/img/'.$bun->file)}}" style="height: 100px; display: inline-block; float: left; margin-right:20px;">
                                </div>
                                <div style="display: inline-block; height: 20px; width: calc( 100% - 150px);" ><b>{{$bun->name}}</b></div>
                                <div style="display: inline-block; height: 20px; width: calc( 100% - 150px);" >{{$bun->description}}</div>

                                @if(isset($bun->price_discount))
                                    <div style="display: inline-block; height: 20px; width: calc( 100% - 150px);">
                                        <div style="display: inline-block; float: left; text-decoration: line-through;">{{$bun->price}} €</div>
                                        <div style="display: inline-block; float: left; margin-left: 20px;">{{$bun->price_discount}} €</div>
                                    </div>
                                @else
                                    <div style="display: inline-block; height: 20px; width: calc( 100% - 150px);">
                                        <div style="display: inline-block; float: left;">{{$bun->price}} €</div>
                                    </div>
                                @endif

                                <div style="display: inline-block; height: 20px; width: calc( 100% - 150px);">
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
                                <a href="{{route('admin.bun.edit',[$bun])}}"style="display: inline-block;float: left; height: 20px; width: calc( 100% - 150px);">Taisyti informaciją</a>
{{--                                <a href="{{route('admin.bun.show',[$bun])}}">Šios rūšies gyvūnai</a>--}}
{{--                                <a href="{{route('spiece.pdf',[$bun])}}">Spausdinti</a>--}}
                            </div>

                            <form method="POST" action="{{route('admin.bun.destroy', [$bun])}}" style="display:table-cell;vertical-align:middle; text-align: center; width: 10%;height: 100px; margin: 5px 0;">
                                @csrf
                                <button type="submit"><small>Ištrinti</small></button>
                            </form>
                            </div>
                            <br>
                        @endforeach
                        {{$buns->appends(['sort' => $sort])->links()}}
                        <a href="{{route('admin.bun.create')}}">
                            <button ><small>Naujos bandelės registravimas</small></button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

