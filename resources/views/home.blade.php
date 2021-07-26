@extends('layouts.app')

@section('menu')
    @include('layouts.main-menu')
@endsection


@section('content')
<div style="margin-top:7rem;" class="col-10 offset-1">
    <a style="font-size:2rem;line-height:6rem;" class="btn btn-primary btn-block py-3 mx-auto" href="/profile" role="button">{{__('menu.profile-settings-link')}}</a>
    <a style="font-size:2rem;line-height:6rem;" class="btn btn-primary btn-block py-3 mx-auto" href="/leisure" role="button">{{__('menu.leasure-settings-link')}}</a>
    <a style="font-size:2rem;line-height:6rem;" class="btn btn-primary btn-block py-3 mx-auto" href="/shield" role="button">{{__('menu.shield-settings-link')}}</a>
</div>
@endsection
