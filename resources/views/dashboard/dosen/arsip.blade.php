@extends('layouts.dosen-layout')

@section('content')
@include('components.dosen-layout', ['title' => '📂 Arsip Perkuliahan', 'description' => 'Kumpulan materi dan catatan kuliah.'])

<style>
    .center-screen {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="center-screen px-4 relative z-10 text-white">
    <div class="w-full max-w-3xl bg-white/10 backdrop-blur border border-white/20 rounded-xl p-6 shadow">
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
        <ul class="space-y-4">
            <li class="bg-white/10 p-4 rounded-xl border border-white/20">📘 Materi Pemrograman Web - Pertemuan 1</li>
            <li class="bg-white/10 p-4 rounded-xl border border-white/20">📊 Slide Machine Learning - Minggu 3</li>
            <li class="bg-white/10 p-4 rounded-xl border border-white/20">📁 File Tugas Basis Data - Semester Ganjil</li>
        </ul>
    </div>
</div>
@endsection
