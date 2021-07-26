@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.shield-settings-titles.lighting'),
            'backlink' => "/shield"
    ])
@endsection

@section('content')
    <div class="row ml-0 justify-content-center">
        <div class="w-100">
            @include('assets.roundslider', ['id' => 4, 'domid' => "roundslider", 'icon' => "icon-lighting"])

            @include('assets.bootstrapslider', ['id' => 5, 'domid' => "sliderR", 'before' => "R"])
            @include('assets.bootstrapslider', ['id' => 6, 'domid' => "sliderG", 'before' => "G"])
            @include('assets.bootstrapslider', ['id' => 7, 'domid' => "sliderB", 'before' => "B"])

			<div class="mt-5">
            @include('assets.slidebutton', ['id' => 3, 'domid' => "switch"])
			</div>
        </div>
    </div>
@endsection
