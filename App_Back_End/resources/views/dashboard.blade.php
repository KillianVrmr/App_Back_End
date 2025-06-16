<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css'])
    <title>dashboard</title>
  </head>

<style>
.project-card {
    background: rgba(255,255,255,0.10);
    border-radius: 8px;
    margin-bottom: 2.5rem;
    padding: 0.75rem;
    box-shadow: 6px 12px 8px 0 rgba(0,0,0,0.45);
    display: flex;
    align-items: center;
    gap: 1rem;
    transition: background 0.2s;
}
.project-card:hover {
    background: #3d1b5b;
}
</style>
<body style="background: #310e44; display:flex;">
    
<div style="position: fixed; top: 0; left: 0; height: 100vh;">
    <x-sidebar></x-sidebar>
</div>
<div style="background: #310e44; color: #fff; min-height: 100vh;margin-left: 220px;">
    <div class="project-list" style="margin-left: 10vw; margin-right: 35vw; margin-top: 15vh;">
        <h2 style="font-size: 1.25rem; font-weight: 600; margin-bottom: 1rem;">Alle projecten</h2>

        <form method="GET" action="{{ route('dashboard') }}" style="margin-bottom: 1.5rem; display: flex; gap: 0.5rem;">
            <label for="locationFilter" style="align-self: center;">Locatie</label>
            <input type="text" id="locationFilter" name="location" value="{{ request('location') }}" placeholder="Enter location to filter"
                style="border: 1px solid #ccc; border-radius: 6px; padding: 0.5rem 1rem;">
            <button type="submit" style="background:#299390; color: #fff; border: none; border-radius: 6px; padding: 0.5rem 1.25rem; cursor: pointer;">Filter</button>
        </form> 
        
        <ul style="list-style: none; padding: 0; margin: 0;">
            @foreach($projects as $project)
                 <li class="project-card">
                    @if($project->file_id)
                        <div>
                            <img src="{{ asset('storage/' . $project->file->path) }}" alt="Project Image"
                            style="width: 80px; height: 80px; object-fit: cover; border-radius: 50%; border: none;">
                        </div>
                    @endif
                    <div style="flex: 1;">
                        <a href="{{ route('projects.project', $project->id) }}" style="font-size: 1rem; font-weight: 600; color: #fff; text-decoration: none;">
                            {{ $project->name }}
                        </a>
                        <div style="margin: 0.25rem 0 0.5rem 0; font-size: 0.95rem;">
                            {{ $project->description }}
                        </div>
                            <div style="display: flex; flex-wrap: wrap; gap: 1rem; font-size: 0.85rem;">
                            <span class="date">Deadline: {{ $project->end_date->format('Y-m-d') }}</span>
                            <span class="location">Location: {{ $project->location }}</span>
                            <span class="contact">Contact: {{ $project->contact_person }} ({{ $project->contact_phone }})</span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</body>