<div class="row">
	<div class="flex-fill">
		<!--<div class="h4 mt-1">Időzítő</div>-->
		<div class="js-time-picker" id="time">30</div>
	</div>
</div>



@push('styles')
    <link href="{{asset('css/picker.css')}}" rel="stylesheet" />
@endpush

@push('scripts')
	<script src="{{asset('js/picker.min.js')}}"></script>

	<script>
	var picker = new Picker(document.querySelector('.js-time-picker'), {
	  format: 'mm',
	  controls: true,
	  inline: true,
	  rows: 1,
	});
	</script>
@endpush