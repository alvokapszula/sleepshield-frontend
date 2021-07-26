@extends('layouts.app')

@section('menu')
    @include('layouts.main-menu')
@endsection


@section('content')
    <div class="card-deck justify-content-center">
        <div class="row my-2">
            <div class="col-4 px-2 py-1">
                <div class="card m-0 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/shield/sensors" role="button">
                        <img class="w-100" src="{{asset('img/shield/menu/sensors.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.shield-settings.sensors')}}</span>
                </div>
            </div>
            <div class="col-4 px-2 py-1">
                <div class="card m-0 mb-1 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/shield/air" role="button">
                        <img class="w-100" src="{{asset('img/shield/menu/air.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.shield-settings.air')}}</span>
                </div>
            </div>
            <div class="col-4 px-2 py-1">
                <div class="card m-0 mb-1 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/shield/lighting" role="button">
                        <img class="w-100" src="{{asset('img/shield/menu/lighting.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.shield-settings.lighting')}}</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-4 px-2 py-1">
                <div class="card m-0 mb-1 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/shield/sound" role="button">
                        <img class="w-100" src="{{asset('img/shield/menu/sound.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.shield-settings.sound')}}</span>
                </div>
            </div>
            <div class="col-4 px-2 py-1">
                <div class="card m-0 mb-1 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/shield/temperature" role="button">
                        <img class="w-100" src="{{asset('img/shield/menu/temperature.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.shield-settings.temperature')}}</span>
                </div>
            </div>
            <div class="col-4 px-2 py-1">
                <div class="card m-0 mb-1 shadow-sm bg-white rounded">
                    <a class="btn btn-lg btn-block btn-menu" href="/shield/hepa" role="button">
                        <img class="w-100" src="{{asset('img/shield/menu/hepa.png')}}">
                    </a>
                    <span class="h4 text-muted">{{__('menu.shield-settings.hepa')}}</span>
                </div>
            </div>
        </div>


    </div>
@endsection
