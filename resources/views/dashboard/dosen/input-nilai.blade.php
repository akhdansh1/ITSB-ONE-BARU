@extends('layouts.dosen-layout')

@section('content')
@include('components.dosen-layout', ['title' => '📝 Input Nilai', 'description' => 'Masukkan nilai mahasiswa di sini.'])

<style>
    /* Tengah layar */
    .center-screen {
        min-height: calc(100vh - 200px);
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="center-screen px-4 relative z-10">
    <div class="w-full max-w-2xl bg-white/10 backdrop-blur border border-white/20 rounded-xl p-8 text-white shadow-lg">
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
        <form action="#" method="POST" class="space-y-6">
            @csrf

            <!-- Nama Mahasiswa -->
            <div>
                <label class="block text-sm font-medium mb-1" for="nama">Nama Mahasiswa</label>
                <input type="text" id="nama" name="nama"
                       class="w-full rounded-lg bg-white/5 border border-white/20 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400 transition text-white placeholder-gray-300"
                       placeholder="Contoh: Budi Santoso" required>
            </div>

            <!-- Mata Kuliah -->
            <div>
                <label class="block text-sm font-medium mb-1" for="matkul">Mata Kuliah</label>
                <select id="matkul" name="matkul"
                        class="w-full rounded-lg bg-white/10 border border-white/20 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400 transition text-white bg-opacity-20">
                    <option disabled selected value="">-- Pilih Mata Kuliah --</option>
                    <option class="text-black">Pemrograman Web</option>
                    <option class="text-black">Machine Learning</option>
                    <option class="text-black">Basis Data</option>
                </select>
            </div>

            <!-- Nilai -->
            <div>
                <label class="block text-sm font-medium mb-1" for="nilai">Nilai</label>
                <input type="number" id="nilai" name="nilai" min="0" max="100"
                       class="w-full rounded-lg bg-white/5 border border-white/20 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-400 transition text-white placeholder-gray-300"
                       placeholder="Masukkan nilai (0 - 100)" required>
            </div>

            <!-- Tombol Simpan -->
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-teal-500 hover:bg-teal-600 transition text-white font-semibold py-2 px-6 rounded-full shadow">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
