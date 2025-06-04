<!-- resources/views/sidebar.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Sidebar Test</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 font-dmsans">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-deepblue flex flex-col">
            
            <!-- Navigation Menu -->
            <nav class="flex-1 flex flex-col justify-between px-4 py-6">
                <div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="block text-white hover:text-green transition-colors py-2">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block text-white hover:text-green transition-colors py-2">Alle projecten</a>
                        </li>
                        <li>
                            <a href="#" class="block text-white hover:text-green transition-colors py-2">Mijn projecten</a>
                        </li>
                        <li>
                            <a href="#" class="block text-white hover:text-green transition-colors py-2">Beschikbaarheid</a>
                        </li>
                    </ul>
                    
                    <!-- Divider -->
                    <div class="border-t border-white/20 my-6"></div>
                    
                    <!-- Chats Section -->
                    <div class="mb-4">
                        <h3 class="text-white font-medium mb-3">Chats</h3>
                    </div>
                </div>

                <!-- Logout at the bottom -->
                <div>
                    <a href="{{ route('logout.get') }}" class="text-white hover:text-green transition-colors text-sm">Logout</a>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>
