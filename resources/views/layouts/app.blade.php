<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/shlocal.css') }}">
	@stack('styles')

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <div id="app">

        <nav id="navbar" class="navbar navbar-expand navbar-light shadow-sm justify-content-center
        @if (Request::segment(1) === 'leisure')
            bg-green
        @else
            bg-blue
        @endif
        ">
        	@yield('menu')
        </nav>

        <main role="main">
            <div class="container h-100">
                <div class="row justify-content-center">
                    <div class="col-12 text-center align-self-center">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

        @include('layouts.footer')

        <div id="status-messages" class="fixed-top col-12 mt-2">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4 class="alert-heading">Hiba</h4>
                <hr>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                <p class="h4">{{ session('success') }}</p>
            </div>
            @endif
            @if (session('info'))
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Információ</h4>
                <hr>
                <p>{{ session('info') }}</p>
            </div>
            @endif
        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.4.0.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/shlocal.js') }}"></script>
    <script>$('div.alert').delay(3000).fadeOut(250);</script>
    @stack('scripts')

</body>
</html>
