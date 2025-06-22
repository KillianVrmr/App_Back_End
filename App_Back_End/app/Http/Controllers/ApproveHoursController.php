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
}
