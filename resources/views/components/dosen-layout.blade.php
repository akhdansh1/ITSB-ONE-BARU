<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard Dosen' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(to bottom right, #0f172a, #0fd2c2);
            font-family: 'Inter', sans-serif;
            color: white;
        }

        .background-particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .particle {
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            animation: float 20s infinite alternate ease-in-out;
        }

        .particle:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
        .particle:nth-child(2) { top: 70%; left: 80%; animation-delay: 3s; }
        .particle:nth-child(3) { top: 40%; left: 30%; animation-delay: 6s; }
        .particle:nth-child(4) { top: 20%; left: 70%; animation-delay: 1s; }
        .particle:nth-child(5) { top: 85%; left: 15%; animation-delay: 5s; }

        @keyframes float {
            0% { transform: translateY(0px) translateX(0px) scale(1); }
            100% { transform: translateY(-60px) translateX(60px) scale(1.2); }
        }
    </style>
</head>
<body>
    <div class="background-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <main class="relative z-10">
        @yield('content')
    </main>
</body>
</html>
