<footer role="footer" class="fixed-bottom navbar-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">

                <div class="row border-top">
                    <div class="col-3">
                        <a class="btn btn-sm btn-block btn-menu rounded-circle" href="/" role="button">
                            <img class="w-100" src="{{asset('img/menu-button-home.png')}}">
                        </a>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-sm btn-block btn-menu rounded-circle" href="/shield" role="button">
                            <img class="w-100" src="{{asset('img/menu-button-shield.png')}}">
                        </a>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-sm btn-block btn-menu rounded-circle" href="/profile" role="button">
                            <img class="w-100" src="{{asset('img/menu-button-profile.png')}}">
                        </a>
                    </div>
                    <div class="col-3">
                        <a class="btn btn-sm btn-block btn-menu rounded-circle" href="/leisure" role="button">
                            <img class="w-100" src="{{asset('img/menu-button-settings.png')}}">
                        </a>
                    </div>
                </div>

                <div class="row">
                <div class="col-6 offset-3 mb-2">
                    @if (Request::segment(1) === 'leisure')
                        <img class="w-100" src="{{asset('img/greenline.png')}}">
                    @else
                        <img class="w-100" src="{{asset('img/blueline.png')}}">
                    @endif
                </div>
                </div>

            </div>
        </div>
    </div>
</footer>
