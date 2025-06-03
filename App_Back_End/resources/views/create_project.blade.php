<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <h1>Create a New Project</h1>
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Project Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="date">Start Date:</label>
            <input type="date" id="date" name="date" required>
        </div>
        <div>
            <label for="location">location:</label>
            <input type="text" id="location" name="locatie" required>
        </div>
        <button type="submit">Create Project</button>
</div>
