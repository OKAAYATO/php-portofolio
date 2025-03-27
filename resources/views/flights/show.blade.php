@extends('layouts.app')

@section('title', 'Flight Details')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Flight Details
        </div>
        <div class="card-body">
            <h4>
                <div class="container">
                    <h3> {{ $flight->departureCity->name }} To {{ $flight->arrivalCity->name }}</h3>
                    <br>
                    <div class="row align-item-center">
                        <div class="col-1 text-center text-secondary h6">
                                {{ $flight->flight_number }}<br>
                                {{ $flight->airline->airline }}<br>
                        </div>
                        <div class="col text-center fw-bold">
                            {{ $flight->departureCity->name }}<br>
                            {{ date('n/j H:i', strtotime($flight->departure_time)) }}<br>
                        </div>
                        <div class="col text-center h5 text-secondary">
                            {{ $flight->duration_time }} minutes<br>
                            <i class="fas fa-arrow-right"></i><br>
                            Transfer City: {{ $flight->transfer_city }}<br>
                            Transfer Time: {{ $flight->transfer_time }} minutes<br>
                        </div>
                        <div class="col text-center fw-bold">
                            {{ $flight->arrivalCity->name }}<br>
                            {{ date('n/j H:i', strtotime($flight->arrival_time)) }}<br>
                        </div>
                        <br>

                    </div>
                </div>
            </h4>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card border-0 ps-5">
                        <div class="card-body">
                            <h5 class="text-secondary">
                                Class <i class="fa-solid fa-chair"></i> :  {{ $flight->class }}<br>
                                Carry-on Baggage <i class="fa-solid fa-bag-shopping"></i> :  {{ $flight->carry_on_baggage }} kg<br>
                                Check-in Baggage <i class="fa-solid fa-suitcase-rolling"></i> :  {{ $flight->check_in_baggage }} kg<br>
                                Meal <i class="fa-solid fa-utensils"></i> :  {{ $flight->meal ? 'Include' : 'Not include' }}<br>
                                Refundable:  {{ $flight->refundable ? 'Yes' : 'No' }}<br>
                                Change Fee:  {{ $flight->change_fee, 2 }}<br>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="container">
                        <div class="card border-0 pt-5">
                            <div class="card-body fw-bold h3 d-flex">
                                Total Price: ¥ {{ $flight->price }}
                                <br>
                                <a href="{{ route('bookings.index', ['flight_id' => $flight->id]) }}" class="btn btn-primary ms-auto">Book This Flight</a>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>





@endsection