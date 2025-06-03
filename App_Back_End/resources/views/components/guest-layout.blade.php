<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Login / Register' }}</title>

    <!-- Tailwind CDN -->
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
     
</head>
<body>

    <div>
        {{ $slot }}
    </div>
    
</body>
</html>
