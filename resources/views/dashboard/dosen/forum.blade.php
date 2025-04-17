@extends('layouts.dosen-layout')

@section('content')
@include('components.dosen-layout', ['title' => '👥 Forum Dosen', 'description' => 'Diskusi dan kolaborasi antar dosen.'])

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
        <p class="mb-4 text-white/80">Belum ada diskusi. Yuk mulai percakapan!</p>
        <form action="#" method="POST" class="flex flex-col sm:flex-row gap-3">
            @csrf
            <input type="text" class="flex-1 rounded-full bg-white/10 border border-white/20 px-4 py-2 placeholder-white/60" placeholder="Tulis pesan...">
            <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-white font-semibold px-6 py-2 rounded-full whitespace-nowrap">Kirim</button>
        </form>
    </div>
</div>
@endsection
