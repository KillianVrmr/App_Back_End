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
        <div class="p-16 w-flex1 h-screen">
            <h1 class="font-bold text-3xl text-white">Beschikbaarheid</h1>
            <div id="calendar" class="rounded overflow-hidden mt-4 h-[70vh] w-[50vw]"></div>
        </div>
        <div class="h-screen py-24 flex flex-col">
            <button id="available" class="bg-green px-8 py-4 m-4 text-white rounded w-48">Beschikbaar</button>
            <button id="unavailable" class="bg-red-400 px-8 py-4 m-4 text-white rounded w-48">Niet beschikbaar</button>
        </div>
    </div>
</body>

</html>