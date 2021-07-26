@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.shield-settings-titles.sensors'),
            'backlink' => "/shield"
    ])
@endsection

@section('content')
    <div class="row ml-0">
        <ul class="list-group list-group-flush col-12" style="margin-top:8rem;">

            <li class="list-group-item">
              <div class="media p-1 m-4">
                <div class="media-body my-auto">
                    <div class="col-12">
                        <h1 class="text-muted">{{__('sensor.name.temperature')}}</h1>
                        <h1 class="text-muted mb-0"><b> <span id="sensor-data-temperature">{{ $data[0] }}</span></b> <b>{{ __('sensor.unit.temperature') }}</b></h1>
                    </div>
                </div>
                <img src="{{ asset('img/shield/sensors/icon-temperature.png') }}" alt="{{__('misc.image')}}" class="w-25">
              </div>
            </li>

            <li class="list-group-item">
              <div class="media p-1 m-4">
                <div class="media-body my-auto">
                    <div class="col-12">
                        <h1 class="text-muted">{{__('sensor.name.humidity')}}</h1>
                        <h1 class="text-muted mb-0"><b> <span id="sensor-data-humidity">{{ $data[1] }}</span></b> <b>{{ __('sensor.unit.humidity') }}</b></h1>
                    </div>
                </div>
                <img src="{{ asset('img/shield/sensors/icon-humidity.png') }}" alt="{{__('misc.image')}}" class="w-25">
              </div>
            </li>

            <li class="list-group-item">
              <div class="media p-1 m-4">
                <div class="media-body my-auto">
                    <div class="col-12">
                        <h1 class="text-muted">{{__('sensor.name.co2')}}</h1>
                        <h1 class="text-muted mb-0"><b> <span id="sensor-data-co2">{{ $data[2] }}</span></b> <b>{{ __('sensor.unit.co2') }}</b></h1>
                    </div>
                </div>
                <img src="{{ asset('img/shield/sensors/icon-co2.png') }}" alt="{{__('misc.image')}}" class="w-25">
              </div>
            </li>
        </ul>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
	(function worker() {
		$.ajax({
			url: "/getsensorsdata",
			method: "GET",
			data:{token:window.Laravel.csrfToken},
			success: function (data) {
				$("#sensor-data-temperature").html(data[0]);
				$("#sensor-data-humidity").html(data[1]);
				$("#sensor-data-co2").html(data[2]);
			},
			complete: function () {
				setTimeout(worker, 15000);
			}
		});
	})();
});
</script>
@endpush
