<!-- resources/views/sidebar.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Sidebar Test</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-deepblue font-dmsans">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-deepblue flex flex-col">
            
            <!-- Navigation Menu -->
            <nav class="flex-1 flex flex-col justify-between px-4 py-6">
                <div>
                    <ul class="space-y-2">
                        <li>
                            <a href="/dashboard" class="block text-white hover:text-green transition-colors py-2">Alle projecten</a>
                        </li>
                        @can ('project_create')
                        <li>
                            <a href="/create_project" class="block text-white hover:text-green transition-colors py-2">Nieuw project</a>
                        </li>
                        @endcan
                        <li>
                            <a href="/planning" class="block text-white hover:text-green transition-colors py-2">Mijn planning</a>
                        </li>
                        <!-- <li>
                            <a href="#" class="block text-white hover:text-green transition-colors py-2">Mijn projecten</a>
                        </li> -->
                        <li>
                            <a href="/beschikbaarheid" class="block text-white hover:text-green transition-colors py-2">Beschikbaarheid</a>
                        </li>
                        <li>
                            <a href="/urenindienen" class="block text-white hover:text-green transition-colors py-2">Uren indienen</a>
                        </li>
                        <li>
                            <a href="/urengoedkeuren" class="block text-white hover:text-green transition-colors py-2">Uren goedkeuren</a>
                        </li>
                    </ul>
                    
                    <!-- Divider -->
                    <div class="border-t border-white/20 my-6"></div>
                    
                    <!-- Chats Section -->
                    <div class="mb-4">
                        <h3 class="text-white font-medium mb-3">Chats</h3>
                        <x-sidebar_chat></x-sidebar_chat>
                    </div>
                </div>

                
                <div>
                    <a href="{{ route('logout.get') }}" class="text-white hover:text-green transition-colors text-sm">Logout</a>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>
