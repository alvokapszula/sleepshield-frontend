@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.shield-settings-titles.air'),
            'backlink' => "/shield"
    ])
@endsection

@section('content')
    <div class="row ml-0 justify-content-center">
        <div>
            @include('assets.roundslider', ['id' => 2, 'domid' => "roundslider", 'icon' => "icon-air"])

            @include('assets.slidebutton', ['id' => 1, 'domid' => "switch"])
        </div>
    </div>
@endsection
