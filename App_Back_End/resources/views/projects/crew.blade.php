<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/css/crew.css'])
    <title>Crew Members</title>
</head>
<body>
    
    <div class="sidebar-container">
        <x-sidebar></x-sidebar>
    </div>
    <div class="main-content">
        <div class="crew-wrapper">
            <h1 class="crew-title">Crew Members</h1>
            <ul class="crew-list">
                @forelse($project->users as $user)
                <li>{{ $user->firstname }} {{ $user->lastname }}</li>
            @empty
                <li>No crew members assigned yet.</li>
            @endforelse
            </ul>
            <a href="{{ route('projects.project', $project->id) }}" class="back-link">Back to Project</a>
        </div>
    </div>
</body>
</html>