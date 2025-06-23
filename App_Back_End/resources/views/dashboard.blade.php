<!-- dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    @vite(['resources/css/app.css'])
    
</head>
<body class="bg-deeppurple text-white flex font-dmsans">
    <div class="flex">
        
         <x-sidebar></x-sidebar>
        
        <div class="main-content flex-1 overflow-y-auto">
            <div class="p-16">

                <h1 class="font-bold text-3xl text-white">Alle projecten</h1>
                <form method="GET" action="{{ route('dashboard') }}" style="margin-bottom: 1.5rem; gap: 0.5rem;" class="mt-4 flex flex-col">
                    <div>
                        <label for="locationFilter" style="align-self: center;">Locatie</label>
                    </div>
                    <div>
                        <input type="text" id="locationFilter" name="location" value="{{ request('location') }}" placeholder="Zoek op locatie"
                            style="border: 1px solid #ccc; border-radius: 6px; padding: 0.5rem 1rem;">
                        <button type="submit" style="background:#299390; color: #fff; border: none; border-radius: 6px; padding: 0.5rem 1.25rem; cursor: pointer;">Filter</button>
                    </div>
                </form>
                
                <ul style="list-style: none; padding: 0; margin: 0;">
                    @foreach($projects as $project)
                        <li class="bg-purple-light rounded p-6 mb-4 flex">
                                <div class="flex-1">
                                    <a href="{{ route('projects.project', $project->id) }}"><img src="{{ $project->image_url }}" alt="Project Image" class="project-img rounded max-w-64"></a>
                                </div>
                            <div class="project-info px-6 flex-2">
                                <a href="{{ route('projects.project', $project->id) }}" class="text-white font-bold">
                                    {{ $project->name }}
                                </a>
                                <div class="project-desc">
                                    {{ $project->description }}
                                </div>
                                <div class="project-meta">
                                    <span class="date">End Date: {{ $project->end_date->format('Y-m-d') }}</span>
                                    <span class="location">Location: {{ $project->location }}</span><br>
                                    <span class="contact">Contact: {{ $project->contact_person }} ({{ $project->contact_phone }})</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>
</html>