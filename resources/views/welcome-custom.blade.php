@extends('layouts.app')

@section('title', 'Selamat Datang')

@section('content')
<style>
    body {
        background: linear-gradient(to bottom right, #0f172a, #0fd2c2);
        font-family: 'Inter', sans-serif;
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
        animation: move 25s infinite alternate ease-in-out;
    }

    .particle:nth-child(1) { top: 10%; left: 5%; animation-delay: 0s; }
    .particle:nth-child(2) { top: 70%; left: 80%; animation-delay: 4s; }
    .particle:nth-child(3) { top: 40%; left: 30%; animation-delay: 2s; }

    @keyframes move {
        0% { transform: translateY(0) translateX(0) scale(1); }
        100% { transform: translateY(-50px) translateX(50px) scale(1.2); }
    }

    .animate-fade-in {
        animation: fadeIn 1.4s ease forwards;
    }

    .animate-fade-in-up {
        animation: fadeInUp 1.5s ease forwards;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="background-particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

<div class="w-full max-w-5xl mx-auto px-4 py-12 grid grid-cols-1 md:grid-cols-2 gap-10 items-center animate-fade-in-up">
    <!-- Kiri -->
    <div>
        <img src="image/WhatsApp_Image_2025-04-10_at_15.11.09-removebg-preview.png" alt="Logo" class="h-40 mb-4">
        <div class="h-0.5 w-[calc(100%-3rem)] bg-white/30 ml-6 mb-6 rounded-full"></div>

        <h1 class="text-2xl font-bold mb-2 text-white">Selamat datang</h1>
        <p class="mb-6 leading-relaxed text-white">
            di <strong>ITSB One</strong>, portal sistem informasi terpadu Institut Teknologi Sains Bandung. Silakan masuk menggunakan akun Anda.
        </p>

        <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl space-y-4 border border-white/10 shadow-lg">
            <p class="text-center font-semibold text-white">Masuk sebagai :</p>
            <div class="flex justify-around text-center">
                <a href="/login/mahasiswa" class="group">
                    <div class="w-16 h-16 rounded-full bg-[#0fd2c2] mx-auto mb-2 flex items-center justify-center text-2xl group-hover:scale-110 transition">👤</div>
                    <span class="group-hover:underline text-white">Mahasiswa</span>
                </a>
                <a href="/login/dosen" class="group">
                    <div class="w-16 h-16 rounded-full bg-[#0fd2c2] mx-auto mb-2 flex items-center justify-center text-2xl group-hover:scale-110 transition">🎓</div>
                    <span class="group-hover:underline text-white">Dosen</span>
                </a>
            </div>
        </div>

        <div class="mt-8 h-0.5 w-[calc(100%-3rem)] bg-white/30 ml-6 mb-4 rounded-full"></div>
        <img src="image/1734318481_New Logo ITSB.png" alt="Logo ITSB" class="h-5 mb-4 opacity-70 ml-6 block">

        <p class="text-xs opacity-70 leading-snug text-white ml-6 mt-4">
            ITSB One - Portal Sistem Informasi Terpadu Institut Teknologi Sains Bandung<br>
            Dikelola oleh DSI ITSB<br>
            Layanan bantuan: IT Care (telp. 0872323234, email: dsi@itsb.ac.id)
        </p>
    </div>

    <!-- Kanan -->
    <div class="bg-white/10 backdrop-blur-md p-6 rounded-2xl space-y-6 border border-white/10 shadow-lg animate-fade-in">
        <h2 class="font-bold text-lg text-white">Tautan Penting<br>Institut Teknologi Sains Bandung</h2>
        <ul class="space-y-3">
            <li><a href="https://itsb.ac.id/" class="block bg-white/10 rounded px-4 py-2 hover:bg-white/20 text-white">🌐 www.itsb.ac.id</a></li>
            <li><a href="https://itsb.ac.id/page/berita" class="block bg-white/10 rounded px-4 py-2 hover:bg-white/20 text-white">📰 ITSB News</a></li>
            <li><a href="https://itsb.ac.id/page/jalur-pendaftaran" class="block bg-white/10 rounded px-4 py-2 hover:bg-white/20 text-white">ℹ️ Info Pendaftaran Mahasiswa Baru</a></li>
        </ul>
        <div class="flex gap-4 pt-4">
            <a href="https://play.google.com/store" target="_blank" class="hover:opacity-80 transition">
                <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" class="h-8" alt="Android">
            </a>
            <a href="https://www.apple.com/app-store/" target="_blank" class="hover:opacity-80 transition">
                <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" class="h-8" alt="Apple">
            </a>
        </div>
    </div>
</div>
@endsection
