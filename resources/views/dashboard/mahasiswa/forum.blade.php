@extends('layouts.app')

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
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 50%;
        animation: float 30s infinite ease-in-out alternate;
    }

    @keyframes float {
        0% { transform: translateY(0) scale(1); }
        100% { transform: translateY(-60px) scale(1.1); }
    }

    .particle:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { top: 70%; left: 85%; animation-delay: 2s; }
    .particle:nth-child(3) { top: 40%; left: 30%; animation-delay: 4s; }
    .particle:nth-child(4) { top: 80%; left: 20%; animation-delay: 1s; }
    .particle:nth-child(5) { top: 25%; left: 60%; animation-delay: 3s; }
    .particle:nth-child(6) { top: 60%; left: 40%; animation-delay: 5s; }
    .particle:nth-child(7) { top: 15%; left: 75%; animation-delay: 6s; }
</style>

<div class="background-particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

<div class="max-w-3xl mx-auto px-4 py-10 text-white relative z-10">
    <div class="flex justify-between mb-6">
        <!-- Tombol Kembali ke Dashboard -->
        <a href="{{ route('dashboard.mahasiswa') }}"
           class="backdrop-blur bg-white/10 border border-white/20 text-white text-sm font-semibold py-2 px-5 rounded-full shadow hover:bg-white/20 transition">
            ← Kembali ke Dashboard
        </a>

        <!-- Tombol Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="backdrop-blur bg-white/10 border border-white/20 text-white text-sm font-semibold py-2 px-5 rounded-full shadow hover:bg-white/20 transition">
                Logout
            </button>
        </form>
    </div>
    <h1 class="text-3xl font-bold mb-4">💬 Forum Diskusi Mahasiswa</h1>
    <p class="text-gray-200 mb-6">Diskusikan materi kuliah, tugas, atau tanya jawab dengan teman sekelas!</p>

    <!-- Forum Post Dummy -->
    <div class="space-y-6">
        <div class="bg-white/10 backdrop-blur border border-white/20 rounded-xl p-4 shadow">
            <div class="flex gap-3 items-start">
                <img src="https://ui-avatars.com/api/?name=Andi&background=0fd2c2&color=0f172a" alt="Andi"
                     class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-semibold text-white">Akhdan.shalahudin</h4>
                    <p class="text-sm text-gray-300 mt-1">Mending PHP atau JS?</p>
                    <span class="text-xs text-gray-400 mt-2 block">2 jam yang lalu</span>
                </div>
            </div>
        </div>

        <div class="bg-white/10 backdrop-blur border border-white/20 rounded-xl p-4 shadow">
            <div class="flex gap-3 items-start">
                <img src="https://ui-avatars.com/api/?name=Bella&background=0fd2c2&color=0f172a" alt="Bella"
                     class="w-10 h-10 rounded-full">
                <div>
                    <h4 class="font-semibold text-white">Muhammad.fahkrezie</h4>
                    <p class="text-sm text-gray-300 mt-1">Mending ternak lele bro wkwks.</p>
                    <span class="text-xs text-gray-400 mt-2 block">1 jam yang lalu</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
