<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(to bottom right, #0f172a, #0fd2c2);
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
            animation: float 25s infinite alternate ease-in-out;
        }

        .particle:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
        .particle:nth-child(2) { top: 70%; left: 80%; animation-delay: 4s; }
        .particle:nth-child(3) { top: 40%; left: 30%; animation-delay: 2s; }

        @keyframes float {
            0% { transform: translateY(0) translateX(0) scale(1); }
            100% { transform: translateY(-50px) translateX(50px) scale(1.2); }
        }

        .animate-fade-in {
            animation: fadeIn 1.2s ease forwards;
        }

        .animate-fade-in-up {
            animation: fadeInUp 1.5s ease forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="font-[Poppins] h-screen overflow-auto text-white flex flex-col items-center justify-center px-4 py-6 space-y-6">

    <!-- Background Particles -->
    <div class="background-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>

    <!-- Logo ITSB One -->
    <img src="{{ asset('image/WhatsApp_Image_2025-04-10_at_15.11.09-removebg-preview.png') }}" alt="ITSB One Logo" class="h-30 md:h-24 object-contain drop-shadow-lg animate-fade-in">

    <!-- Login Card -->
    <div class="w-full max-w-xs bg-white/10 backdrop-blur-md text-white p-6 rounded-2xl border border-white/20 shadow-lg space-y-4 animate-fade-in-up">
        <form method="POST" action="{{ route('login.mahasiswa.submit') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M5.121 17.804A10.005 10.005 0 0112 15c2.084 0 4.004.634 5.621 1.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <input type="email" name="email" placeholder="Email"
                       class="pl-10 w-full py-2 rounded-full bg-[#002366] text-white placeholder-white focus:outline-none"
                       required>
            </div>

            <!-- Password -->
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 11c0 1.657-1.343 3-3 3s-3-1.343-3-3V7a3 3 0 016 0v4zm6 2V7a9 9 0 00-18 0v6a9 9 0 0018 0z" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <input type="password" name="password" placeholder="Password"
                       class="pl-10 w-full py-2 rounded-full bg-[#002366] text-white placeholder-white focus:outline-none"
                       required>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-white text-[#002366] font-bold py-2 rounded-full hover:bg-gray-200 transition">
                MASUK
            </button>

            <!-- Google Login -->
            <a href="{{ url('/auth/google') }}"
               class="flex items-center justify-center gap-2 bg-white border border-gray-300 rounded-lg shadow px-4 py-2 hover:bg-gray-100 transition">
                <img src="https://img.icons8.com/color/24/000000/google-logo.png" alt="Google logo" class="w-5 h-5"/>
                <span class="text-sm font-medium text-gray-700">Login with Google</span>
            </a>

            <!-- Forgot Password -->
            <div class="text-right text-sm">
                <a href="{{ route('password.request') }}" class="text-white hover:underline">Lupa Password?</a>
            </div>
        </form>

        <!-- Store Badges -->
        <div class="border-t border-white/20 pt-4 flex justify-around items-center">
            <a href="https://apps.apple.com/" target="_blank">
                <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store" class="h-10">
            </a>
            <a href="https://play.google.com/store" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play" class="h-10">
            </a>
        </div>
    </div>

</body>
</html>
