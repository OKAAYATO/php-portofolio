<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

//Admin
Route::group(['middleware' => 'auth'], function() {
    Route::get('/flights/create', function() {
        if (Auth::check() && Auth::user()->role_id == 1) { // 1が管理者のrole_id
            return app(FlightController::class)->create();
        }
        return redirect()->route('index')->with('error', 'You do not have admin access.');
    })->name('flights.create');

    Route::post('/flights', function() {
        if (Auth::check() && Auth::user()->role_id == 1) {
            return app(FlightController::class)->store(request());
        }
        return redirect()->route('index')->with('error', 'You do not have admin access.');
    })->name('flights.store');
});

//ログイン後のページ
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

    //Profile
    Route::get('/profile/{id}/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}/update', [ProfileController::class, 'update'])->name('profile.update');

    //Flights
    Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');
    Route::get('/flights/search', [FlightController::class, 'search'])->name('flights.search');
    Route::get('/flights/{flightId}', [FlightController::class, 'show'])->name('flights.show');

    //Bookings
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::post('/bookings/process-payment', [BookingController::class, 'processPayment'])->name('bookings.processPayment');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');
    Route::get('/bookings/show', [BookingController::class, 'show'])->name('bookings.show');


});


