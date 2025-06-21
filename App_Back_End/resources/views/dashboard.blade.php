<!-- dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    @vite(['resources/css/app.css','resources/css/dashboard.css'])
    
</head>
<body>
    <div class="sidebar-container">
        <x-sidebar :projects="$projects"></x-sidebar>
    </div>
    <div class="main-content">
        <div class="project-list">
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
                        @if($project->file && $project->file->path)
                            <img src="{{ asset('storage/' . $project->file->path) }}" alt="Project Image" class="project-img">
                        @endif
                        <div class="project-info">
                            <a href="{{ route('projects.project', $project->id) }}" class="project-title">
                                {{ $project->name }}
                            </a>
                            <div class="project-desc">
                                {{ $project->description }}
                            </div>
                            <div class="project-meta">
                                <span class="date">End Date: {{ $project->end_date->format('Y-m-d') }}</span>
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
</html>