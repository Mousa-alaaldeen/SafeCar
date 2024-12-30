@extends('customer.master')

@section('contact')
@section('booking-active', 'active')
    <!-- Booking Stats Section -->
    <div class="bg-light rounded p-4 shadow-sm mb-5 container-xxl py-5">
        <h3 class="mb-4 text-primary">Your Booking Statistics</h3>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card shadow-sm py-3">
                    <h5 class="text-primary">
                        <i class="fa fa-list-alt me-2"></i>Total Bookings
                    </h5>
                    <p class="display-6 text-success">{{ $bookings->count() }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm py-3">
                    <h5 class="text-primary">
                        <i class="fa fa-check-circle me-2"></i>Completed Bookings
                    </h5>
                    <p class="display-6 text-success">{{ $completedBookings }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm py-3">
                    <h5 class="text-primary">
                        <i class="fa fa-times-circle me-2"></i>Cancelled Bookings
                    </h5>
                    <p class="display-6 text-danger">{{ $cancelledBookings }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Section -->
    <div class="mx-5">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h3>My Bookings</h3>
        </div>
        <div class="card-body">
            @if($bookings->count() > 0)
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-primary">
                            <tr>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ $booking->service->image == null ? asset('assets/img/service.png') : asset('storage/services/' . $booking->service->image) }}"
                                                            class="rounded-circle me-3 shadow-sm" width="50" height="50" alt="Service">
                                                        <div>{{ $booking->service->name }}</div>
                                                    </div>
                                                </td>
                                                <td>{{ $booking->booking_date }}</td>
                                                <td>
                                                    <span class="badge bg-{{ 
                                                                                                                        $booking->status == 'Confirmed' ? 'success' :
                                ($booking->status == 'Cancelled' ? 'secondary' :
                                    ($booking->status == 'Completed ' ? 'primary' :
                                        'warning')) 
                                                                                                                        }}">
                                                        {{ $booking->status }}
                                                    </span>
                                                </td>
                                                <td>JD {{ $booking->service->getPriceByCarSize(auth()->user()->car_size) }}</td>
                                                <td>
                                                    <a href="#editModal{{ $booking->id }}" class="btn btn-outline-primary btn-sm"
                                                        data-bs-toggle="modal">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal Booking -->
                                            <div class="modal fade" id="editModal{{ $booking->id }}" tabindex="-1"
                                                aria-labelledby="editModalLabel{{ $booking->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $booking->id }}">Edit
                                                                Booking</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('customer-bookings.update', $booking->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')


                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label fw-bold">Status</label>
                                                                    <select name="status" class="form-control">
                                                                        <option value="Confirmed" @selected($booking->status == 'Confirmed')>
                                                                            Confirmed</option>
                                                                        <option value="Cancelled" @selected($booking->status == 'Cancelled')>
                                                                            Cancelled</option>

                                                                    </select>
                                                                </div>
                                                                <div class="d-flex justify-content-center">
                                                                    <button type="submit" class="btn btn-primary">Update Booking</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center">You have no bookings yet.</p>
            @endif
        </div>
    </div>
    @endsection