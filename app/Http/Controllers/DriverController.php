<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Horaire;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function my_route()
    {
        $user = Auth::user();
        $driver = Driver::where('user_id', $user->id)->first();
        $route = Route::where('id', $driver->route_id)->first();
        $routes = Route::all();
        return view('driver.my_route', compact('user', 'driver', 'route', 'routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Driver $driver)
    {
        $user = User::find($driver->user_id);
        $route = Route::where('id', $driver->route_id)->first();
        return view('driver.profile', compact('driver', 'user', 'route'));
    }


    public function change_status(Driver $driver, Request $request)
    {
        $route = Route::find($driver->route_id);
        if ($route !== null) {
            $driver->status = $request->status;
            $driver->save();
        }
        return back();
    }

    public function choose_route(Driver $driver, Request $request) {
        $driver->route_id = $request->route;
        $driver->status = 'Available';
        $driver->save();
        $date = $request->date;
        $route = Route::find($request->route);
        $horaire = new Horaire;
        $horaire->start_city = $route->start_city;
        $horaire->end_city = $route->end_city;
        $horaire->date = $date;
        $horaire->save();
        $trip = DB::table('trips_of_driver')->insert([
            'driver_id' => $driver->id,
            'horaire_id' => $horaire->id,
        ]);

        return back();
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Driver $driver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Driver $driver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $driver)
    {
        //
    }
}
