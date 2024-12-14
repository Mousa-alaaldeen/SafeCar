@extends('customer.master')
@section('contact')
@section('booking-active', 'active')
<div class="container-xxl py-5">
    <div class="container">
        <!-- Fact Start -->
        <h2 class="text-center mb-5">My Bookings</h2>
        @if($bookings->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                       
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
                                <!-- Adjusting image size and display -->
                                <img src="{{ $booking->service->image == null ? asset('assets/img/service.png') : asset('storage/services/' . $booking->service->image) }}"
                                    class="rounded-circle" width="50" height="50">
                            </td>
                            <td>{{ $booking->service->name }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->status }}</td>
                            <td>{{ $booking->service->price }}</td>
                            <td>
                                <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display: inline-block;">
    @csrf
    @method('PUT') 
    <button type="submit" class="btn btn-danger">Cancel Booking</button>
</form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No bookings found.</p>
        @endif
        <!-- Fact End -->
    </div>
</div>
@endsection
