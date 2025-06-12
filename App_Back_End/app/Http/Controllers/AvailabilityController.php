<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
    public function indexData(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');
        $userId = Auth::id();

        // Zorg dat start en end gezet zijn, anders fallback
        if (!$start || !$end) {
            return response()->json([], 400);
        }

        $availabilities = Availability::where('user_id', $userId)
            ->whereBetween('date', [$start, $end])
            ->get()
            ->map(function ($availability) {
                return [
                    'title' => $availability->available ? 'Beschikbaar' : 'Niet Beschikbaar',
                    'start' => $availability->date,
                    'allDay' => true,
                    'color' => $availability->available ? '#04b5a9' : '#999',
                ];
            });

        return response()->json($availabilities);
    }

    // Store or update availability
    public function store(Request $request)
    {
        $userId = Auth::id();
    
        Availability::updateOrCreate(
            ['user_id' =>  $userId, 'date' => $request->input('date')],  
            ['available' => $request->input('available')]
        );

        return response()->json(['status' => 'ok']);
    }
}
