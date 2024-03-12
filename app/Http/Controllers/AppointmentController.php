<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\OpeningHour;
use App\Models\User;
use App\Models\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        $bookings = Appointment::all();
        return view("admin.bookings", compact("bookings"));
    }

    public function create()
    {
        // Get available dates and times
        $availableDates = $this->getAvailableDates();
        $selectedDate = count($availableDates) > 0 ? $availableDates[0] : null;
        $availableTimes = $selectedDate ? $this->getAvailableTimes($selectedDate) : [];

        return view('welcome', compact('availableDates', 'selectedDate', 'availableTimes'));
    }

    public function getAvailable(Request $request)
    {
        $selectedDate = $request->input('selectedDate');
        $availableTimes = $this->getAvailableTimes($selectedDate);

        return view('appointments.available_times', compact('availableTimes'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if (!auth()->check()) {

            $request->validate([
                'fname' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
            ]);
            $user = new User();
            $user->name = $request->fname . " " . $request->lname;
            $user->email = $request->email;
            $user->password = \Hash::make($request->password);
            $user->save();

        } else {
            $request->validate([
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
            ]);
        }
        Appointment::create([
            "attendance" => $request->input('guest'),
            "user_id" => $user->id,
            "date" => $request->input('date'),
            "time" => $request->input('time')]);

        return redirect()->back()->with('success', 'Appointment booked successfully.');
    }

    private function getAvailableDates()
    {
        $vacations = Vacation::where('end_date', '>=', Carbon::today())->get();

        $currentWeekDays = collect();

        $currentDay = Carbon::now();
        $daysToAdd = 10;

        while ($daysToAdd > 0) {
            if (!$vacations->contains(function ($vacation) use ($currentDay) {
                    return Carbon::parse($vacation->start_date)->lte($currentDay)
                        && Carbon::parse($vacation->end_date)->gte($currentDay);
                }) && !$vacations->contains('start_date', $currentDay->format('Y-m-d')) && !$vacations->contains('end_date', $currentDay->format('Y-m-d'))) {
                $currentWeekDays->push($currentDay->format('Y-m-d'));
                $daysToAdd--;
            }

            // Move to the next day
            $currentDay->addDay();
        }

        return $currentWeekDays->toArray();
    }


    private function getAvailableTimes($selectedDate)
    {
        $openingHours = OpeningHour::where('day', Carbon::parse($selectedDate)->format('l'))->first();

        if ($openingHours) {
            $startTime = Carbon::parse($selectedDate . ' ' . $openingHours->start_time);
            $endTime = Carbon::parse($selectedDate . ' ' . $openingHours->end_time);

            $interval = $startTime->addMinutes(30)->diffInMinutes($endTime);
            $availableTimes = [];

            for ($time = $startTime; $time <= $endTime; $time->addMinutes(30)) {
                $availableTimes[] = $time->format('H:i');
            }

            return $availableTimes;
        }

        return [];
    }

    public function checkAvailability(Request $request)
    {
        $selectedDate = $request->input('selectedDate');
        $selectedTime = $request->input('selectedTime');

        $isAvailable = !$this->isAppointmentTimeBooked($selectedDate, $selectedTime);

        return response()->json(['available' => $isAvailable]);
    }

    private function isAppointmentTimeBooked($date, $time)
    {
        return Appointment::where('date', $date)->where('time', $time)->exists();
    }
}
