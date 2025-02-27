@extends('layouts.app')

@section('title', 'Bookings')

@section('css')
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/r-3.0.3/datatables.min.css" rel="stylesheet">
    <style>
        .equipCard {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .equipCard:hover {
            transform: scale(1.1);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
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
                   
                    <div class="card equipCard col-12 col-md-3 p-1 mb-3 mx-2 d-flex flex-column h-100" data-id="{{$equipment->id}}">  

                    <!-- Image Container with Fixed Height -->
                        <div class="d-flex align-items-center justify-content-center" style="height: 200px;">
                            <img src="/storage/app/public/{{ $equipment->image }}" class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: contain;" alt="...">
                        </div>
                        <div class="card-body flex-grow-1">
                            <!-- Additional content here -->
                        </div>
                        <div class="card-footer text-center">
                            <p class="card-text text-uppercase">{{ ucfirst($equipment->equipment_name) }}</p>
                        </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script>
$(document).ready(function () {
    $(".card").on("click", function () {
        let cardId = $(this).data("id");

        $.ajax({
            url: "/get-equipment-description/" + cardId, // Your Laravel route
            method: "GET",

            success: function (response) {
                let stepsHtml = "";
                if (response.steps) {
                    let steps = JSON.parse(response.steps); // Parse the JSON string
                    stepsHtml = "<h3>Steps:</h3><ol>";
                    steps.forEach(function (step) {
                        stepsHtml += "<li>" + step + "</li>";
                    });
                    stepsHtml += "</ol>";
                }

                Swal.fire({
                    title: "Equipment Details",
                    html: "<p>" + response.description + "</p>" + stepsHtml,
                    icon: "info",
                    confirmButtonText: "Close",
                });
            },
            error: function () {
                Swal.fire("Error", "Failed to load description", "error");
            }
        });
    });
});
</script>

@endsection
