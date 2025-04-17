<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RoleLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\Auth\NewPasswordController;


// =========================
// 🏠 Halaman Utama
// =========================
Route::get('/', function () {
    return view('welcome-custom');
});

// =========================
// 📊 Dashboard
// =========================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// =========================
// 🎓 Dashboard Mahasiswa
// =========================
Route::get('/dashboard/mahasiswa', function () {
    return view('dashboard.mahasiswa');
})->middleware(['auth'])->name('dashboard.mahasiswa');

// =========================
// 📅 Jadwal Kuliah (Mahasiswa)
// =========================
Route::view('/dashboard/mahasiswa/jadwal', 'dashboard.mahasiswa.jadwal')
    ->middleware('auth')
    ->name('dashboard.mahasiswa.jadwal');

// =========================
// 💬 Forum Diskusi (Mahasiswa)
// =========================
Route::view('/dashboard/mahasiswa/forum', 'dashboard.mahasiswa.forum')
    ->middleware('auth')
    ->name('dashboard.mahasiswa.forum');

// =========================
// 👨‍🏫 Dashboard Dosen
// =========================
Route::get('/dashboard/dosen', function () {
    return view('dashboard.dosen');
})->middleware(['auth'])->name('dashboard.dosen');

// 👨‍🏫 Dosen - Input Nilai
Route::get('/dashboard/dosen/input-nilai', function () {
    return view('dashboard.dosen.input-nilai');
})->middleware(['auth'])->name('dosen.input-nilai');

// 👨‍🏫 Dosen - Jadwal Mengajar
Route::get('/dashboard/dosen/jadwal', function () {
    return view('dashboard.dosen.jadwal');
})->middleware(['auth'])->name('dosen.jadwal');

// 👨‍🏫 Dosen - Forum Dosen
Route::get('/dashboard/dosen/forum', function () {
    return view('dashboard.dosen.forum');
})->middleware(['auth'])->name('dosen.forum');

// 👨‍🏫 Dosen - Arsip Perkuliahan
Route::get('/dashboard/dosen/arsip', function () {
    return view('dashboard.dosen.arsip');
})->middleware(['auth'])->name('dosen.arsip');

// =========================
// 👤 Profil User
// =========================
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// =========================
// 📄 Welcome Default (Optional)
// =========================
Route::get('/welcome-default', function () {
    return view('welcome');
});

// =========================
// 🔐 Auth Routes (Laravel Default)
// =========================
require __DIR__.'/auth.php';

// =========================
// 🧑‍🎓 Login Mahasiswa & Dosen
// =========================
Route::prefix('login')->group(function () {
    Route::get('/mahasiswa', [RoleLoginController::class, 'showMahasiswaLogin'])->name('login.mahasiswa');
    Route::get('/dosen', [RoleLoginController::class, 'showDosenLogin'])->name('login.dosen');
});

Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

// =========================
// 🚪 Logout Manual (Redirect ke Login Mahasiswa)
// =========================
use Illuminate\Support\Facades\Auth;

Route::post('/logout', function () {
    $role = Auth::user()->role ?? null;

    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    if ($role === 'dosen') {
        return redirect()->route('login.dosen');
    }

    return redirect()->route('login.mahasiswa');
})->name('logout');

// =========================
// 🔁 Reset Password View (Kirim Token ke View)
// =========================
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

// Handle proses reset password (submit form password baru)
Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.update');

    Route::post('/login/mahasiswa', [RoleLoginController::class, 'loginMahasiswa'])->name('login.mahasiswa.submit');
    Route::post('/login/dosen', [RoleLoginController::class, 'loginDosen'])->name('login.dosen.submit');

    Route::get('/cek-auth', function () {
        dd(Auth::user());
    })->middleware('auth');
