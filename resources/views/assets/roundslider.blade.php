<div class="row justify-content-center" style="height:22rem;margin-bottom:2rem">
    <div class="roundslider-wrapper">
        <div id="{{$domid}}" class="mx-auto mt-3"></div>
		@if (Request::segment(1) === 'leisure')
        <img src="{{ asset('/img/leisure/sensors/'.$icon.'.png') }}" class="rs-tooltip-img">
		@else
		<img src="{{ asset('/img/shield/sensors/'.$icon.'.png') }}" class="rs-tooltip-img">
		@endif
    </div>
</div>

@push('styles')
    <link href="{{ asset('css/roundslider.min.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
<!-- https://roundsliderui.com/document.html#radius -->
<script src="{{ asset('js/roundslider.min.js') }}"></script>

<script>
<?php $sensor = \App\Sensor::find($id); ?>
$(document).ready(function() {
    $("#{{ $domid }}").roundSlider({
        handleSize: "+48",
        handleShape: "dot",
        width: 12,
        circleShape: "pie",
        sliderType: "min-range",
        showTooltip: true,
        editableTooltip: false,
        value: {{ $sensor->getPWM() }},
        radius: 160,
        startAngle: 315,
        tooltipFormat: "changeTooltip{{ $domid }}",
        change: function(event) {
            $.ajax({
                url: "/setpwm/{{ $sensor->id }}",
                method: "POST",
                data:{value:event.value, _token:window.Laravel.csrfToken},
				success: function (data) {
						$("#{{ $domid }}").roundSlider('setValue', data.value);
					},
                error: function () {
                    $.ajax({
                        url: "/getpwm/{{ $sensor->id }}",
                        method: "GET",
                        data:{token:window.Laravel.csrfToken},
                        success: function (data) {
                            $("#{{ $domid }}").roundSlider('setValue', data.value);
                        },
                        error: function () {
                            $("#{{ $domid }}").roundSlider('setValue', 0);
                        }
                    });
                }
            });

        }
    });
});

function changeTooltip{{ $domid }} (e) {
    return e.value + "{{ $sensor->unit }}";
}
</script>
@endpush
