<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\City;
use App\Models\Airline;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    private $flight;
    private $city;
    private $airline;

    public function __construct(Flight $flight, City $city, Airline $airline)
    {
        $this->flight = $flight;
        $this->city = $city;
        $this->airline = $airline;
        $this->middleware('auth');
    }

    public function index()
    {
        $cities = $this->city->all();
        $airlines = $this->airline->all();

        return view('flights.index', compact('cities', 'airlines'));
    }

    public function search(Request $request)
    {
        $flights = $this->flight->query()
            ->when($request->departure_city_code, function($query) use ($request){
                return $query->where('departure_city_code', $request->departure_city_code);
            })
            ->when($request->arrival_city_code, function($query) use ($request) {
                return $query->where('arrival_city_code', $request->arrival_city_code);
            })
            ->when($request->airline_id, function($query) use ($request) {
                return $query->where('airline_id', $request->airline_id);
            })
            ->when($request->departure_date, function($query) use ($request) {
                if ($request->departure_date) {
                return $query->whereDate('departure_time', $request->departure_date);
                }
            })
            ->with(['airline', 'departureCity', 'arrivalCity'])
            ->get();

        $cities = $this->city->all();
        $airlines = $this->airline->all();

        return view('flights.index', compact('flights', 'cities', 'airlines'));
    }

    public function show($flightId)
    {
        $flight = Flight::with(['airline', 'departureCity', 'arrivalCity'])
                ->findOrFail($flightId);

        return view('flights.show')->with('flight', $flight);
    }

    public function create()
    {
        $airlines = Airline::all();
        $cities = City::all();
        
        return view('flights.create', compact('airlines', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'airline_id' => 'required|exists:airlines,id',
            'departure_city_code' => 'required|string|max:3',
            'arrival_city_code' => 'required|string|max:3',
            'flight_number' => 'required|string',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date',
            'price' => 'required|numeric',
            'available_seats' => 'required|integer',
        ]);

        Flight::create($request->all());

        return redirect()->route('flights.index')->with('success', 'Flight added successfully.');
    }
}