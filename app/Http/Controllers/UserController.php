<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

class UserController extends Controller
{
    public function index()
    {
        $bookings = Appointment::where("user_id", auth()->id())->get();

        return view("user.dashboard",compact("bookings"));
    }

    public function bookings()
    {
        $bookings = Appointment::where("user_id", auth()->id())->get();
        return view("user.bookings", compact("bookings"));
    }
}
