<div>
    <!-- Life is available only in the present moment. - Thich Nhat Hanh -->
    <h1>Create a New Project</h1>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="date">End Date:</label>
            <input type="date" id="end_date" name="end_date" required>
        </div>
        <div>
            <label for="location">location:</label>
            <input type="text" id="location" name="location" required>
        </div>
        <div>
            <label for="filename">Upload File:</label>
            <input type="file" id="filename" name="filename" accept=".jpg,.png,.JPEG" required>
        </div>
        <div>
            <label for="contact_person">Contact Person:</label>
            <input type="text" id="contact_person" name="contact_person" required>
        </div>
        <div>
            <label for="contact_phone">Contact Phone:</label>
            <input type="tel" id="contact_phone" name="contact_phone" required>
        </div>
        <button type="submit">Create Project</button>
        </div>
        
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        
