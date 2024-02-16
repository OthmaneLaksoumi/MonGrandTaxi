<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\HoraireController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $cities_json = file_get_contents(storage_path('app/cities.json'));
    $cities = json_decode($cities_json)->cities;
    return view('home', compact('cities'));
})->name('search');

Route::middleware('auth')->group(function() {
    // Route::post('/search', [HoraireController::class, 'index'])->name('search_result');
    Route::get('/search', [HoraireController::class, 'index'])->name('search_result');
    Route::post('/reserve', [ReservationController::class, 'store'])->name('reservations.store');
    // Route::post('/reserve/{user}/{driver}/{route}/{horaire}', [ReservationController::class, 'store'])->name('reservations.store');
});


Route::middleware('guest')->group(function () {

    Route::get('/sign_up', [loginController::class, 'sign_up'])->name('sign_up');
    Route::post('/sign_up', [loginController::class, 'sign_up_action'])->name('sign_up_action')->middleware('guest');

    Route::get('/driver_sign_up', [loginController::class, 'driver_sign_up'])->name('driver_sign_up');
    Route::post('/driver_sign_up', [loginController::class, 'driver_sign_up_action'])->name('driver_sign_up_action');

    Route::get('/login', [loginController::class, 'login'])->name('login');
    Route::post('/login', [loginController::class, 'login_action'])->name('login_action');
});

Route::middleware(['auth', 'role:driver'])->group(function () {
    Route::get('/my_route', [DriverController::class, 'my_route'])->name('my_route'); //dashboard_driver
    Route::get('/profile/{driver}', [DriverController::class, 'show'])->name('driver.profile');
    Route::post('/change_status/{driver}', [DriverController::class, 'change_status'])->name('change_status');
    Route::post('/choose_route/{driver}', [DriverController::class, 'choose_route'])->name('choose_route');
    Route::get('/horaires', [HoraireController::class, 'show'])->name('horaires.show');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::view('/dashboard_admin', 'admin.admin_dashboard')->name('dashboard_admin');
});

Route::middleware(['auth', 'role:passenger'])->group(function() {
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
    Route::get('/passenger/{user}', [UserController::class, 'show'])->name('passenger.show');
    Route::get('/frequent_route', [])->name('frequent_route');
});



Route::get('logout', [loginController::class, 'logout'])->name('logout');
