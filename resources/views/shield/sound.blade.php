@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.shield-settings-titles.sound'),
            'backlink' => "/shield"
    ])
@endsection

@section('content')
    <div class="row ml-0 justify-content-center w-100">
        <div>
            <div class="my-5 h2 text-muted">
                <div class="row text-left mx-auto">
                    <div class="col mb-3">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sound1" name="customRadio" class="custom-control-input">
                            <label onClick='setFileNumber(1)' class="custom-control-label" for="sound1">Hóvihar</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="sound2" name="customRadio" class="custom-control-input">
                          <label onClick='setFileNumber(2)' class="custom-control-label" for="sound2">Eső</label>
                        </div>
                    </div>
                </div>
                <div class="row text-left mx-auto">
                    <div class="col">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sound3" name="customRadio" class="custom-control-input">
                            <label onClick='setFileNumber(3)' class="custom-control-label" for="sound3">Fehér zaj</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="sound4" name="customRadio" class="custom-control-input">
                          <label onClick='setFileNumber(4)' class="custom-control-label" for="sound4">Tenger</label>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="mt-3 mb-5">
            @include('assets.bootstrapslider', ['id' => 9, 'domid' => "sliderB", 'icon' => 'volume_up', 'audio' => 1])
			</div>
			
			<div class="pt-5 pb-5">
            @include('assets.slidebutton', ['id' => 8, 'domid' => "switch", 'audio' => 1])
			</div>
			
            <div class="flex-fill mt-5 pt-5">
                <div class="card text-left h3 text-muted">
                  <div class="card-body py-3 px-4">
                    <h1 class="card-subtitle mb-2 text-muted"></h1>
                    <p class="card-text">{{ __('menu.shield-settings-texts.sound') }}</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
