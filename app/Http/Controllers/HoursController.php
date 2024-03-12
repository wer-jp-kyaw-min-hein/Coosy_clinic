<?php

namespace App\Http\Controllers;

use App\Models\OpeningHour;
use Illuminate\Http\Request;

class HoursController extends Controller
{
    public function index()
    {
        $openingHours = OpeningHour::all();
        return view('admin.opening_hours', compact('openingHours'));
    }

    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'day' => 'required|string',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        // Create a new opening hour
        $openingHour = new OpeningHour([
            'day' => $validatedData['day'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
        ]);

        // Save the opening hour
        $openingHour->save();

        // Redirect back with a success message or handle it as needed
        return redirect()->back()->with('success', 'Opening hour added successfully.');
    }
}
