@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type' => 'jumbotron',
        'heading' => trans('backpack::base.welcome'),
        // 'content' => [
        //     ['type' => 'div','button_link' => backpack_url('#'),'button_text' => trans('backpack::base.logout')],
        //     ['type' => 'div','button_link' => backpack_url('#'),'button_text' => 'Add New Member'],
        // ],
        // 'button_link' => backpack_url('#'),
        // 'button_text' => trans('backpack::base.logout'),
    ];
    // Widget::add()
    //     ->to('before_content')
    //     ->type('jumbotron')
    //     ->heading(trans('backpack::base.welcome'))
    //     ->content([
    //         Widget::make()
    //             ->type('progress')
    //             ->class('card mb-3')
    //             ->statusBorder('start')
    //             ->accentColor('primary'),
    //     ]);
@endphp

@section('content')
    <div class="row mt-3">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="col-md-6 col-xl-3 mb-3 ps-0">
            {{-- <h1>Members</h1> --}}
            <div class="card h-100">
                <div class="card-body d-flex align-items-center justify-content-start">
                    <div class="row">
                        <div class="col-auto">
                            <span
                                class="bg-red text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                Clients
                            </div>
                            <div class="text-secondary">
                                163 Members
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 mb-3 ps-0">
            {{-- <h1>Trainers</h1> --}}
            <div class="card h-100">
                <div class="card-body d-flex align-items-center justify-content-start">
                    <div class="row ">
                        <div class="col-auto">
                            <span
                                class="bg-red text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                Trainers
                            </div>
                            <div class="text-secondary">
                                163 Active Trainers
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 mb-3 ps-0">
            {{-- <h1>Equipments</h1> --}}
            <div class="card h-100">
                <div class="card-body d-flex align-items-center justify-content-start">
                    <div class="row">
                        <div class="col-auto">
                            <span
                                class="bg-red text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="icon">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                </svg>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">
                                Payment
                            </div>
                            <div class="text-secondary">
                                163 Pending Payments
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3 mb-3 ps-0">
            {{-- <h1>Bookings</h1> --}}
            <div class="card card-sm">
                <div class="card-body">
                    <h6 class="card-title">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-journal-check" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10.854 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                                <path
                                    d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                <path
                                    d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                            </svg>
                        </span>
                        RFID Attendance
                    </h6>
                    <form class="row input-group" action="{{ route('attendance.register') }}" method="post">
                        @csrf
                        <div class="input-group">
                            <input type="text" id="rfid-input" class="form-control" name="rfid_number"
                                placeholder="Click here & Tap the RFID" autofocus>
                            <button class="btn" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-journal-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5" />
                                    <path
                                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                    <path
                                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="row mb-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="card-title">Active Clients</h3>
                            <div class="ms-auto">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-secondary" href="#" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">Last 7 days</a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item active" href="#">Last 7 days</a>
                                        <a class="dropdown-item" href="#">Last 30 days</a>
                                        <a class="dropdown-item" href="#">Last 3 months</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col " style="position: relative; height:20vh;">
                                <canvas id="clientsChart" max-height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="card">

                    <div class="card-body">
                        <h3 class="card-title">Total Clients by Category</h3>
                        <div class="row">
                            <div class="col">
                                <h4 class="card-title h4 text-center">Gender</h4>
                                <canvas id="genderChart"></canvas>
                            </div>
                            <div class="col">
                                <h4 class="card-title h4 text-center">Age</h4>
                                <canvas id="ageChart"></canvas>
                            </div>
                            <div class="col">
                                <h4 class="card-title h4 text-center">Membership</h4>
                                <canvas id="memChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="col">
                <div class="card h-100">

                    <div class="card-body pb-5">
                        <h3>Attendance</h3>
                        <div class="divide-y">
                            @if ($memberAttendance->isEmpty())
                                <div>
                                    <div class="row">
                                        <div class="col m-auto">
                                            <h5 class="text-center">No User Timed in</h5>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @foreach ($memberAttendance as $member)
                                    <div>
                                        <div class="row">
                                            <div class="col-auto">
                                                <span class="avatar">test</span>
                                            </div>
                                            <div class="col">
                                                <div class="">
                                                    <strong>Date: {{ $member->timelog_date }}</strong> <br>
                                                    <strong>Name: {{ $member->user->name }}</strong>
                                                </div>
                                                <div class="text-secondary">{{ $member->time_out ? $member->timeout: $member->time_in }}</div>
                                            </div>
                                            {{-- <div class="col-auto align-self-center">
                                                <div class="badge bg-primary"></div>
                                            </div> --}}
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after_scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('rfid-input').addEventListener('keypress', function(event) {
                // Check for the Enter key (key code 13)
                if (event.key === 'Enter') {
                    registerAttendance(); // Call the function when Enter is pressed
                }
            });
        });

        // Function to register attendance
        function registerAttendance() {
            const rfidNumber = document.getElementById('rfid-input').value;

            fetch('/attendance/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'), // Include CSRF token
                    },
                    body: JSON.stringify({
                        rfid_number: rfidNumber
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Success:', data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        };
    </script> --}}

    <script>
        // Active Clients Chart
        var clientsChart = document.getElementById('clientsChart').getContext('2d');
        var myChart = new Chart(clientsChart, {
            type: 'line', // or 'line', 'pie', etc.
            data: {
                labels: ['May', 'June'],
                datasets: [{
                    label: '# of Members',
                    data: [2, 3],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                maintainAspectRatio: false,
            }
        });

        // Total Clients Category Chart: Gender
        var genderChart = document.getElementById('genderChart').getContext('2d');
        var myChart = new Chart(genderChart, {
            type: 'pie', // or 'line', 'pie', etc.
            data: {
                labels: ['May', 'June'],
                datasets: [{
                    label: '# of Members',
                    data: [2, 3],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Total Clients Category Chart: Age
        var ageChart = document.getElementById('ageChart').getContext('2d');
        var myChart = new Chart(ageChart, {
            type: 'pie', // or 'line', 'pie', etc.
            data: {
                labels: ['January', 'June'],
                datasets: [{
                    label: '# of Members',
                    data: [12, 3],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Total Clients Category Chart: Membership
        var memChart = document.getElementById('memChart').getContext('2d');
        var myChart = new Chart(memChart, {
            type: 'pie', // or 'line', 'pie', etc.
            data: {
                labels: ['March', 'April'],
                datasets: [{
                    label: '# of Members',
                    data: [3, 15],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection