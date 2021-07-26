@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.leisure-settings-titles.lighting'),
            'backlink' => "/leisure"
    ])
@endsection

@section('content')
    <div class="row ml-0 justify-content-center">
        <div class="w-100">
		<div style="margin-bottom:-40px;">
            @include('assets.roundslider', ['id' => 4, 'domid' => "roundslider", 'icon' => "icon-lighting"])
			</div>

            @include('assets.bootstrapslider', ['id' => 5, 'domid' => "sliderR", 'before' => "R"])
            @include('assets.bootstrapslider', ['id' => 6, 'domid' => "sliderG", 'before' => "G"])
            @include('assets.bootstrapslider', ['id' => 7, 'domid' => "sliderB", 'before' => "B"])


			<div class="row">
				<div class="col-6 offset-1 d-flex align-items-center">
					@include('assets.slidebutton', ['id' => 3, 'domid' => "switch", 'timer' => 1])
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
