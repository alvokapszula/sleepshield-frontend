@if(isset($title))
<div class="col" style="height:4rem;z-index:6;">
    <div class="flex-fill">
        <div class="text-muted h2 mb-3">{{ $title }}</div>
        <input id="{{ $domid }}">
    </div>
</div>
@elseif(isset($before))
<div class="row" style="height:4rem;z-index:6;">
    <div class="col-2">
        <i class="slider-label-before">{{ $before }}</i>
    </div>
    <div class="col-9 my-auto mt-3">
        <input id="{{ $domid }}">
    </div>
</div>
@elseif(isset($icon))
<div class="row" style="height:4rem;z-index:6;">
    <div class="col-2">
        <i class="material-icons slider-icon-before">{{ $icon }}</i>
    </div>
    <div class="col-9 my-auto">
        <input id="{{ $domid }}">
    </div>
</div>
@endif

@push('styles')
    <link href="{{ asset('css/bootstrap-slider.min.css') }}" rel="stylesheet" />
	
@endpush

@push('scripts')
<!-- https://github.com/seiyria/bootstrap-slider -->
<script src="{{ asset('js/bootstrap-slider.min.js') }}"></script>

<script>
<?php $sensor = \App\Sensor::find($id); ?>
$(document).ready(function() {

    var {{ $domid }} = $("#{{ $domid }}").slider({
        id: "{{ $domid }}",
        value: {{ $sensor->getPWM() }},
		min: {{ $sensor->min }},
		max: {{ $sensor->max }},
		step: 1
    });

    {{ $domid }}.slider().on('slideStop', function(event){
        $.ajax({
            url: "/setpwm/{{ $sensor->id }}",
            method: "POST",
            data:{value:event.value, _token:window.Laravel.csrfToken},
			success: function (data) {
					{{ $domid }}.slider('setValue', data.value);
				},
            error: function () {
                $.ajax({
                    url: "/getpwm/{{ $sensor->id }}",
                    method: "GET",
                    data:{token:window.Laravel.csrfToken},
                    success: function (data) {
                        {{ $domid }}.slider('setValue', data.value);
                    },
                    error: function () {
						{{ $domid }}.slider('setValue', 0);
                    }
                });
            }
        });
    });
});
</script>
@endpush
