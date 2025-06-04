
    <h1>Project: {{ $project->name }}</h1>
    <p>Description: {{ $project->description }}</p>
    <p>Contact Person: {{ $project->contact_person }}</p>
    <p>Contact Phone: {{ $project->contact_phone }}</p>
    <p>Location: {{ $project->location }}</p>
    <p>End Date: {{ $project->end_date->format('Y-m-d') }}</p>

    @if($project->filename)
        <div>
            <img src="{{ asset('storage/' . $project->filename) }}" alt="Project Image" style="max-width: 400px; max-height: 400px;">
        </div>
    @else
        <p>No image available for this project.</p>
    @endif


    <div>
        <a href="{{ route('dashboard') }}">Back to Dashboard</a>
    </div>