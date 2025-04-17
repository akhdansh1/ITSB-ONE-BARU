@extends('layouts.dosen-layout')

@section('content')
@include('components.dosen-layout', ['title' => '📅 Jadwal Mengajar', 'description' => 'Lihat jadwal mengajarmu.'])

<style>
    .center-screen {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="center-screen px-4 relative z-10">
    <div class="w-full max-w-4xl overflow-x-auto rounded-xl shadow border border-white/20 bg-white/10 backdrop-blur p-6">
        <div class="flex justify-between mb-6">
            <!-- Tombol Kembali ke Dashboard -->
            <a href="{{ route('dashboard.dosen') }}"
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
                    <td class="px-4 py-3">Machine Learning</td>
                    <td class="px-4 py-3">09:00 - 12:20</td>
                    <td class="px-4 py-3">Ruang 201</td>
                </tr>
                <tr class="border-t border-white/10">
                    <td class="px-4 py-3">Rabu</td>
                    <td class="px-4 py-3">Pengolahan Citra</td>
                    <td class="px-4 py-3">13:00 - 14:40</td>
                    <td class="px-4 py-3">Ruang 102</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
