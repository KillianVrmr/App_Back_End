<div>
    <h1>Dashboard</h1>
    <div class="project-list">
        <h2>Your Projects</h2>
        @if($projects->isEmpty())
            <p>No projects found. <a href="{{ route('projects.create') }}">Create a new project</a>.</p>
        @else
            <ul>
                @foreach($projects as $project)
                    <li>
                        <a href="{{ route('projects.project', $project->id) }}">{{ $project->name }}</a>
                        - {{ $project->description }}

                        <span class="date">End Date: {{ $project->end_date->format('Y-m-d') }}</span>
                        <span class="location">Location: {{ $project->location }}</span>
                        <span class="contact">Contact: {{ $project->contact_person }} ({{ $project->contact_phone }})</span>
                        @if($project->filename)
                            <span class="file">
                                <img src="{{ asset('storage/' . $project->filename) }}" alt="Project Image" style="max-width: 200px; max-height: 200px;">
                            </span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>


</div>