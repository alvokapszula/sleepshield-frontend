@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.shield-settings-titles.hepa'),
            'backlink' => "/shield"
    ])
@endsection

@section('content')
    <div class="row ml-0 w-100">
        <ul class="list-group list-group-flush col-12 p-0">

            <li class="list-group-item border-0 mt-2 mb-5">
                <div class="row">
                    <div class="flex-fill">
                        <div class="h1 text-primary mb-5">{{ __('menu.shield-settings-labels.hepa') }}</div>
                        <div class="btn btn-xl btn-primary shadow rounded active">59%</div>
                        <div class="text-primary h1 mt-5">- / 5900 óra / -</div>
                    </div>
                </div>
            </li>

            <li class="list-group-item border-0 mt-0">
                <div class="flex-fill">
                    <div class="card text-left h3 text-muted">
                      <div class="card-body px-2 py-4">
                        <p class="card-text">{{ __('menu.shield-settings-texts.hepa') }}</p>
                        <a href="{{ __('menu.shield-settings-texts.hepa-link') }}" class="card-link">{{ __('menu.shield-settings-texts.hepa-link') }}</a>
                      </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endsection
