@extends('layouts.app')

@section('title', 'Bookings')

@section('css')
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/r-3.0.3/datatables.min.css" rel="stylesheet">
    <style>


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

        <div class="card border-0 m-5">
            <div class="row m-0">
                <div class=" mx-0 px-0 ">
                    <div class="nav nav-pills" id="pills-tab" role="tablist">
                        <a class="nav-link border bg-danger active text-nowrap" href="{{ route('dashboard') }}"
                            role="tab" aria-selected="true"><i class="bi bi-speedometer2"></i> Dashboard</a>
                        <a class="nav-link border text-danger text-nowrap" href="{{ route('booking') }}" role="tab"
                            aria-selected="false"><i class="bi bi-journal-text"></i> Bookings</a>
                        <a class="nav-link border text-danger text-nowrap" href="{{ route('gym.progress') }}" role="tab"
                            aria-selected="false"><i class="bi bi-clipboard2-data"></i> My Progress</a>
                    </div>


                    {{-- Tab Contents --}}
                    <div class="tab-content w-100 h-100" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                            aria-labelledby="v-pills-dashboard-tab" tabindex="0">

                            <div class="p-3 w-100 border">
                                <div class="mb-3 p-3">
                                    <h5 class="text-center ps-3 h3 mb-4">Welcome back, <em
                                            class="h2 text-danger fw-bold">{{ Auth::user()->name }}</em>!
                                        Let’s crush your
                                        fitness goals today!</h5>

                                    <div class="row">
                                        <div class="col px-md-e">
                                            <h4 class=" mb-3"><i class="bi bi-clock-history text-danger"></i> Timelog</h4>
                                            <!-- <div class="row ">
                                                @if ($timelog->isEmpty() || $timelog->count() == 0 || $timelog == null)
                                                    <div>
                                                        <div class="col m-auto">
                                                            <h5 class="text-center">No User Timed in</h5>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="row justify-content-center">
                                                        @foreach ($timelog as $member)
                                                            @php
                                                                $time_in = \Carbon\Carbon::parse($member->time_in);
                                                                $time_out = \Carbon\Carbon::parse($member->time_out);
                                                                $timelog_date = \Carbon\Carbon::parse(
                                                                    $member->timelog_date,
                                                                );
                                                            @endphp
                                                            <div class="col-3">
                                                                <div class="card p-2 h-100">
                                                                    <div class="">
                                                                        <strong class="float-start text-start">
                                                                            {{ $member->user->name }}
                                                                        </strong>
                                                                        <br class="d-block d-md-none">
                                                                        <strong class="float-md-end text-end">
                                                                            {{ $timelog_date->format('M-d-Y') }}
                                                                        </strong>
                                                                    </div>
                                                                    <div class="text-secondary text-center row">
                                                                        @if ($member->time_in)
                                                                            <p class="mb-0 col-12 col-md-6 text-md-start">
                                                                                Time-In: <br>
                                                                                {{ $time_in->format('h:i A') }}</p>
                                                                        @endif
                                                                        {{-- <br class="d-block d-md-none"> --}}
                                                                        @if ($member->time_out)
                                                                            <p class="mb-0 col-12 col-md-6 text-md-end">
                                                                                Time-Out: <br>
                                                                                {{ $time_out->format('h:i A') }}</p>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div> -->
                                            <table id="attendanceTable" class="border rounded-table mt-0" style="width:100%">
                                                <thead>
                                                    <tr class="">
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Date</th>
                                                        <th class="text-center">Time-In</th>
                                                        <th class="text-center">Time-Out</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($timelog as $member)
                                                            @php
                                                                $time_in = \Carbon\Carbon::parse($member->time_in);
                                                                $time_out = \Carbon\Carbon::parse($member->time_out);
                                                                $timelog_date = \Carbon\Carbon::parse(
                                                                    $member->timelog_date,
                                                                );
                                                            @endphp
                                                        <tr>
                                                            <td class="text-center">{{ $member->id }}</td>
                                                            <td class="text-center">{{ $member->user->name }}</td>
                                                            <td class="text-center">{{ $timelog_date->format('M-d-Y') }}</td>
                                                            <td class="text-center">{{ $time_in->format('h:i A') }}</td>
                                                            <td class="text-center">{{ $time_out->format('h:i A') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <div class="px-3">
                                    <h4> <i class="bi bi-graph-up text-danger"></i> Workout Progress</h4>
                                    <canvas id="progressChart" style="max-height: 200px"></canvas>
                                </div>
                                <hr class="my-4">
                                <div class="p-3">
                                    <h4> <i class="bi bi-clipboard2-data text-danger"></i> Latest Progress</h4>
                                    <table id="dashboardTable" class="border rounded-table mt-0" style="width:100%">
                                        <thead>
                                            <tr class="">
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Workout</th>
                                                <th class="text-center">Date</th>
                                                <th class="text-center">Weight</th>
                                                <th class="text-center">Reps</th>
                                                <th class="text-center">BMI</th>
                                                <th class="text-center">Trainer Notes</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($workoutProgress as $workout)
                                                <tr>
                                                    <td class="text-center">{{ $workout->id }}</td>
                                                    <td class="text-center">{{ $workout->workout_name }}</td>
                                                    <td class="text-center">{{ $workout->progress_date }}</td>
                                                    <td class="text-center">{{ $workout->weight }}</td>
                                                    <td class="text-center">{{ $workout->reps }}</td>
                                                    <td class="text-center">{{ $workout->bmi }}</td>
                                                    <td class="text-center">{{ $workout->notes }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

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

            $('#attendanceTable').DataTable({
                searching: false,
                lengthChange: false,
                paging: false,
                ordering: false,
                responsive: true,
                autoWidth: false,
            });



        });

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('progressChart').getContext('2d');

            // Data passed from the controller
            const labels = @json($labels);
            const weightData = @json($weightData);
            const repsData = @json($repsData);
            const bmiData = @json($bmiData);

            // Create the line chart
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels, // x-axis: dates
                    datasets: [{
                            label: 'Weight (kg)',
                            data: weightData,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            fill: true,
                            tension: 0.4,
                        },
                        {
                            label: 'Reps',
                            data: repsData,
                            borderColor: 'rgba(255, 206, 86, 1)',
                            backgroundColor: 'rgba(255, 206, 86, 0.2)',
                            fill: true,
                            tension: 0.4,
                        },
                        {
                            label: 'BMI',
                            data: bmiData,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: true,
                            tension: 0.4,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                        },
                        tooltip: {
                            enabled: true,
                        },
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Date',
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Progress Metrics',
                            },
                            beginAtZero: true,
                        },
                    },
                },
            });
        });
    </script>
@endsection
