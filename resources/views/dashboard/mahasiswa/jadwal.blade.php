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

<div class="max-w-4xl mx-auto px-4 py-10 text-white relative z-10">
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
    <h1 class="text-3xl font-bold mb-4">🗓️ Jadwal Kuliah</h1>
    <p class="text-gray-200 mb-6">Berikut jadwal perkuliahanmu minggu ini:</p>

    <div class="overflow-x-auto rounded-xl shadow border border-white/20 bg-white/10 backdrop-blur p-4">
        <table class="w-full text-sm text-left text-white">
            <thead class="text-white/80 uppercase">
                <tr>
                    <th class="px-4 py-3">Hari</th>
                    <th class="px-4 py-3">Mata Kuliah</th>
                    <th class="px-4 py-3">Waktu</th>
                    <th class="px-4 py-3">Ruangan</th>
                </tr>
            </thead>
            <tbody class="text-white/90">
                <tr class="border-t border-white/10">
                    <td class="px-4 py-3">Senin</td>
                    <td class="px-4 py-3">Pemrograman Robot</td>
                    <td class="px-4 py-3">09:00 - 12:20</td>
                    <td class="px-4 py-3">Ruang 306 Lab Programming</td>
                </tr>
                <tr class="border-t border-white/10">
                    <td class="px-4 py-3">Senin</td>
                    <td class="px-4 py-3">Data Sains</td>
                    <td class="px-4 py-3">13:00 - 16:20</td>
                    <td class="px-4 py-3">Ruang 306 Lab Programming</td>
                </tr>
                <tr class="border-t border-white/10">
                    <td class="px-4 py-3">Selasa</td>
                    <td class="px-4 py-3">Teknik Perangkat Lunak</td>
                    <td class="px-4 py-3">08:00 - 09:40</td>
                    <td class="px-4 py-3">Ruang 306 Lab Programming</td>
                </tr>
                <tr class="border-t border-white/10">
                    <td class="px-4 py-3">Rabu</td>
                    <td class="px-4 py-3">Machine Learning</td>
                    <td class="px-4 py-3">09:00 - 12:20</td>
                    <td class="px-4 py-3">Ruang C 201</td>
                </tr>
                <tr class="border-t border-white/10">
                    <td class="px-4 py-3">Rabu</td>
                    <td class="px-4 py-3">Teknik Kompilasi</td>
                    <td class="px-4 py-3">13:00 - 14:40</td>
                    <td class="px-4 py-3">Ruang 306 Lab Programming</td>
                </tr>
                <tr class="border-t border-white/10">
                    <td class="px-4 py-3">Kamis</td>
                    <td class="px-4 py-3">Pengolahan Bahasa Alami</td>
                    <td class="px-4 py-3">08:00 - 09:40</td>
                    <td class="px-4 py-3">Ruang 306 Lab Programming</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
