<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shift;

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
         $userId = Auth::id();
 
         // Zorg dat start en end gezet zijn, anders fallback
         if (!$start || !$end) {
             return response()->json([], 400);
         }
 
         $shifts = Shift::where('user_id', $userId)
             ->whereBetween('planned_start', [$start, $end])
             ->get()
             ->map(function ($shift) {
                 return [
                     'title' => 'Shift: ' . \Carbon\Carbon::parse($shift->planned_start)->format('H:i') . ' - ' . \Carbon\Carbon::parse($shift->planned_end)->format('H:i'),
                     'start' => $shift->planned_start,
                     'allDay' => false,
                     'end' => $shift->planned_end, 
                     'color' => '#04b5a9'
                 ];
             });
 
         return response()->json($shifts);
     }
}
