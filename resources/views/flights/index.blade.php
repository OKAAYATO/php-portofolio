@extends('layouts.app')

@section('title', 'Flight Search')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Search Conditions</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('flights.search') }}" method="GET">
                        <div class="mb-3">
                            <label for="departure_city_code" class="form-label">From</label>
                            <select name="departure_city_code" id="departure_city_code" class="form-select">
                                <option value="">Select departure city</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->code }}" {{ request('departure_city_code') == $city->code ? 'selected' : '' }}>
                                        {{ $city->name }} ({{ $city->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="arrival_city_code" class="form-label">To</label>
                            <select name="arrival_city_code" id="arrival_city_code" class="form-select">
                                <option value="">Select arrival city</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->code }}" {{ request('arrival_city_code') == $city->code ? 'selected' : '' }}>
                                        {{ $city->name }} ({{ $city->code }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="airline_id" class="form-label">Airline</label>
                            <select name="airline_id" id="airline_id" class="form-select">
                                <option value="">Select airline</option>
                                @foreach($airlines as $airline)
                                    <option value="{{ $airline->id }}" {{ request('airline_id') == $airline->id ? 'selected' : '' }}>
                                        {{ $airline->airline }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="departure_date" class="form-label">Departure Date (2025/4/1) </label>
                            <input type="date" 
                                   class="form-control" 
                                   id="departure_date" 
                                   name="departure_date"
                                   value="{{ old('departure_date') }}"
                                   placeholder="Select a date">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-9">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Flight Results</h5>
                </div>
                <div class="card-body">
                    @if(isset($flights) && $flights->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>From</th>
                                        <th></th>
                                        <th>To</th>
                                        <th></th>
                                        <th>Airline</th>
                                        <th>Flight No.</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($flights as $flight)
                                        <tr>
                                            <td>{{ $flight->departureCity->name }}</td>
                                            <td>{{ date('n/j H:i', strtotime($flight->departure_time)) }}</td>
                                            <td>{{ $flight->arrivalCity->name }}</td>
                                            <td>{{ date('n/j H:i', strtotime($flight->arrival_time)) }}</td>
                                            <td>{{ $flight->airline->airline }}</td>
                                            <td>{{ $flight->flight_number }}</td>
                                            <td>¥{{ number_format($flight->price) }}</td>
                                            <td>
                                                <a href="{{ route('flights.show', $flight->id) }}" class="btn btn-sm btn-primary">Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No flights found.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection