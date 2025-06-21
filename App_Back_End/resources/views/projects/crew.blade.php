<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css',resources/css/crew.css'])
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
                @foreach($crew as $member)
                    <li class="crew-member-card">
                        @if($member->avatar)
                            <img src="{{ asset('storage/' . $member->avatar) }}" alt="Avatar" class="crew-avatar">
                        @else
                            <div class="crew-avatar"></div>
                        @endif
                        <div class="crew-info">
                            <div class="crew-name">{{ $member->name }}</div>
                            <div class="crew-role">{{ $member->role ?? 'Crew Member' }}</div>
                            <div class="crew-contact">
                                <strong>Email:</strong> {{ $member->email ?? 'N/A' }}<br>
                                <strong>Phone:</strong> {{ $member->phone ?? 'N/A' }}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <a href="{{ route('projects.project', $project->id) }}" class="back-link">Back to Project</a>
        </div>
    </div>
</body>
</html>