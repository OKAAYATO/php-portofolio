@extends('layouts.app')

@section('title', 'Book Flight')

@section('content')
<div class="container w-75">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Book Flight
        </div>
        <div class="card-body">
            <h4>Flight information</h4>
            <h5>{{ $flight->departureCity->name }} to {{ $flight->arrivalCity->name}}</h5>
                Flight number : {{ $flight->flight_number }}<br>
                Airline : {{ $flight->airline->airline }}<br>
                Departure City : {{ $flight->departureCity->name }}<br>
                Departure Time : {{ date('n/j H:i', strtotime($flight->departure_time)) }}<br>
                Duration Time : {{ $flight->duration_time }} minutes<br>
                Transfer City: {{ $flight->transfer_city }}<br>
                Transfer Time: {{ $flight->transfer_time }} minutes<br>
                Arrival City : {{ $flight->arrivalCity->name }}<br>
                Arrival Time : {{ date('n/j H:i', strtotime($flight->arrival_time)) }}<br>
                <br>
            <form action="{{route('bookings.processPayment')}}" method="post">
                @csrf
                <h4>Passenger information</h4>
                <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                <div class="form-group">
                    <label for="passenger_name">Passenger Name: </label>
                    <input type="text" class="form-control w-50" id="passenger_name" name="passenger_name" required>
                </div>
                <div class="form-group">
                    <label for="passenger_email">Passenger Email:</label>
                    <input type="email" class="form-control w-50" id="passenger_email" name="passenger_email" required>
                </div>
                <br>
                <h4>Payment information</h4>
                <div class="form-group">
                    <label for="card_number">Card Number: </label>
                    <input type="text" class="form-control w-50" id="card_number" name="card_number" required>
                </div>
                <div class="form-group">
                    <label for="expiry_date">Expiration Date (YYYY-MM): </label>
                    <input type="text" class="form-control w-25" id="expiry_date" name="expiry_date" required>
                </div>
                <div class="form-group">
                    <label for="cvv">CVV:</label>
                    <input type="text" class="form-control w-25" id="cvv" name="cvv" required>
                </div>
                <br>
                <h3>Price : ¥ {{ $flight->price }}</h3>
                <br>
                <button type="submit" class="btn btn-primary mt-2">Confirm Payment</button>
            </form>
        </div>

    </div>
</div>
<br>
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection