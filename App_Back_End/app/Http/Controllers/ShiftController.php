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
     * Display the timesheet page with pending shifts
     */
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get shifts that need timesheet submission
        $pendingShifts = $user->shifts()
            ->whereNull('submitted_at')
            ->where('shift_date', '<=', now())
            ->with('project')
            ->orderBy('shift_date', 'desc')
            ->get();

        // Get recently submitted timesheets
        $recentlySubmitted = $user->shifts()
            ->whereNotNull('submitted_at')
            ->with('project')
            ->orderBy('submitted_at', 'desc')
            ->limit(10)
            ->get();

        return view('timesheet', compact('pendingShifts', 'recentlySubmitted'));
    }

    /**
     * Submit timesheet for a specific shift
     */
    public function submit(Request $request, $shiftId)
    {
        $request->validate([
            'actual_start' => 'required|date_format:H:i',
            'actual_end' => 'required|date_format:H:i|after:actual_start',
            'actual_break' => 'nullable|integer|min:0|max:480',
            'notes' => 'nullable|string|max:1000',
        ]);

        $shift = Shift::where('id', $shiftId)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($shift->submitted_at) {
            return redirect()->back()->with('error', 'Uren zijn al ingediend voor deze dienst.');
        }

        $shiftDate = \Carbon\Carbon::parse($shift->shift_date)->format('Y-m-d');

        $actualStart = Carbon::parse("$shiftDate {$request->actual_start}");
        $actualEnd = Carbon::parse("$shiftDate {$request->actual_end}");

        $shift->update([
            'actual_start' => $actualStart,
            'actual_end' => $actualEnd,
            'actual_break' => $request->actual_break ?? 0,
            'notes' => $request->notes,
            'submitted_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Uren succesvol ingediend!');
    }
}
