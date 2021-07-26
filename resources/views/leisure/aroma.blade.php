@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.leisure-settings-titles.aroma'),
            'backlink' => "/leisure"
    ])
@endsection

@section('content')
<div class="row ml-0 justify-content-center w-100">
	<div>
        @include('assets.roundslider', ['id' => 16, 'domid' => "roundslider", 'icon' => "icon-air"])

		<div class="row mb-3">
			<div class="flex-fill mb-4">
				<!--<div class="h4 mt-1 mb-2"></div>-->
				<div class="col-10 offset-1">
					<button type="button" class="btn btn-primary btn-lg mr-5">Aroma 1</button>
					<button type="button" class="btn btn-primary btn-lg">Aroma 2</button>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-6 offset-1 d-flex align-items-center">
				@include('assets.slidebutton', ['id' => 15, 'domid' => "switch", 'timer' => 1])
			</div>
			<div class="col-5">
				@include('assets.timepicker', ['domid' => "js-time-picker"])
			</div>
		</div>
</div>
@endsection


@push('styles')
    <link href="{{asset('css/bootstrap-switch-green.css')}}" rel="stylesheet" />
@endpush
