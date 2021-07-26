@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.leisure-settings-titles.salt'),
            'backlink' => "/leisure"
    ])
@endsection

@section('content')
<div class="row ml-0 justify-content-center w-100">
    <div>
        @include('assets.roundslider', ['id' => 14, 'domid' => "roundslider", 'icon' => "icon-air"])

		<div class="row">
			<div class="col-6 offset-1 d-flex align-items-center">
				@include('assets.slidebutton', ['id' => 13, 'domid' => "switch", 'timer' => 1])
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
