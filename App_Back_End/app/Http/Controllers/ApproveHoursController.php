<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;

class ApproveHoursController extends Controller
{
    // Toon alle pending shifts van de ingelogde user
    public function indexView(Request $request)
    {
        $user = $request->user();

        $pendingShifts = $user->shifts()
            ->whereNotNull('submitted_at')
            ->whereNull('approved_at')
            ->orderBy('shift_date', 'desc')
            ->get();

        return view('approve_hours', compact('pendingShifts'));
    }

    // Shift goedkeuren, alleen als deze aan de user gelinkt is
    public function approve(Request $request, $shiftId)
    {
        $user = $request->user();

        $shift = $user->shifts()->where('shift_id', $shiftId)->firstOrFail();

        $shift->approved_at = now();
        $shift->save();

        return redirect()->route('approve_hours')->with('success', 'Shift goedgekeurd!');
    }

    // Shift uren aanpassen, alleen als deze aan de user gelinkt is
    public function update(Request $request, $shiftId)
    {
        $request->validate([
            'actual_start' => 'required|date',
            'actual_end' => 'required|date|after:actual_start',
        ]);

        $user = $request->user();

        $shift = $user->shifts()->where('shift_id', $shiftId)->firstOrFail();

        $shift->actual_start = $request->input('actual_start');
        $shift->actual_end = $request->input('actual_end');
        $shift->save();

        return redirect()->route('approve_hours')->with('success', 'Uren aangepast!');
    }
}
