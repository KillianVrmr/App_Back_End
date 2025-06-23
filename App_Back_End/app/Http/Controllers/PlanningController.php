<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shift;
use App\Models\User;

class PlanningController extends Controller
{
    public function indexView()
    {
        return view('planning');
    }

    // Return availability data (for FullCalendar)
    public function indexData(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$start || !$end) {
            return response()->json([], 400);
        }

        // Alle shifts waar deze user aan gekoppeld is
        $shifts = $user->shifts()
            ->whereBetween('shifts.planned_start', [$start, $end])
            ->get()
            ->map(function ($shift) {
                return [
                    'title' => 'Shift', 
                    'start' => $shift->planned_start,
                    'allDay' => false,
                    'end' => $shift->planned_end, 
                    'color' => '#04b5a9'
                ];
            });

        return response()->json($shifts);
    }
}
