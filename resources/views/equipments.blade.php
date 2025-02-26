@extends('layouts.app')

@section('title', 'Bookings')

@section('css')
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/r-3.0.3/datatables.min.css" rel="stylesheet">
    <style>


    </style>

@endsection

@section('content')
    <div class="container  pt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mx-5 mb-0" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="main-banner" id="top">
            <div class="d-flex justify-content-center align-items-center Fixed-parallax-background"
                style="height: 350px;background: url(/resources/img/423584374_868624935269571_8955187234334423439_n.jpg);">
            </div>
            <div class="video-overlay header-text h-100">
                <div class="caption mt-5">
                    <h1 class="hero-title text-white" style="font-weight: bold;">Equipments</h1>

                    <p class="hero-subtitle text-white" style="font-size: 15px;">Feel the Difference with our Gym Equiments.
                    </p>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            {{-- <h2 class="text-center mb-5">Gym Equipment</h2> --}}
            <div class="row m-auto justify-content-center">
                @foreach ($equipments as $equipment)
                    <div class="card col-12 col-md-3 p-1 mb-3 mx-2">
                        <img src="/storage/app/public/{{ $equipment->image }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text text-center">{{ $equipment->equipment_name }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
