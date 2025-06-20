<style>
.create-project-card {
    background: rgba(255,255,255,0.10);
    border-radius: 12px;
    margin: 4rem auto 0 auto;
    padding: 2rem 2.5rem;
    box-shadow: 6px 12px 8px 0 rgba(0,0,0,0.45);
    max-width: 500px;
    color: #fff;
}
.create-project-card label {
    display: block;
    margin-bottom: 0.25rem;
    font-weight: 600;
}
.create-project-card input,
.create-project-card textarea {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border-radius: 6px;
    border: 1px solid #ccc;
    margin-bottom: 1.25rem;
    font-size: 1rem;
}
.create-project-card input[type="file"] {
    padding: 0.25rem 0;
    background: #fff;
    color: #222;
}
.create-project-card button {
    background: #299390;
    color: #fff;
    border: none;
    border-radius: 6px;
    padding: 0.5rem 1.5rem;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    margin-top: 0.5rem;
    transition: background 0.2s;
}
.create-project-card button:hover {
    background: #2563eb;
}
.alert {
    margin-top: 1rem;
    padding: 0.75rem 1rem;
    border-radius: 6px;
}
.alert-success {
    background: #299390;
    color: #fff;
}
.alert-danger {
    background: #b91c1c;
    color: #fff;
}
</style>

<div style="background: #310e44; min-height: 100vh; color: #fff;">
    <div class="create-project-card">
        <h1 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1.5rem;">Create a New Project</h1>
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
                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>
            <div>
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" required>
            </div>
            <div>
                <label for="filename">Upload Main File:</label>
                <input type="file" id="filename" name="filename"  accept=".jpg,.png,.JPEG" required>
            </div>
            <div>
                <label for="plans">Upload plans:</label>
                <input type="file" id="plans" name="plans[]" multiple accept=".jpg,.png,.JPEG" required>
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
    </div>
</div>
