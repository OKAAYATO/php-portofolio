<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Flight;
use App\Models\User;

class BookingController extends Controller
{
    protected function saveBookingData(Request $request, Booking $booking)
    {
        $booking->user_id = auth()->id();
        $booking->flight_id = $request->flight_id;
        $booking->passenger_name = $request->passenger_name;
        $booking->passenger_email = $request->passenger_email;
        $booking->save();
    }

    public function index(Request $request)
    {
        $flightId = $request->input('flight_id');
        $flight = Flight::findOrFail($flightId);
        $bookings = Booking::where('flight_id', $flightId)->get(); 
        return view('bookings.index', compact('bookings', 'flight'));
    }

    public function processPayment(Request $request)
    {
        $request ->validate([
            'flight_id' =>'required|exists:flights,id',
            'passenger_name' => 'required|string|max:255',
            'passenger_email' => 'required|string|max:255',
            'card_number' => 'required|string|max:16',
            'expiry_date' => 'required|date_format:Y-m',
            'cvv' => 'required|digits:3',
        ]);

        $paymentSuccessful = true;

        if($paymentSuccessful){
            $booking = new Booking();
            $this->saveBookingData($request, $booking);

            return redirect()->route('flights.index')->with('success', 'Booking Successfully created.');
        }else{
            return redirect()->back()->withErrors(['payment failed. Please try again.']);
        }
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $this->saveBookingData($request, $booking);

        return redirect()->route('flights.index')->with('success', 'Booking successfully updated.');
    }

    public function show()
    {
        $userId = auth()->id();
        $bookings = Booking::where('user_id', $userId)->with('flight')->get();
        return view('bookings.show', compact('bookings'));
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        $userId = auth()->id();
        return redirect()->route('profile.show', ['id' => $userId])->with('success', 'Booking successfully cancelled.');
    }
}
