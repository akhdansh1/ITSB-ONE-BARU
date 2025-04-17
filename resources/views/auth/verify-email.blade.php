<!-- resources/views/auth/verify-email.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verifikasi Email</title>
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

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
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

    <!-- Icon -->
    <img src="{{ asset('image/WhatsApp_Image_2025-04-10_at_15.11.09-removebg-preview.png') }}" alt="Dosen Icon" class="h-24 object-contain drop-shadow-lg">

    <!-- Card -->
    <div class="w-full max-w-md bg-white/10 backdrop-blur-md text-white p-6 rounded-2xl border border-white/20 shadow-lg space-y-4 animate-fade-in">
        <div class="text-sm text-white text-center">
            {{ __('Terima kasih sudah mendaftar! Sebelum mulai, tolong verifikasi alamat email kamu dengan mengklik link yang baru saja kami kirim. Kalau kamu belum menerima emailnya, kami bisa kirim ulang.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="text-sm text-green-400 text-center font-medium">
                {{ __('Link verifikasi baru telah dikirim ke email yang kamu gunakan saat mendaftar.') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-4">
            <!-- Resend Email -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full sm:w-auto bg-white text-[#002366] font-bold py-2 px-4 rounded-full hover:bg-gray-200 transition">
                    {{ __('Kirim Ulang Email Verifikasi') }}
                </button>
            </form>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm underline text-blue-300 hover:text-white transition">
                    {{ __('Logout') }}
                </button>
            </form>
        </div>
    </div>

</body>
</html>
