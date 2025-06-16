<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/css/calendar_planning.css', 'resources/js/calendar_planning.js'])
    <title>Planning</title>
  </head>

<body class="bg-deeppurple">
    <div class="flex">
        <div>
            <x-sidebar></x-sidebar>
        </div>
        <div class="p-16 w-full h-screen">
            <h1 class="font-bold text-3xl text-white">Planning</h1>
            <div id="calendar" class="rounded overflow-hidden mt-4 h-[75vh] w-[70vw]"></div>
        </div>
    </div>
</body>

</html>