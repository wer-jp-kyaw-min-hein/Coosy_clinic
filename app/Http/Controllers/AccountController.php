<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        if (auth()->check() && auth()->user()->role == "admin") {
            $bookings = Appointment::all();
            return view("admin.dashboard" ,compact("bookings"));
        }
        return redirect()->route("appointments.create");
    }


    public function emailValidation(Request $request)
    {
        return $this->validate($request, [
            'email' => 'required|unique:users'
        ]);
    }

    public function login()
    {
        return view('login');
    }

    public function auth(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],
            [
                'email.required' => 'Email is required',
                'password.required' => 'Password is required',
            ]
        );

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Auth::user()->save();


            if (strtolower(auth()->user()->role) == "admin") {
                return redirect()->intended(route("admin.dashboard"))->withSuccess('Signed in');
            } else if (strtolower(auth()->user()->role) == "user") {
                return redirect()->intended(route("user.dashboard"))->withSuccess('Signed in');
            } else {
                Auth::logout();

                return redirect("login")->withErrors('These credentials do not match our records.')->withInput($credentials);
            }

        }

        return redirect("login")->withErrors('These credentials do not match our records.')->withInput($credentials);
    }


    public function logout()
    {
        Auth::logout();
        return redirect("login");
    }

    public function register()
    {
        return view('');
    }


}
