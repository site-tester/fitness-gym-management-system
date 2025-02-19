@extends(backpack_view('layouts.auth'))

@section('content')
    <div class="page page-center" style="background-image: url({{ asset('storage/img/ad_bg.jpg') }}); background-position: center; background-size: cover; background-repeat: no-repeat; width: 100vw; height: 100vh;">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container-tight">
                        {{-- <div class="text-center mb-4 display-6 auth-logo-container">
                            {!! backpack_theme_config('project_logo') !!}
                        </div> --}}
                        <div class="">
                            <div class="pt-0">
                                @include(backpack_view('auth.login.inc.form'))
                            </div>
                        </div>
                        {{-- @if (config('backpack.base.registration_open'))
                            <div class="text-center text-muted mt-4">
                                <a tabindex="6" href="{{ route('backpack.auth.register') }}">{{ trans('backpack::base.register') }}</a>
                            </div>
                        @endif --}}
                    </div>
                </div>
                <div class="col-lg d-none d-lg-block">
                    {{-- <img src="{{ basset('img/Logo.jpg') }}" height="300" class="d-block mx-auto" alt=""> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
