<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;

class ApproveHoursController extends Controller
{
    // Return the page
    public function indexView()
    {
        $pendingShifts = Shift::whereNotNull('submitted_at')
            ->whereNull('approved_at')
            ->get();

        return view('approve_hours', compact('pendingShifts'));
    }

    public function indexData() {}

    public function approve($shiftId)
    {
        $shift = Shift::findOrFail($shiftId);
        $shift->approved_at = now();
        $shift->save();

        return redirect()->route('approve_hours')->with('success', 'Shift goedgekeurd!');
    }

    public function update(Request $request, $shiftId)
    {
        $request->validate([
            'actual_start' => 'required|date',
            'actual_end' => 'required|date|after:actual_start',
        ]);

        $shift = Shift::findOrFail($shiftId);
        $shift->actual_start = $request->input('actual_start');
        $shift->actual_end = $request->input('actual_end');
        $shift->save();

        return redirect()->route('approve_hours')->with('success', 'Uren aangepast!');
    }
}
