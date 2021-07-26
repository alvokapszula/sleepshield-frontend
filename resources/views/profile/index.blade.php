@extends('layouts.app')

@section('menu')
    @include('layouts.breadcrumb-menu',
        [
            'title' => __('menu.profile.title'),
            'backlink' => "/"
    ])
@endsection

@section('content')
    <div class="row ml-0 mt-4">
        <ul class="list-group list-group-flush col-12">

            @foreach (\App\Profile::all() as $profile)
            <a href="/profile/{{$profile->id}}/activate" class="list-group-item list-group-item-action">
              <div class="media p-1 m-2">
                <div class="media-body">
                    <div class="col-12">
                        <h2>{{ $profile->name }}</h2>
                        <span class="text-muted">{{ $profile->description }}</span>
                    </div>
                </div>
              </div>
            </a>

            @endforeach

        </ul>
    </div>
@endsection
