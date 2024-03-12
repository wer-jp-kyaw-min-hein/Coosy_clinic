<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;

class AdminController extends Controller
{
    public function listUsers()
    {
        $users = User::where("role", "user")->paginate();
        return view("admin.listUsers", compact("users"));
    }

    public function deleteUser($id)
    {
        Appointment::where("user_id", $id)->delete();
        User::find($id)->delete();
        return back()->with("success", "User with id $id deleted!");
    }
}
