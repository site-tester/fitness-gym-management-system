@extends('layouts.app')

@section('content')
<div class="container position-absolute top-25 top-md-75 start-50 translate-middle mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! UI on WORKS!!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
