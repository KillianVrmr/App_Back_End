<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Login / Register' }}</title>

    @vite('resources/css/app.css')
    <!-- Tailwind CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
     
</head>
<body class="flex">

    <div class="w-1/5 bg-linear-to-b from-deepblue to-purple h-screen">
    </div>

    <div class="w-4/5 h-screen">
        {{ $slot }}
    </div>
    
</body>
</html>
