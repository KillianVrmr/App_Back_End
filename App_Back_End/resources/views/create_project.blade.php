<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Project</title>
    @vite(['resources/css/app.css','resources/css/create_project.css'])
</head>
<body>
    <div class="sidebar-container">
        <x-sidebar></x-sidebar>
    </div>
    <div class="main-content">
        <div class="create-project-wrapper">
            <header class="create-project-header">
                <h1 class="create-project-title">Create a New Project</h1>
            </header>
            <main class="create-project-body">
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="create-project-form">
                    @csrf
                    <label for="name">Project Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea>

                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" required>

                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" required>

                    <label for="filename">Upload File:</label>
                    <input type="file" id="filename" name="filename" accept=".jpg,.png,.jpeg" required>

                    <label for="plans">Upload Plans (multiple):</label>
                    <input type="file" id="plans" name="plans[]" multiple accept=".jpg,.png,.jpeg,.pdf">

                    <label for="contact_person">Contact Person:</label>
                    <input type="text" id="contact_person" name="contact_person" required>

                    <label for="contact_phone">Contact Phone:</label>
                    <input type="tel" id="contact_phone" name="contact_phone" required>

                    <button type="submit">Create Project</button>
                </form>

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
            </main>
        </div>
    </div>
</body>
</html>