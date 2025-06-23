<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shift;
use App\Models\User;
use Carbon\Carbon;

class ShiftController extends Controller
{
    /**
     * Toon het uren-indienen overzicht
     */
    public function index()
    {   
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Shifts waarvoor de user gekoppeld is, datum is in het verleden, en nog niet ingediend
        $pendingShifts = $user->shifts()
            ->where('shift_date', '<=', now())
            ->wherePivotNull('submitted_at')
            ->with('project')
            ->orderBy('shift_date', 'desc')
            ->get();

        // Shifts die al ingediend zijn door deze user
        $recentlySubmitted = $user->shifts()
            ->wherePivotNotNull('submitted_at')
            ->with('project')
            ->orderByPivot('submitted_at', 'desc')
            ->limit(10)
            ->get();

        return view('timesheet', compact('pendingShifts', 'recentlySubmitted'));
    }

    /**
     * Verwerk het indienen van uren op een shift
     */
    public function submit(Request $request, $shiftId)
    {
        $request->validate([
            'actual_start' => 'required|date_format:H:i',
            'actual_end' => 'required|date_format:H:i|after:actual_start',
            'actual_break' => 'nullable|integer|min:0|max:480',
            'notes' => 'nullable|string|max:1000',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Haal de shift op waar de user aan gekoppeld is
        $shift = $user->shifts()->where('shifts.id', $shiftId)->firstOrFail();

        if ($shift->pivot->submitted_at) {
            return redirect()->back()->with('error', 'Uren zijn al ingediend voor deze dienst.');
        }

        $shiftDate = Carbon::parse($shift->shift_date)->format('Y-m-d');
        $actualStart = Carbon::parse("$shiftDate {$request->actual_start}");
        $actualEnd = Carbon::parse("$shiftDate {$request->actual_end}");

        // Update de pivot-tabel (shift_user) met de ingediende uren
        $user->shifts()->updateExistingPivot($shiftId, [
            'actual_start' => $actualStart,
            'actual_end' => $actualEnd,
            'actual_break' => $request->actual_break ?? 0,
            'notes' => $request->notes,
            'submitted_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Uren succesvol ingediend!');
    }
}
