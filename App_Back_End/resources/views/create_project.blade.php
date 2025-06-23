<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Create Project</title>
    @vite(['resources/css/app.css'])
</head>

<body class="bg-deeppurple font-dmsans">
    <div class="flex">
        <div class="w-64">
            <x-sidebar></x-sidebar>
        </div>
        <div class="flex-1 p-16">
            <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-lg p-8">
                
                <header class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Nieuw project aanmaken</h1>
                </header>

                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="flex flex-col md:flex-row gap-8">
                        <!-- LINKERKOLOM -->
                        <div class="flex-1 space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Projectnaam:</label>
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none transition-all">
                            </div>

                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Beschrijving:</label>
                                <textarea id="description" name="description" required rows="4"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none transition-all resize-vertical"></textarea>
                            </div>

                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-2">Einddatum:</label>
                                <input type="date" id="end_date" name="end_date" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none transition-all">
                            </div>

                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">Locatie:</label>
                                <input type="text" id="location" name="location" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none transition-all">
                            </div>
                        </div>

                        <!-- RECHTERKOLOM -->
                        <div class="flex-1 space-y-6">
                            <div>
                                <label for="filename" class="block text-sm font-medium text-gray-700 mb-2">Foto uploaden:</label>
                                <input type="file" id="filename" name="filename" accept=".jpg,.png,.jpeg" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none transition-all file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                            </div>

                            <div>
                                <label for="contact_person" class="block text-sm font-medium text-gray-700 mb-2">Contactpersoon:</label>
                                <input type="text" id="contact_person" name="contact_person" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none transition-all">
                            </div>

                            <div>
                                <label for="contact_phone" class="block text-sm font-medium text-gray-700 mb-2">Contact Telefoon:</label>
                                <input type="tel" id="contact_phone" name="contact_phone" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg outline-none transition-all">
                            </div>
                        </div>
                    </div>

                    <!-- SUBMIT BUTTON -->
                    <div class="pt-6">
                        <button type="submit"
                            class="w-full bg-green text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-hover">
                            Project Aanmaken
                        </button>
                    </div>
                </form>

                @if(session('success'))
                <div class="mt-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
                @endif

                @if($errors->any())
                <div class="mt-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

            </div>  
        </div>
    </div>
</body>

</html>