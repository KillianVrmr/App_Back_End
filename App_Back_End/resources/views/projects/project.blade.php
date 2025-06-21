<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css',resources/css/project.css'])
    <title>Project Details</title>
  </head>


<body>
    <div class="sidebar-container">
        <x-sidebar></x-sidebar>
    </div>
    <div class="main-content">
        <div class="project-details-wrapper">
            <!-- Left column: Name, Image, Description -->
            <div class="project-details-left">
                <h1 class="project-title">{{ $project->name }}</h1>
                @if($project->file && $project->file->path)
                    <img src="{{ asset('storage/' . $project->file->path) }}" alt="Project Image" class="project-img">
                @else
                    <p style="margin-bottom: 1.5rem;">No image available for this project.</p>
                @endif
                <div class="project-desc">
                    {{ $project->description }}
                </div>
            </div>
            <!-- Right column: Crew and Details -->
            <div class="project-details-right">
                <a href="{{ route('projects.crew', $project->id) }}" class="crew-link">View Crew</a>
                <div class="project-meta">
                    <div>
                        <strong>End Date:</strong> {{ $project->end_date->format('Y-m-d') }}
                    </div>
                    <div>
                        <strong>Location:</strong> {{ $project->location }}
                    </div>
                    <div>
                        <strong>Contact Person:</strong> {{ $project->contact_person }}
                    </div>
                    <div>
                        <strong>Contact Phone:</strong> {{ $project->contact_phone }}
                    </div>
                </div>
                <a href="{{ route('dashboard') }}" class="back-link">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>