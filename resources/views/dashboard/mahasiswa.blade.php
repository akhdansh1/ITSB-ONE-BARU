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
        width: 120px;
        height: 120px;
        background: rgba(255, 255, 255, 0.03);
        border-radius: 50%;
        animation: float 30s infinite ease-in-out alternate;
    }

    .particle:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
    .particle:nth-child(2) { top: 70%; left: 85%; animation-delay: 4s; }
    .particle:nth-child(3) { top: 50%; left: 35%; animation-delay: 2s; }

    @keyframes float {
        0% { transform: translateY(0px) scale(1); }
        100% { transform: translateY(-60px) scale(1.1); }
    }

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

<div class="background-particles">
    <div class="particle"></div>
    <div class="particle"></div>
    <div class="particle"></div>
</div>

<div class="max-w-5xl mx-auto px-4 py-12 text-white relative z-10">
    @php
        $email = Auth::user()->email;
        $name = ucfirst(explode('@', $email)[0]);
    @endphp

    <!-- Logout Button -->
    <div class="flex justify-end mb-8">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="backdrop-blur-md bg-white/10 border border-white/20 text-white text-sm font-semibold py-2 px-6 rounded-full shadow-md hover:bg-white/20 transition-all duration-200">
                Logout
            </button>
        </form>
    </div>

    <!-- Welcome Message -->
    <div class="mb-8 animate-fade-in-up">
        <h1 class="text-4xl font-bold mb-2">Selamat datang, {{ $name }}! 🎓</h1>
        <p class="text-base text-gray-300">Semoga harimu menyenangkan di <strong>ITSB One</strong> 🌟</p>
    </div>

    <!-- Navigation Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 animate-fade-in">
        @php
            $cards = [
                [
                    'title' => '🌐 E-Campus',
                    'desc' => 'Akses informasi akademik, KRS, nilai, dll.',
                    'link' => 'https://itsb.ecampuz.com/eakademikportal/index.php?pModule=zdKbnKU=&pSub=zdKbnKU=&pAct=18yZqg==',
                ],
                [
                    'title' => '🏛️ Website ITSB',
                    'desc' => 'Berita & info resmi kampus.',
                    'link' => 'https://itsb.ac.id',
                ],
                [
                    'title' => '📚 Perpustakaan',
                    'desc' => 'Cari buku, e-journal, repository & lainnya.',
                    'link' => 'https://perpustakaan.itsb.ac.id',
                ],
                [
                    'title' => '🗓️ Jadwal Kuliah',
                    'desc' => 'Lihat jadwal kelas mingguanmu.',
                    'link' => '/dashboard/mahasiswa/jadwal',
                ],
                [
                    'title' => '💬 Forum Diskusi',
                    'desc' => 'Diskusi bareng teman sejurusan.',
                    'link' => '/dashboard/mahasiswa/forum',
                ],
            ];
        @endphp

        @foreach ($cards as $card)
            <a href="{{ $card['link'] }}" target="_blank"
               class="bg-white/10 backdrop-blur-sm p-6 rounded-xl border border-white/20 shadow-md hover:shadow-xl hover:bg-white/20 transition-all duration-200">
                <h2 class="text-xl font-semibold">{{ $card['title'] }}</h2>
                <p class="text-sm text-gray-200 mt-2">{{ $card['desc'] }}</p>
            </a>
        @endforeach
    </div>
</div>
@endsection
