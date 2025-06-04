<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/css/calendar.css', 'resources/js/calendar.js'])
    <title>Beschikbaarheid</title>
  </head>

<body class="bg-deeppurple">
    <div class="flex">
        <div>
            <x-sidebar></x-sidebar>
        </div>
        <div class="p-16 w-full h-screen">
            <h1 class="font-bold text-3xl text-white">Beschikbaarheid</h1>
            <div id="calendar" class="rounded overflow-hidden mt-4 h-[70vh] w-[50vw]"></div>
        </div>
        <div class="h-screen py-24">
            <button id="available" class="bg-green p-4 m-4 text-white">Beschikbaar</button>
            <button id="unavailable" class="bg-red-400 p-4 m-4 text-white">Niet beschikbaar</button>
        </div>
    </div>
</body>

</html>