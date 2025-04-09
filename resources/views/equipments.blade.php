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
    <div class="container-fluid  pt-3">
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

        <div class="container-fluid mt-5">
            {{-- <h2 class="text-center mb-5">Gym Equipment</h2> --}}
            <div class="row m-auto justify-content-center">
                @foreach ($equipments as $equipment)
                    <div class="card equipCard col-12 col-md-2 p-1 mb-3 mx-2 d-flex flex-column h-100"
                        data-id="{{ $equipment->id }}">

                        <!-- Image Container with Fixed Height -->
                        <div class="d-flex align-items-center justify-content-center" style="height: 200px;">
                            <img src="/storage/{{ $equipment->image }}" class="img-fluid"
                                style="max-height: 100%; max-width: 100%; object-fit: contain;" alt="...">
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
        $(document).ready(function() {
            $(".card").on("click", function() {
                let cardId = $(this).data("id");

                // $.ajax({
                //     url: "/get-equipment-details/" + cardId, // Your Laravel route
                //     method: "GET",
                //     success: function(response) {
                //         console.log(response);
                //         let stepsHtml = "";
                //         let imageUrl = "";
                //         let equipmentName = response.name || "No Equipment Name Found";
                //         let status = response.status || "No Status Found";
                //         let quantity = response.quantity ||
                //             "No Quantity Found"; // Ensure quantity is set

                //         if (response.steps) {
                //             let steps = JSON.parse(response.steps);
                //             stepsHtml = "<span class='badge text-bg-success'>" +
                //                 status + "</span><br>";
                //             stepsHtml += "Quantity: " + quantity +
                //                 "<br><br>";
                //             stepsHtml +=
                //                 "<h4 style='text-align: center;'>Step-by-Step Instructions</h4>";
                //             if (steps && steps.length > 0) {
                //                 stepsHtml += "<ol style='text-align: justify;'>";
                //                 steps.forEach(function(step) {
                //                     stepsHtml +=
                //                         "<li style='list-style: auto !important;'>" +
                //                         step + "</li>";
                //                 });
                //                 stepsHtml += "</ol>";
                //             } else {
                //                 stepsHtml = "<p>No step-by-step instructions available.</p>";
                //             }
                //         } else {
                //             stepsHtml = "<p>No step-by-step instructions available.</p>";
                //         }

                //         if (response.image) {
                //             imageUrl = "https://ajdiafitnessgym.com/storage/" + response.image;
                //         }

                //         Swal.fire({
                //             title: equipmentName,
                //             imageUrl: imageUrl,
                //             imageHeight: 200,
                //             width: '80%',
                //             imageAlt: "Equipment Image",
                //             html: stepsHtml,
                //             confirmButtonText: "Close",
                //             customClass: {
                //                 confirmButton: 'btn btn-danger'
                //             },
                //             didOpen: () => {
                //                 if (!response.image) {
                //                     $(".swal2-image").hide();
                //                 }
                //             }
                //         });
                //     },
                //     error: function() {
                //         Swal.fire("Error", "Failed to load equipment details", "error");
                //     }
                // });
                $.ajax({
                    url: "/get-equipment-details/" + cardId, // Your Laravel route
                    method: "GET",
                    success: function(response) {
                        console.log(response);
                        let stepsHtml = "";
                        let imageUrl = "";
                        let equipmentName = response.name || "No Equipment Name Found";
                        let status = response.status || "No Status Found";
                        let quantity = response.quantity || "No Quantity Found";
                        let description = response.description || "No Description Found";

                        if (response.steps) {
                            let steps = JSON.parse(response.steps);
                            let stepsListHtml = "";
                            if (steps && steps.length > 0) {
                                stepsListHtml += "<ol style='text-align: justify;'>";
                                steps.forEach(function(step) {
                                    stepsListHtml +=
                                        "<li style='list-style: auto !important;'>" +
                                        step + "</li>";
                                });
                                stepsListHtml += "</ol>";
                            } else {
                                stepsListHtml =
                                    "<p>No step-by-step instructions available.</p>";
                            }

                            stepsHtml = `

                                <h4 style='text-align: center;'>Step-by-Step Instructions</h4>
                                ${stepsListHtml}
                            `;
                        } else {
                            stepsHtml = "<p>No step-by-step instructions available.</p>";
                        }

                        if (response.image) {
                            imageUrl = "https://ajdiafitnessgym.com/storage/" + response.image;
                        }

                        Swal.fire({
                            title: equipmentName,

                            html: `
                                <div class="row align-items-start px-5">
                                    ${imageUrl ? `
                                                <div class="col-md-6">
                                                    <img src="${imageUrl}" alt="Equipment Image" class="img-fluid" style="max-height: 450px; object-fit: contain;">
                                                </div>
                                            ` : ''}
                                    <div class="${imageUrl ? 'col-md-6' : 'col-12'}">
                                        <div class=" mt-3">
                                            <div class="text-center">
                                                <span class='badge text-bg-success'>${status}</span><br>
                                                Quantity: ${quantity}
                                            </div>
                                            <h4 class="mt-3">Description</h4>
                                            <p style="font-size: .7em; color: #545454; text-align: justify !important; line-height: 1.5;">
                                                ${description}
                                            </p>
                                        </div>
                                        <hr>
                                        <div style="font-size: .7em; color: #545454; text-align: justify !important;">
                                            ${stepsHtml}
                                        </div>
                                    </div>
                                </div>
                            `,
                            width: '70%',
                            confirmButtonText: "Close",
                            customClass: {
                                confirmButton: 'btn btn-danger',
                                htmlContainer: 'swal2-html-container-custom' // Optional custom class for styling
                            },
                            didOpen: () => {
                                // No need to hide image here, we handle it in the HTML
                            }
                        });
                    },
                    error: function() {
                        Swal.fire("Error", "Failed to load equipment details", "error");
                    }
                });
            });
        });
    </script>

@endsection
