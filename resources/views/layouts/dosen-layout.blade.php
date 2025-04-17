<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard Dosen' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background: linear-gradient(to bottom right, #0f172a, #0fd2c2); color: white; font-family: 'Inter', sans-serif;">
    <div class="min-h-screen">
        @yield('content')
    </div>
</body>
</html>
