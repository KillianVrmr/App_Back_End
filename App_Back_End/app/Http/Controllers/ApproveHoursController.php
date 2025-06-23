<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ApproveHoursController extends Controller
{
    /**
     * Toon alle pending shifts (globaal, alle users)
     */
    public function indexView()
    {
        // We tonen nu alle shifts die door minstens één user zijn ingediend maar nog niet goedgekeurd
        $pendingShifts = Shift::whereHas('users', function($query) {
            $query->whereNotNull('shift_user.submitted_at')
                  ->whereNull('shift_user.approved_at');
        })->with(['users' => function($query) {
            $query->whereNotNull('shift_user.submitted_at')
                  ->whereNull('shift_user.approved_at');
        }])->orderBy('shift_date', 'desc')->get();

        return view('approve_hours', compact('pendingShifts'));
    }

    /**
     * Shift goedkeuren per gebruiker
     */
    public function approve(Request $request, $shiftId, $userId)
    {
        $shift = Shift::findOrFail($shiftId);

        $shift->users()->updateExistingPivot($userId, [
            'approved_at' => now(),
        ]);

        return redirect()->route('approve_hours')->with('success', 'Shift goedgekeurd!');
    }

    /**
     * Shift uren aanpassen per gebruiker
     */
    public function update(Request $request, $shiftId, $userId)
    {
        $request->validate([
            'actual_start' => 'required|date',
            'actual_end' => 'required|date|after:actual_start',
        ]);

        $actualStart = Carbon::parse($request->input('actual_start'));
        $actualEnd = Carbon::parse($request->input('actual_end'));

        $shift = Shift::findOrFail($shiftId);

        $shift->users()->updateExistingPivot($userId, [
            'actual_start' => $actualStart,
            'actual_end' => $actualEnd,
        ]);

        return redirect()->route('approve_hours')->with('success', 'Uren aangepast!');
    }
}
