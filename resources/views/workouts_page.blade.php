@extends('layouts.app')

@section('title', 'Bookings')

@section('css')
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/r-3.0.3/datatables.min.css" rel="stylesheet">
    <style>
        body .workoutDesc p{
            color: rgb(51, 51, 51) !important;
            line-height: 1.5 !important;
            text-align: justify !important;
            text-indent: 1em !important;
        }
        body .workoutDesc ol li{
            color: rgb(51, 51, 51) !important;
            line-height: 1.5 !important;
            text-align: justify !important;
        }

        body .workoutDesc p a {
            text-decoration: none !important;
            cursor: auto !important;
            pointer-events: none !important;
            color: rgb(51, 51, 51) !important;
        }

        .iframe-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
        }

        .iframe-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .workOut li {
            list-style: auto !important;
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

        <div class="workOut mx-5">
            <div class="row">

                <div class="p-5">
                    <h1 class="text-uppercase fw-bold mb-3" style="font-size: 50px">{{ $workout->name }}</h1>

                    <div class="mb-3 iframe-container">
                        <iframe src="https://www.youtube.com/embed/{{ explode('v=', $workout->video_url)[1] }}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>

                    @if ($workout->copyright)
                        <!-- Copyright Watermark -->
                        <div class="text-center" style="font-size: 14px; color: grey; opacity: 0.7;">
                            Video - Copyright © {{ $workout->copyright }}
                        </div>
                    @endif
                </div>

                <div class="px-5">
                    <h3 class="text-uppercase fw-bold mb-3" style="font-size: 30px">Workout Details
                    </h3>
                    <div class="row mx-5">
                        <div class="col-12 col-md-4 px-1">
                            <div class="text-center text-uppercase bg-secondary-subtle">
                                <label class="text-danger">Experience Level</label>
                                <p>{{ $workout->experience_level }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-1">
                            <div class="text-center text-uppercase bg-secondary-subtle">
                                <label class="text-danger">Target</label>
                                <p>{{ $workout->target_muscle_group }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-1">
                            <div class="text-center text-uppercase bg-secondary-subtle">
                                <label class="text-danger">Type</label>
                                <p>{{ $workout->excercise_type }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-1">
                            <div class="text-center text-uppercase bg-secondary-subtle">
                                <label class="text-danger">Equipment</label>
                                <p>{{ $workout->equipment_required }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-1">
                            <div class="text-center text-uppercase bg-secondary-subtle">
                                <label class="text-danger">Mechanics</label>
                                <p>{{ $workout->mechanics }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 px-1">
                            <div class="text-center text-uppercase bg-secondary-subtle">
                                <label class="text-danger">Force Type</label>
                                <p>{{ $workout->force_type }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="px-5 pt-4 ">
                    <h3 class="text-uppercase fw-bold mb-3" style="font-size: 30px">Description</h3>
                    <div class="workoutDesc">{!! $workout->description !!}</div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.8/r-3.0.3/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#dashboardTable').DataTable({
                searching: false,
                lengthChange: false,
                paging: false,
                ordering: false,
                responsive: true,
                autoWidth: false,
            });



        });

        document.addEventListener('DOMContentLoaded', function() {

        });
    </script>
@endsection
