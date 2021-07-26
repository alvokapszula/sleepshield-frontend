@if (Request::segment(1) === 'leisure')
    <img class="w-100" src="{{asset('img/main_logo-green.png')}}">
@else
    <img class="w-100" src="{{asset('img/main_logo.png')}}">
@endif
