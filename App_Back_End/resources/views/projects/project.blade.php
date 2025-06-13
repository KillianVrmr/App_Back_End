<div style="background: #310e44; color: #fff; min-height: 100vh; padding: 3rem 0;">
    <div style="margin-left: 10vw; margin-right: 10vw; margin-top: 20vh;display: flex; gap: 2.5rem;">
        <!-- Left column: Name, Image, Description -->
        <div style="flex: 2;">
            <h1 style="font-size: 2rem; font-weight: bold; margin-bottom: 1.5rem;">{{ $project->name }}</h1>
            @if($project->filename)
                <div style="margin-bottom: 1.5rem;">
                    <img src="{{ asset('storage/' . $project->filename) }}" alt="Project Image" style="width: 100%; max-width: 350px; max-height: 350px; border-radius: 10px; object-fit: cover; box-shadow: 0 4px 16px rgba(0,0,0,0.18);">
                </div>
            @else
                <p style="margin-bottom: 1.5rem;">No image available for this project.</p>
            @endif
            <div style="font-size: 1.1rem; margin-bottom: 1.5rem;">
                {{ $project->description }}
            </div>
        </div>
        <!-- Right column: Crew and Details -->
        <div style="flex: 1; display: flex; flex-direction: column; gap: 1.5rem;">
            <a href="{{ route('projects.crew', $project->id) }}" style="display: inline-block; background: #299390; color: #fff; border-radius: 6px; padding: 0.75rem 1.5rem; font-weight: 600; text-decoration: none; text-align: center; margin-bottom: 1.5rem;">View Crew</a>
            <div style="background: rgba(0,0,0,0.12); border-radius: 8px; padding: 1.25rem; font-size: 1rem;">
                <div style="margin-bottom: 0.75rem;">
                    <strong>End Date:</strong> {{ $project->end_date->format('Y-m-d') }}
                </div>
                <div style="margin-bottom: 0.75rem;">
                    <strong>Location:</strong> {{ $project->location }}
                </div>
                <div style="margin-bottom: 0.75rem;">
                    <strong>Contact Person:</strong> {{ $project->contact_person }}
                </div>
                <div>
                    <strong>Contact Phone:</strong> {{ $project->contact_phone }}
                </div>
            </div>
        </div>
    </div>
</div>