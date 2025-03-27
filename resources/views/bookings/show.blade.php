@extends('layouts.app')

@section('title', 'My bookings')

@section('content')

<div class="container">
    <div class="row row-gap-3">
        <div class="col-9">
            <div class="card">
                <div class="card-header bg-primary text-white h4">My Bookings</div>
                @if ($bookings->isEmpty())
                    <p class="m-3">No bookings found.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Date</th>
                                    <th>Flight No.</th>
                                    <th>Passenger</th>
                                    <th></th>
                                </tr>    
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->flight->departureCity->name }}</td>
                                        <td>{{ $booking->flight->arrivalCity->name }}</td>
                                        <td>{{ date('n/j/Y', strtotime($booking->flight->departure_time)) }}</td>
                                        <td>{{ $booking->flight->flight_number }}</td>
                                        <td>{{ $booking->passenger_name }}</td>
                                        <td>
                                            <form action="{{ route('bookings.destroy', $booking->id) }}" method="post" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?');">Cancel</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col-4"></div>
    </div>
</div>
    
@endsection