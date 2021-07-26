@extends('layouts.app')

@section('menu')
    @include('layouts.main-menu')
@endsection

@section('content')
    <div class="card-deck justify-content-center">
        <div class="row my-2">
            <div class="col-4 px-2 py-1">
                <div class="card m-0 mb-1 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/leisure/sound" role="button">
                        <img class="w-100" src="{{asset('img/leisure/menu/sound.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.leisure-settings.sound')}}</span>
                </div>
            </div>
            <div class="col-4 px-2 py-1">
                <div class="card m-0 mb-1 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/leisure/salt" role="button">
                        <img class="w-100" src="{{asset('img/leisure/menu/salt.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.leisure-settings.salt')}}</span>
                </div>
            </div>
            <div class="col-4 px-2 py-1">
                <div class="card m-0 mb-1 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/leisure/aroma" role="button">
                        <img class="w-100" src="{{asset('img/leisure/menu/aroma.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.leisure-settings.aroma')}}</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4 px-2 py-1">
                <div class="card m-0 mb-1 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/leisure/lighting" role="button">
                        <img class="w-100" src="{{asset('img/leisure/menu/lighting.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.leisure-settings.lighting')}}</span>
                </div>
            </div>
            <div class="col-4 px-2 py-1">
                <div class="card m-0 border-0">
                    <button class="btn btn-lg btn-block btn-menu" role="button">
                        <img class="w-100" src="{{asset('img/leisure/menu/empty.png')}}">
                    </button>
                    <span class="h4 text-muted">&nbsp;</span>
                </div>
            </div>
            <div class="col-4 px-2 py-1">
                <div class="card m-0 mb-1 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/leisure/multimedia" role="button">
                        <img class="w-100" src="{{asset('img/leisure/menu/multimedia.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.leisure-settings.multimedia')}}</span>
                </div>
            </div>
        </div>


    </div>
@endsection
