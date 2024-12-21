@extends(backpack_view('layouts.auth'))

@section('content')
    <div class="row g-0 flex-fill">
        <div class="col-12 col-lg-8 col-xl-6 border-top-wide border-primary d-flex flex-column justify-content-center">
            <div class="container container-tight my-5 px-lg-5">
                <div class="text-center mb-4 display-6 auth-logo-container">
                    {!! backpack_theme_config('project_logo') !!}
                </div>
                @include(backpack_view('auth.login.inc.form'))
                @if (config('backpack.base.registration_open'))
                    <div class="text-center text-muted mt-3">
                        <a tabindex="6" href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-12 col-lg-4 col-xl-6 d-none d-lg-block">
            <div class="bg-cover h-900 min-vh-100 p-5" style="background-image: url({{ asset('img/Logo.jpg') }})"></div>
        </div>
    </div>
@endsection
