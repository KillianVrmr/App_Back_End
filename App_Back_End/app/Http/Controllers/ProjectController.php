<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\File;
class ProjectController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'end_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'filename' => 'required|file|mimes:jpg,png,JPEG|max:2048',
            'contact_person' => 'required|string|max:255',
            'contact_phone' => 'required|string|max:15',
       
        ]);

        // Handle file upload
        if ($request->hasFile('filename')) {
            $file = $request->file('filename');
            $filePath = $file->store('uploads', 'public'); // stores in storage/app/public/uploads

            // Save file info to files table
            $fileModel = File::create([
                'path' => $filePath,
                'filename' => $file->getClientOriginalName(),
            ]);

            // Add file_id to validated data
            $validatedData['file_id'] = $fileModel->id;
        }
        // Create and save the new project
        Project::create($validatedData);

        // Redirect or respond as needed
        return redirect()->route('create_project')->with('success', 'Project created successfully!');
    }

    
    public function show($id)
    {
        
    $project = Project::findOrFail($id); // throws 404 if not found

    return view('projects.project', compact('project'));
    }

    public function assignCrew(Request $request, $projectId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $project = Project::findOrFail($projectId);
        $user = \App\Models\User::findOrFail($request->input('user_id'));

        // Attach the user to the project
        $project->users()->attach($user);

        return redirect()->route('projects.crew', ['project' => $projectId])
                         ->with('success', 'Crew member assigned successfully!');
    }
}
