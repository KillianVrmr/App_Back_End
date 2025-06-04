<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Availability;

class AvailabilityController extends Controller
{
    // Return the availability page
    public function indexView()
    {
        return view('availability');
    }

    // Return availability data (for FullCalendar)
    public function indexData()
    {
        return Availability::where('user_id', 1) // Replace later!!
            ->get()
            ->map(function ($availability) {
                return [
                    'title' => $availability->available ? 'Beschikbaar' : 'Niet Beschikbaar',
                    'start' => $availability->date,
                    'allDay' => true,
                    'color' => $availability->available ? '#04b5a9' : '#999',
                ];
            });
    }

    // Store or update availability
    public function store(Request $request)
    {
        Availability::updateOrCreate(
            ['user_id' => 1, 'date' => $request->input('date')], // Replace with auth()->id() if needed
            ['available' => $request->input('available')]
        );

        return response()->json(['status' => 'ok']);
    }
}

