@extends('layouts.app')

@section('title', 'profile')

@section('content')

<div class="container">
    <div class="row row-gap-3">
        <div class="col-3">
            <div class="card">
                <div class="card-header bg-primary text-white h4">Profile</div>
                <div class="m-2">
                    @if ($user->avatar)
                        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="p-1 shadow rounded-circle d-block mx-auto avatar-sm">
                    @else
                        <i class="fa-solid fa-circle-user text-secondary d-block icon-lg mb-2"></i>
                    @endif
                    <label for="name">Name:</label>
                    <p class="h5">{{$user->name}}</p>
                </div>
                <div class="m-2">
                    <label for="email">E-mail:</label>
                    <p class="h5">{{$user->email}}</p>
                </div>
                <div class="m-2">
                    <label for="phone_number">Phone Number:</label>
                    <p class="h5">{{$user->phone_number}}</p>
                </div>
                <div class="m-2">
                    @if (Auth::user()->id === $user->id)
                        <a href="{{ route('profile.edit', Auth::user()->id) }}" class="btn btn-warning">Edit Profile</a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-header bg-primary text-white h4">Booking</div>
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