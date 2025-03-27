@extends('layouts.app')

@section('content')

<div class="container w-50">
    <div class="card">
        <div class="card-header bg-primary text-white">Add New Flight</div>
        <div class="card-body">
            <form action="{{ route('flights.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="airline">Airline name</label>
                    <select name="airline_id" id="airline_id" class="form-select">
                        <option value="">Select airline</option>
                        @foreach($airlines as $airline)
                            <option value="{{ $airline->id }}" {{ request('airline_id') == $airline->id ? 'selected' : '' }}>
                                {{ $airline->airline }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="departure_city_code">Departure City Code</label>
                    <select name="departure_city_code" class="form-control" required>
                        <option value="">Select a Departure City</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->code }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="arrival_city_code">Arrival City Code</label>
                    <select name="arrival_city_code" class="form-control" required>
                        <option value="">Select an Arrival City</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->code }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="flight_number">Flight Number</label>
                    <input type="text" name="flight_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="departure_time">Departure Time</label>
                    <input type="datetime-local" name="departure_time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="arrival_time">Arrival Time</label>
                    <input type="datetime-local" name="arrival_time" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="available_seats">Available Seats</label>
                    <input type="number" name="available_seats" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Flight</button>
            </form>
        </div>
    </div>
</div>

@endsection