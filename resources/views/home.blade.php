@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to Flight Booking</h1>
    <p>Search for flights below:</p>

    @include('flights.index')

</div>
<br>
<br>
<div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header h2 bg-secondary text-white">Recommended</div>
                <div class="card-body">
                    Recommended
                </div>
            </div>
        </div>
        <br>
        <br>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header h2 bg-secondary text-white">Currently Viewed</div>
                    <div class="card-body">
                        Currently Viewed
                    </div>
                </div>
            </div>
</div>

@endsection
