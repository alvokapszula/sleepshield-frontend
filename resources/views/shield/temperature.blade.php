@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.shield-settings-titles.temperature'),
            'backlink' => "/shield"
    ])
@endsection

@section('content')
    <div class="row ml-0 justify-content-center">
        <div class="w-100">
            @include('assets.roundslider', ['id' => 11, 'domid' => "roundslider", 'icon' => "icon-temperature"])
			<div class="mb-5">
            @include('assets.bootstrapslider', ['id' => 12, 'domid' => "sliderB", 'title' => __('menu.shield-settings-labels.temperature')])
			</div>
			<div class="pt-5">
            @include('assets.slidebutton', ['id' => 10, 'domid' => "switch"])
			</div>
        </div>
    </div>
@endsection
