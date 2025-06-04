<div>
    <h1>Assign Crew to {{ $project->name }}</h1>
    <form action="{{ route('projects.assignCrew', $project->id) }}" method="POST">
        @csrf
        <div>
            <label for="user_id">Select Crew Member:</label>
            <select id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->firstname }} {{ $user->lastname }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Assign Crew Member</button>
    <div>
        <label for="crew_member">Current Crew Member:</label>
        <ul>
            @forelse($project->users as $user)
                <li>{{ $user->firstname }} {{ $user->lastname }}</li>
            @empty
                <li>No crew members assigned yet.</li>
            @endforelse
        </ul>
    </div>
</div>