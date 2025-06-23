<!DOCTYPE html>
<html>
<head>
    <title>Sidebar Test</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-dmsans; margin-left:450px;">
    @php 
        $projects = $projects ?? \App\Models\Project::all();
    @endphp
    <div class="flex">
        <div class="w-64 bg-deepblue flex flex-col">
            
            <nav class="flex flex-col justify-between p-2">
                <div>
                    <ul class="space-y-1">
                        @foreach($projects as $project)
                            <li>
                                <a href="{{ route('projects.chat', $project->id) }}" class="block text-white hover:text-green transition-colors py-1">
                                    {{ $project->name }}
                                </a>
                            </li>
                        @endforeach
                        
                    </ul>
                    
                    <!-- Divider -->
                    <div class="border-t border-white/20 my-2"></div>
                    
                </div>

                
            </nav>
        </div>
    </div>
</body>
</html>
