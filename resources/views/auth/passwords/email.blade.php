@extends('layouts.app')

@section('css')
    <style>
        .btn-reset-pass {
            display: inline-block;
            font-size: 13px;
            padding: 11px 17px;
            background-color: var(--accent);
            color: #fff;
            text-align: center;
            font-weight: 400;
            letter-spacing: 0px;
            text-transform: uppercase;
            transition: all .3s;
            height: auto;
            line-height: 20px;
            border: none;
        }

        .btn-reset-pass:hover {
            background-color: #f9735b;
            color: var(--accent);
            opacity: 1;
        }
    </style>
@endsection

@section('content')
<div class="container reset-pw-email">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-5">
                {{-- <div class="card-header">{{ __('Reset Password') }}</div> --}}
                <p class="font-monospace text-center text-uppercase h3">Enter Your Email To Reset Password</p>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> --}}

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="EMAIL ADDRESS" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col">
                                <button type="submit w-100 text-center" class="btn-reset-pass">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
