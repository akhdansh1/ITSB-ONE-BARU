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

<div class="background-particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 text-white relative z-10">
    @php
        $email = Auth::user()->email;
        $name = ucfirst(explode('@', $email)[0]);
    @endphp

    <!-- Tombol Logout -->
    <div class="flex justify-end mb-6">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="backdrop-blur bg-white/10 border border-white/20 text-white text-sm font-semibold py-2 px-5 rounded-full shadow hover:bg-white/20 transition">
                Logout
            </button>
        </form>
    </div>

    <!-- Welcome -->
    <div class="mb-8 animate-fade-in-up">
        <h1 class="text-4xl font-bold">Selamat datang, {{ $name }}! 👨‍🏫</h1>
        <p class="text-sm text-gray-300 mt-1">Dashboard dosen ITSB One siap membantumu mengajar!</p>
    </div>

    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 animate-fade-in">
        @php
    use Illuminate\Support\Str;

    $cards = [
        ['title' => '📝 Input Nilai', 'desc' => 'Masukkan atau ubah nilai mahasiswa.', 'link' => '/dashboard/dosen/input-nilai'],
        ['title' => '💡 E-Learning', 'desc' => 'Akses materi, kuis, dan forum dosen-mahasiswa.', 'link' => 'https://itsb.ecampuz.com/eakademikportal/index.php?pModule=zdKbnKU=&pSub=zdKbnKU=&pAct=18yZqg=='],
        ['title' => '📅 Jadwal Mengajar', 'desc' => 'Lihat dan kelola jadwal perkuliahanmu.', 'link' => '/dashboard/dosen/jadwal'],
        ['title' => '👥 Forum Dosen', 'desc' => 'Diskusi, kolaborasi, dan update antar dosen.', 'link' => '/dashboard/dosen/forum'],
        ['title' => '📂 Arsip Perkuliahan', 'desc' => 'Dokumen & rekaman kelas terdahulu.', 'link' => '/dashboard/dosen/arsip'],
    ];
@endphp

@foreach ($cards as $card)
<a href="{{ $card['link'] }}"
   @if(isset($card['external']) && $card['external']) target="_blank" @endif
   class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl shadow-lg transition-all duration-300 hover:bg-white/20 hover:shadow-xl hover:scale-[1.03]">
    <h2 class="text-xl font-semibold">{{ $card['title'] }}</h2>
    <p class="text-sm text-gray-200 mt-2">{{ $card['desc'] }}</p>
</a>
@endforeach
    </div>
</div>

<!-- Simple Animations -->
<style>
    .animate-fade-in {
        animation: fadeIn 1.5s ease forwards;
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
@endsection
