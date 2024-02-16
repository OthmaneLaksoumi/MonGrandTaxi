<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Taxi;
use App\Models\Driver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function sign_up()
    {
        return view('login.sign_up');
    }

    public function sign_up_action(Request $request)
    {
        $user_data = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => 'required|confirmed',
            'role' => 'required',
        ]);
        // dd($user_data);
        // $user_data['password'] = Hash::make($user_data['password']);
        $user = User::create($user_data);
        if ($user_data['role'] === 'passenger') {
            return to_route('login');
        }

        return view('login.driver_sign_up', ['user_id' => $user->id]);
    }

    public function driver_sign_up($user_id)
    {
        return view('login.driver_sign_up', compact('user_id'));
    }

    public function driver_sign_up_action(Request $request)
    {
        // $user_data = $request->only('name', 'email', 'phone', 'password', 'role');
        $taxi_data = $request->only('plate_number', 'vehicle_type');
        // $user = User::create($user_data);
        $taxi = Taxi::create($taxi_data);
        $driver_data = array();
        // dd($request);
        $driver_data['user_id'] = $request->user_id;
        $driver_data['description'] = $request->description;
        $driver_data['taxi_id'] = $taxi->id;
        $driver_data['payment_method'] = $request->payment_method;
        Driver::create($driver_data);
        return to_route('login');
    }

    public function login()
    {
        return view('login.login');
    }

    public function login_action(Request $request)
    {
        // dd($request);
        $email = $request->email;
        $password = $request->password;

        if (User::where('email', '=', $email)->first() === NULL) {
            return back()->with('email_not_found', 'This email Not Exist')->withInput();
        }
        $credentials = ['email' => $email, 'password' => $password];
        if (!Auth::attempt($credentials)) {
            return back()->with('password_not_correct', 'The password incorrect')->withInput();
        } else {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role === 'passenger') {
                return to_route('passenger.show', $user);
            } else if ($user->role === 'driver') {
                return to_route('my_route');
            } else if($user->role === 'admin') {
                return to_route('dashboard_admin');
            }
        }
    }

    public function logout()
    {

        session()->flush();
        Auth::logout();
        return to_route('search');
    }
}
