<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\City;
use App\Models\Airline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $cities = City::all();
        $airlines = City::all();
        return view('home', compact('cities', 'airlines'));
    }
}
