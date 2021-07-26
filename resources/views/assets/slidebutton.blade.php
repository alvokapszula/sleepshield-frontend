
<div class="row" style="height:4rem;">
    <div class="flex-fill" style="z-index:6;">
        <div class="form-group">
            <span class="switch-label-before mr-3">KI</span>
          <span class="switch switch-lg">
            <input type="checkbox" class="switch" id="{{$domid}}" />
            <label for="switch"></label>
          </span>
          <span class="switch-label-after">BE</span>
        </div>
    </div>
</div>

@push('styles')
    <link href="{{asset('css/bootstrap-switch.css')}}" rel="stylesheet" />
@endpush

@push('scripts')
<script>
<?php $sensor = \App\Sensor::find($id); ?>
var file_number = 1;

function setFileNumber(fn) {
	file_number = fn;
}

if ($('#sound{{$sensor->getPlayed()}}').length > 0) {
	document.getElementById("sound{{$sensor->getPlayed()}}").checked = true;
	setFileNumber(sound{{$sensor->getPlayed()}});
} else if ($('#sound1').length > 0) {
	document.getElementById("sound1").checked = true;
	setFileNumber(1);
} else if ($('#sound5').length > 0) {
	document.getElementById("sound5").checked = true;
	setFileNumber(5);
}



@if (isset($timer) && $timer === 1)
	
	$(document).ready(function() {

		$("#{{ $domid }}").prop("checked", {{ $sensor->getTimer() }});
		
		$("#{{ $domid }}").on('change', function(event){
			$.ajax({
				url: "/settimer/{{ $sensor->id }}",
				method: "POST",
				data:{value:$("#{{ $domid }}").checked, minutes:picker.data.minute.current, file_number:file_number, _token:window.Laravel.csrfToken},
				success: function (data) {
					$("#{{ $domid }}").prop('checked', data.value);
				},
				error: function () {
					$.ajax({
						url: "/gettimer/{{ $sensor->id }}",
						method: "GET",
						data:{token:window.Laravel.csrfToken},
						success: function (data) {
							$("#{{ $domid }}").prop('checked', data.value);
						},
						error: function () {
							$("#{{ $domid }}").prop("checked", !$("#{{ $domid }}").prop("checked"));
						}
					});
				}
			});
		});

	});

@else
	
	$(document).ready(function() {

		$("#{{ $domid }}").prop("checked", {{ $sensor->getGPIO() }});

		$("#{{ $domid }}").on('change', function(event){
			$.ajax({
				url: "/setgpio/{{ $sensor->id }}",
				method: "POST",
				data:{value:this.checked,  file_number:file_number, _token:window.Laravel.csrfToken},
				success: function (data) {
					$("#{{ $domid }}").prop('checked', data.value);
				},
				error: function () {
					$.ajax({
						url: "/getgpio/{{ $sensor->id }}",
						method: "GET",
						data:{token:window.Laravel.csrfToken},
						success: function (data) {
							$("#{{ $domid }}").prop('checked', data.value);
						},
						error: function () {
							$("#{{ $domid }}").prop("checked", !$("#{{ $domid }}").prop("checked"));
						}
					});
				}
			});
		});

	});

@endif
</script>
@endpush
