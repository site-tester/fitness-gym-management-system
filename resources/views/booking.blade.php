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
        <div class="card border-0 m-0 m-md-5">
            <div class="row m-0">
                <div class=" mx-0 px-0 ">
                    <div class="nav nav-pills" id="pills-tab" role="tablist">
                        <a class="nav-link border  text-danger text-nowrap" href="{{ route('dashboard') }}" role="tab" data-bs-toggle="tooltip" data-bs-title="Dashboard"
                            aria-selected="true"><i class="bi bi-speedometer2"></i> <span
                                class="d-none d-md-inline-block">Dashboard</span></a>
                        <a class="nav-link border bg-danger active text-nowrap" href="{{ route('booking') }}" role="tab" data-bs-toggle="tooltip" data-bs-title="Bookings"
                            aria-selected="false"><i class="bi bi-journal-text"></i> <span
                                class="d-none d-md-inline-block">Bookings</span></a>
                        <a class="nav-link border text-danger text-nowrap" href="{{ route('gym.progress') }}" role="tab" data-bs-toggle="tooltip" data-bs-title="My Progress"
                            aria-selected="false"><i class="bi bi-clipboard2-data"></i> <span
                                class="d-none d-md-inline-block">My Progress</span></a>
                    </div>

                    <div class="tab-content w-100 h-100" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel"
                            aria-labelledby="v-pills-dashboard-tab" tabindex="0">
                            <div class="p-3 w-100 border">
                                <h5 class="text-danger"><i class="bi bi-journal-text"></i> Bookings</h5>
                                <table id="bookingTable" class="border rounded-table rounded mt-0" style="width:100%">
                                    <thead>
                                        <tr class="">
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Service</th>
                                            <th class="text-center">Duration</th>
                                            <th class="text-center">Date</th>
                                            {{-- <th class="text-center">Time</th> --}}
                                            <th class="text-center">Payment Method</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center">Reciept</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reservations as $reservation)
                                            @php
                                                $reservation_date = \Carbon\Carbon::parse(
                                                    $reservation->reservation_date,
                                                );
                                                $reservation_time = \Carbon\Carbon::parse(
                                                    $reservation->reservation_time,
                                                );
                                            @endphp
                                            @if ($reservation->status == 'Pending Approval')
                                                @php
                                                    $badgeClass = 'text-bg-warning'; // Yellow indicates awaiting action
                                                @endphp
                                            @elseif ($reservation->status === 'Pending Payment')
                                                @php
                                                    $badgeClass = 'text-bg-warning'; // Green indicates approval
                                                @endphp
                                            @elseif ($reservation->status === 'Approved')
                                                @php
                                                    $badgeClass = 'text-bg-success'; // Green indicates approval
                                                @endphp
                                            @elseif ($reservation->status === 'Paid')
                                                @php
                                                    $badgeClass = 'text-bg-success'; // Green indicates approval
                                                @endphp
                                            @else
                                                @php
                                                    $badgeClass = ''; // Default class if none match
                                                @endphp
                                            @endif
                                            <tr>
                                                <td class="text-center">{{ $reservation->id }}</td>
                                                <td class="text-center">{{ $reservation->service_name }}</td>
                                                <td class="text-center ">{{ $reservation->service_duration }}</td>
                                                <td class="text-center">{{ $reservation_date->format('M/d/Y') }}</td>
                                                {{-- <td class="text-center">{{ $reservation_time->format('h:i A') }}</td> --}}
                                                <td class="text-center">{{ ucwords($reservation->payment_method) }}</td>
                                                <td class="text-center">{{ $reservation->total_amount }}</td>
                                                <td class="text-start align-items-center">
                                                    <span
                                                        class="{{ $badgeClass }} badge rounded-pill p-2 mx-1 text-nowarp">
                                                    </span>
                                                    {{ $reservation->status }}
                                                </td>

                                                <td class="text-center">
                                                    <button class="btn border text-bg-danger" data-bs-toggle="modal"
                                                        data-bs-target="#reservationDetailsModal"
                                                        data-id="{{ $reservation->id }}"
                                                        onclick="viewReservationPaymentDetails({{ $reservation->id }})"
                                                        {{ $reservation->status == 'Pending Payment' ? 'disabled' : '' }}>
                                                        View
                                                    </button>
                                                </td>
                                                {{-- {{ $reservation->created_at->format('M/d/Y') }} --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Modal -->
                                <div class="modal fade" id="reservationDetailsModal" tabindex="-1"
                                    aria-labelledby="reservationDetailsLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="reservationDetailsContent">
                                                    <!-- Content will be loaded dynamically -->
                                                    <p>Loading reservation details...</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(function() {

            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(
                tooltipTriggerEl))

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#bookingTable').DataTable({
                responsive: true
            });



        });

        function viewReservationPaymentDetails(reservationId) {
            // Show loading state
            const modalContent = document.getElementById('reservationDetailsContent');
            modalContent.innerHTML = '<p>Loading reservation details...</p>';

            // Perform AJAX request to fetch reservation details
            fetch(`/booking-receipt/${reservationId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Error fetching details: ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(data => {
                    // Update modal content with fetched details data.item
                    modalContent.innerHTML = `


                                <div>
                                    <p class="mb-0 text-center" style="font-size: 20px;">Booking #${data.booking_id}</p>
                                    <p class="mb-0 text-center" style="font-size: 15px;">Invoice #${data.invoice_id}</p>
                                    <p class="text-center" style="font-size: 10px;">${data.created_at}</p>
                                </div>

                                <div class="row">

                                    <div class="row">
                                    <ul class="list-unstyled col">
                                        <li class="text-black">${data.name}</li>
                                        <li class="text-black">${data.email}</li>
                                        <li class="text-black">${data.phone}</li>
                                    </ul>
                                    <ul class="list-unstyled col text-end">
                                        <li class="text-black mt-1">${ data.transaction_id }</li>
                                        <li class="text-black mt-1">${data.payment_date}</li>
                                        <li class="text-black">${data.payment_method}</li>
                                    </ul>
                                    </div>
                                    <hr>
                                    <h5>Service</h5>
                                    <div class="col-xl-10">
                                        <p class="mb-1">${data.service_name}</p>
                                        <p class="">${data.service_duration}</p>
                                    </div>

                                    <div class="col-xl-2">
                                        <p class="float-end">₱${data.service_price}</p>
                                    </div>
                                    <hr>

                                </div>

                                <div class="row text-black">
                                    <div class="col-xl-12">
                                        <p class="float-end fw-bold">Total: ₱${data.service_price}</p>
                                    </div>
                                    <hr style="border: 2px solid black;">
                                </div>
                                <div class="row text-center">
                                    <span class="" style="font-size: 20px;">Status</span>
                                    <p class="badge text-bg-dark w-25 py-1 m-auto text-capitalize" style="font-size: 15px;">${data.status}</p>
                                </div>
                        `;
                })
                .catch(error => {
                    // Handle errors
                    modalContent.innerHTML =
                        `<p class="text-danger">Failed to load details. ${error.message}</p>`;
                });
        }
    </script>


@endsection
