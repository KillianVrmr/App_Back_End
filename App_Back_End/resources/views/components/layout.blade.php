<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Work Tracker' }}</title>

    <!-- Tailwind CDN -->
     <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
     
</head>
<body>
    @isset($header)
    <header>
        {{ $header }}
    </header>
    @endisset

    <main>
        {{ $slot }}
    </main>
    
    @isset($footer)
    <footer>
        {{ $footer }}
    </footer>
    @endisset

</body>
</html>
