@extends('layouts.app')

@section('title', 'Bookings')

@section('css')
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/r-3.0.3/datatables.min.css" rel="stylesheet">
    <style>


    </style>

@endsection

@section('content')
    <div class="container-fluid container-md pt-3">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mx-5 mb-0" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-danger m-5">
            <div class="row m-0">
                <div>
                    <h1 class="text-uppercase fw-bold my-5 text-center" style="font-size: 50px">Workouts</h1>
                    <section class="px-5 mb-4">
                        <form action="{{ url()->current() }}" method="get" class="select-form__form">
                            <div class="row mb-3">
                                <div class="col mb-3">
                                    <label class="form-label text-nowrap">Skill Level</label>
                                    <select class="form-select" name="excercise_type">
                                        <optgroup label="Skill Level">
                                            <option value="all" {{ request('excercise_type') == 'all' ? 'selected' : '' }}>All</option>
                                            <option value="beginner" {{ request('excercise_type') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                            <option value="intermediate" {{ request('excercise_type') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                            <option value="advanced" {{ request('excercise_type') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col mb-3">
                                    <label class="form-label text-nowrap">Body Part</label>
                                    <select class="form-select" name="body-part">
                                        <optgroup label="Body Part">
                                            <option value="all" {{ request('body-part') == 'all' ? 'selected' : '' }}>All</option>
                                            <option value="abductors" {{ request('body-part') == 'abductors' ? 'selected' : '' }}>Abductors</option>
                                            <option value="abs" {{ request('body-part') == 'abs' ? 'selected' : '' }}>Abs</option>
                                            <option value="adductors" {{ request('body-part') == 'adductors' ? 'selected' : '' }}>Adductors</option>
                                            <option value="biceps" {{ request('body-part') == 'biceps' ? 'selected' : '' }}>Biceps</option>
                                            <option value="calves" {{ request('body-part') == 'calves' ? 'selected' : '' }}>Calves</option>
                                            <option value="chest" {{ request('body-part') == 'chest' ? 'selected' : '' }}>Chest</option>
                                            <option value="forearms" {{ request('body-part') == 'forearms' ? 'selected' : '' }}>Forearms</option>
                                            <option value="glutes" {{ request('body-part') == 'glutes' ? 'selected' : '' }}>Glutes</option>
                                            <option value="hamstrings" {{ request('body-part') == 'hamstrings' ? 'selected' : '' }}>Hamstrings</option>
                                            <option value="hip_flexors" {{ request('body-part') == 'hip_flexors' ? 'selected' : '' }}>Hip Flexors</option>
                                            <option value="it_band" {{ request('body-part') == 'it_band' ? 'selected' : '' }}>IT Band</option>
                                            <option value="lats" {{ request('body-part') == 'lats' ? 'selected' : '' }}>Lats</option>
                                            <option value="lower_back" {{ request('body-part') == 'lower_back' ? 'selected' : '' }}>Lower Back</option>
                                            <option value="neck" {{ request('body-part') == 'neck' ? 'selected' : '' }}>Neck</option>
                                            <option value="obliques" {{ request('body-part') == 'obliques' ? 'selected' : '' }}>Obliques</option>
                                            <option value="palmar_fascia" {{ request('body-part') == 'palmar_fascia' ? 'selected' : '' }}>Palmar Fascia</option>
                                            <option value="plantar_fascia" {{ request('body-part') == 'plantar_fascia' ? 'selected' : '' }}>Plantar Fascia</option>
                                            <option value="quads" {{ request('body-part') == 'quads' ? 'selected' : '' }}>Quads</option>
                                            <option value="shoulders" {{ request('body-part') == 'shoulders' ? 'selected' : '' }}>Shoulders</option>
                                            <option value="traps" {{ request('body-part') == 'traps' ? 'selected' : '' }}>Traps</option>
                                            <option value="triceps" {{ request('body-part') == 'triceps' ? 'selected' : '' }}>Triceps</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <button class=" btn btn-outline-danger mx-1" type="submit">Search</button>
                            </div>
                        </form>
                    </section>

                    <div class="row p-5">
                        @foreach ($workouts as $workout)
                        @php
                            // dd($workout->youtube_thumbnail);
                        @endphp
                            <div class="col-md-4 mb-3">
                                <div class="card shadow-1">
                                    <div class="bg-image">
                                        <img src="{{ $workout->youtube_thumbnail }}"
                                            class="img-fluid" />
                                    </div>
                                    <div class="card-header">{{ ucfirst($workout->experience_level) }}</div>
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{ $workout->name }}</h5>
                                        <div class="row mx-">
                                            <div class="col-12   px-1">
                                                <div class="text-center text-uppercase bg-secondary-subtle">
                                                    <label class="text-danger">Type</label>
                                                    <p>{{ $workout->excercise_type }}</p>
                                                </div>
                                            </div>
                                            <div class="col-12   px-1">
                                                <div class="text-center text-uppercase bg-secondary-subtle">
                                                    <label class="text-danger">Equipment</label>
                                                    <p>{{ $workout->equipment_required }}</p>
                                                </div>
                                            </div>
                                            <div class="col-12   px-1">
                                                <div class="text-center text-uppercase bg-secondary-subtle">
                                                    <label class="text-danger">Target</label>
                                                    <p>{{ $workout->target_muscle_group }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <a href="{{ route('workout.details', $workout->id) }}" class="link-danger text-uppercase fw-bold">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
