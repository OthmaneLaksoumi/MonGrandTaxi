<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Driver;
use App\Models\Route;
use App\Models\Horaire;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ReservationController extends Controller
{

    // public function store(User $user, Driver $driver, Route $route, Horaire $horaire)
    // {
    //     Reservation::create([
    //         'user_id' => $user->id,
    //         'horaire_id' => $horaire->id,
    //         'driver_id' => $driver->id,
    //         'route_id' => $route->id,
    //     ]);
    //     $trip = DB::table('trips_of_driver')
    //         ->where('driver_id', $driver->id)
    //         ->where('horaire_id', $horaire->id)
    //         ->first();

    //     if ($trip->number_of_reservations < 6) {
    //         DB::table('trips_of_driver')
    //             ->where('driver_id', $driver->id)
    //             ->where('horaire_id', $horaire->id)
    //             ->update([
    //                 'number_of_reservations' => $trip->number_of_reservations + 1,
    //             ]);
    //     }
    //     // return to_route('search');
    //     return back();
    // }

    public function index()
    {
        $user = Auth::user();
        $reservations = Reservation::where('user_id', $user->id)->get();
        $all_data = DB::table('reservations')
            ->join('drivers', 'reservations.driver_id', '=', 'drivers.id')
            ->join('users', 'drivers.user_id', '=', 'users.id')
            ->join('horaires', 'reservations.horaire_id', '=', 'horaires.id')
            // ->select('reservations.*','horaires.*', 'drivers.*')
            ->select('drivers.*', 'horaires.*', 'users.name', 'reservations.*',  'users.email', 'users.image')
            ->where('reservations.user_id', $user->id)
            ->get();

        // dd($all_data);

        return view('passenger.my_reservations', compact('all_data', 'user'));
    }

    public function store(Request $request)
    {
        $user_id = $request->user_id;
        $driver_id = $request->driver_id;
        $horaire_id = $request->horaire_id;
        $route_id = $request->route_id;
        Reservation::create([
            'user_id' => $user_id,
            'driver_id' => $driver_id,
            'horaire_id' => $horaire_id,
            'route_id' => $route_id,
        ]);
        $trip = DB::table('trips_of_driver')
            ->where('driver_id', $driver_id)
            ->where('horaire_id', $horaire_id)
            ->first();

        if ($trip->number_of_reservations < 6) {
            DB::table('trips_of_driver')
                ->where('driver_id', $driver_id)
                ->where('horaire_id', $horaire_id)
                ->update([
                    'number_of_reservations' => $trip->number_of_reservations + 1,
                ]);
        }

        return back();
    }

    public function destroy(Reservation $reservation) {
        $reservation->delete();
        $trip = DB::table('trips_of_driver')
        ->where('driver_id', $reservation->driver_id)
        ->where('horaire_id', $reservation->horaire_id)
        ->first();
        DB::table('trips_of_driver')
                ->where('driver_id', $reservation->driver_id)
                ->where('horaire_id', $reservation->horaire_id)
                ->update([
                    'number_of_reservations' => $trip->number_of_reservations - 1,
                ]);
        return back();
    }
}
