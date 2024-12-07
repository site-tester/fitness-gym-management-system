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
                        <a class="nav-link border text-danger text-nowrap" href="{{ route('dashboard') }}" role="tab"
                            aria-selected="true"><i class="bi bi-speedometer2"></i> Dashboard</a>
                        <a class="nav-link border text-danger text-nowrap" href="{{ route('booking') }}" role="tab"
                            aria-selected="false"><i class="bi bi-journal-text"></i> Bookings</a>
                        <a class="nav-link border bg-danger active text-nowrap" href="{{ route('gym.progress') }}"
                            role="tab" aria-selected="false"><i class="bi bi-clipboard2-data"></i> My Progress</a>
                    </div>


                    {{-- Tab Contents --}}
                    <div class="tab-content w-100 h-100" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                            aria-labelledby="v-pills-dashboard-tab" tabindex="0">
                            <div class="p-3 w-100 border">
                                <h5 class="text-danger"><i class="bi bi-clipboard2-data"></i> My Progress</h5>
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
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/v/dt/dt-2.1.8/r-3.0.3/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#dashboardTable').DataTable({
                responsive: true
            });



        });
    </script>
@endsection
