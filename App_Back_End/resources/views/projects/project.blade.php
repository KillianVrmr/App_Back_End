<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css'])
    <title>Project Details</title>
</head>

<body class="bg-deeppurple min-h-screen font-dmsans">
    <div class="flex">
        <div class="sidebar-container">
            <x-sidebar></x-sidebar>
        </div>
        <div class="main-content flex-1 flex items-center justify-center p-8">
            <div class="bg-purple-light rounded-lg shadow-lg p-8 max-w-5xl w-full h-[80vh] flex gap-8">
                <!-- Left column: Name, Image, Description -->
                <div class="flex-2 flex flex-col gap-6">
                    <h1 class="text-3xl font-bold text-white">{{ $project->name }}</h1>

                    <img src="{{ $project->image_url }}" alt="Project Image" class="rounded-lg object-cover max-h-64 w-full">

                    <p class="text-white text-lg leading-relaxed flex-1">
                        {{ $project->description }}
                    </p>
                </div>

                <!-- Right column: Crew and Details -->
                <div class="flex-1 flex flex-col gap-6 text-white">
                    <a href="{{ route('projects.crew', $project->id) }}" class="bg-green hover:bg-green-hover p-4 text-white rounded-lg transition-colors text-center font-medium">Bekijk Crew</a>

                    <div class="space-y-4 flex-1">
                        <div class="text-md">
                            <strong>Einddatum:</strong> {{ $project->end_date->format('Y-m-d') }}
                        </div>
                        <div class="text-md">
                            <strong>Locatie:</strong> {{ $project->location }}
                        </div>
                        <div class="text-md">
                            <strong>Contactpersoon:</strong> {{ $project->contact_person }}
                        </div>
                        <div class="text-md">
                            <strong>Contact Telefoon:</strong> {{ $project->contact_phone }}
                        </div>
                    </div>

                    <a href="{{ route('dashboard') }}" class="bg-green hover:bg-green-hover p-4 rounded-lg transition-colors text-center font-medium">Terug naar dashboard</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>