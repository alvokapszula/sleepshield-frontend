@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.leisure-settings-titles.sound'),
            'backlink' => "/leisure"
    ])
@endsection

@section('content')
    <div class="row ml-0 justify-content-center w-100">
        <div>
            <div class="my-5 h2 text-muted mb-5 radiok">
                <div class="row text-left mx-auto">
                    <div class="col mb-3">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sound5" name="customRadio" class="custom-control-input">
                            <label onClick='setFileNumber(5) 'class="custom-control-label" for="sound5">Hóvihar</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="sound6" name="customRadio" class="custom-control-input">
                          <label onClick='setFileNumber(6)' class="custom-control-label" for="sound6">Eső</label>
                        </div>
                    </div>
                </div>
                <div class="row text-left mx-auto">
                    <div class="col mb-3">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sound7" name="customRadio" class="custom-control-input">
                            <label onClick='setFileNumber(7)' class="custom-control-label" for="sound7">Fehér zaj</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="sound8" name="customRadio" class="custom-control-input">
                          <label onClick='setFileNumber(8)' class="custom-control-label" for="sound8">Tenger</label>
                        </div>
                    </div>
                </div>
				 <div class="row text-left mx-auto">
                    <div class="col">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="sound9" name="customRadio" class="custom-control-input">
                            <label onClick='setFileNumber(9)' class="custom-control-label" for="sound9">Meditáció</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="custom-control custom-radio">
                          <input type="radio" id="sound10" name="customRadio" class="custom-control-input">
                          <label onClick='setFileNumber(10)' class="custom-control-label" for="sound10">Nyugalom</label>
                        </div>
                    </div>
                </div>
            </div>
			
			<div class="mt-5 mb-5">
            @include('assets.bootstrapslider', ['id' => 9, 'domid' => "sliderG", 'icon' => 'volume_up'])
			</div>

			<div class="row">
				<div class="col-6 offset-1 d-flex align-items-center">
					@include('assets.slidebutton', ['id' => 8, 'domid' => "switch", 'timer' => 1])
				</div>
				<div class="col-5">
					@include('assets.timepicker', ['domid' => "js-time-picker"])
				</div>
			</div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="{{asset('css/bootstrap-switch-green.css')}}" rel="stylesheet" />
@endpush
