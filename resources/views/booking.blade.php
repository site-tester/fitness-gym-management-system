@extends('layouts.app')

@section('title', 'Bookings')

@section('css')
    <link href="https://cdn.datatables.net/v/dt/dt-2.1.8/r-3.0.3/datatables.min.css" rel="stylesheet">
    <style>


    </style>

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row shadow mt-5 mx-auto w-50 p-3 border border-danger">
            <h3>Bookings</h3>
            <hr>
            <div>

                <table id="bookingTable" class="border border-danger rounded mt-0" style="width:100%">
                    <thead>
                        <tr class="">
                            <th class="text-center">ID</th>
                            <th class="text-center">Service</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Time</th>
                            <th class="text-center">Payment Method</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Reciept</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            @php
                                $reservation_date = \Carbon\Carbon::parse($reservation->reservation_date);
                                $reservation_time = \Carbon\Carbon::parse($reservation->reservation_time);
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
                                <td class="text-center">{{ $reservation->service->name }}</td>
                                <td class="text-center ">{{ $reservation->serviceCategory->name }}</td>
                                <td class="text-center">{{ $reservation_date->format('M/d/Y') }}</td>
                                <td class="text-center">{{ $reservation_time->format('h:i A') }}</td>
                                <td class="text-center">{{ ucwords($reservation->payment_method) }}</td>
                                <td class="text-center">{{ $reservation->total_amount }}</td>
                                <td class="text-start align-items-center">
                                    <span class="{{ $badgeClass }} badge rounded-pill p-2 mx-1 text-nowarp">
                                    </span>
                                    {{ $reservation->status }}
                                </td>

                                <td class="text-center">
                                    <button class="btn border text-bg-danger" data-bs-toggle="modal"
                                        data-bs-target="#reservationDetailsModal" data-id="{{ $reservation->id }}"
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
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                                        <p class="mb-1">${data.service}</p>
                                        <p class="">${data.service_category}</p>
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
                                    <p class="badge text-bg-dark w-25 py-1 m-auto" style="font-size: 15px;">${data.status}</p>
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
