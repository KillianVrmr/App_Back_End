<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
   public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'path' => 'required|string|max:1024',
        ]);

        // Create the file record
        $file = File::create($validated);

        return response()->json([
            'message' => 'File stored successfully',
            'file' => $file
        ]);
    }
}
