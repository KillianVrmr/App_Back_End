<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\File;
use App\Models\Message;
use Illuminate\Support\Facades\Log;
use App\Events\MessageSent;

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

        unset($validatedData['filename']);
        // Create and save the new project
        Project::create($validatedData);

        // Redirect or respond as needed
        return redirect()->route('create_project')->with('success', 'Project created successfully!');
    }

    
    
    public function show($id)
    {
        $project = Project::with('file')->findOrFail($id); // throws 404 if not found

    return view('projects.project', compact('project'));
    }

    public function index()
    {
        $projects = Project::all();
        return $projects;
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

    public function storeMessage(Request $request, $projectId)
    {
        $request->validate(['message' => 'required|string']);
        Log::info('storeMessage called', [
        'user_id' => auth()->id(),
        'chat_id' => $projectId,
        'message_text' => $request->message,
    ]);
        $message = \App\Models\Message::create([
            'chat_id' => $projectId,
            'user_id' => auth()->id(),
            'visible' => true,
            'message_text' => $request->message,
            'time_sent' => now(),
        ]);
        Log::info('Message created', ['message' => $message]);
    
        // Disabled broadcasting for now since Pusher is not configured
        event(new MessageSent($message));
        
        return response()->json(['message' => $message->load('user')]);
    }

    public function fetchMessages($projectId)
    {
        $messages = \App\Models\Message::with('user')
            ->where('chat_id', $projectId)
            ->orderBy('created_at')
            ->get();
        return response()->json(['messages' => $messages]);
    }
}
