<?php

namespace App\Http\Controllers;

use App\Models\Horaire;
use App\Models\Route;
use App\Models\Driver;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $date = $_GET['date'];
        $start_city = $_GET['start_city'];
        $end_city = $_GET['end_city'];

        $horaires = Horaire::where('start_city', $start_city)
            ->where('end_city', $end_city)
            ->where('date', $date)
            ->get();

        $drivers = [];
        ;
        foreach ($horaires as $horaire) {
            $trip =  DB::table('trips_of_driver')->where('horaire_id', $horaire->id)->first();
            
            if($trip !== null) {
                if ($trip->number_of_reservations < 6) {
                    $driver_id = $trip->driver_id;
                    $drivers[] = Driver::find($driver_id);
                    $last_driver = end($drivers);
                    $last_driver['horaire_id'] = $horaire->id;
                    $last_driver['number_of_reservations'] = $trip->number_of_reservations;
                }
            }
        }

        $route = Route::where('start_city', $start_city)
            ->where('end_city', $end_city)
            ->first();
        foreach ($drivers as $driver) {
            $driver['name'] = User::find($driver->user_id)->name;
        }
        $user = Auth::user();
        return view('passenger.search_result', compact('drivers', 'route', 'date', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Horaire $horaire)
    {
        $user = Auth::user();
        $driver = Driver::where('user_id', $user->id)->first();
        $route = Route::find($driver->route_id);
        // dd($route);
        $trip = DB::table('trips_of_driver')
        ->where('driver_id', $driver->id)
        ->first();
        return view('driver.my_horaire', compact('user', 'driver', 'route', 'trip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horaire $horaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horaire $horaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horaire $horaire)
    {
        //
    }
}
