@extends('layouts.app')

@section('css')
    <style>
        .btn-register {
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

        .btn-register:hover {
            background-color: #f9735b;
            color: var(--accent);
            opacity: 1;
        }
    </style>
@endsection

@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-8">
            <div class="card shadow-lg p-5 border-0 rounded">
                <div class="card-body text-center">
                    {{-- <img class="img-fluid mb-4" src="{{ asset('/resources/img/Logo.jpg') }}" alt="Logo" width="150"> --}}

                    <h2 class="fw-bold text-danger">💪 Welcome to AJ DIA! 💪</h2>
                    <p class="my-4 fs-5 text-muted">You've successfully registered and your fitness journey begins now.</p>

                    <div class="alert alert-success" role="alert">
                        Your account is ready, let's start working out.
                    </div>

                    <a href="{{ Auth::check() ? route('dashboard') : route('login') }}" class="btn btn-danger px-4 py-2 fw-bold text-light">
                        <i class="fas fa-dumbbell"></i> Let's get started!
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
