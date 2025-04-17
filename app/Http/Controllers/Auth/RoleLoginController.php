<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RoleLoginController extends Controller
{
    public function showMahasiswaLogin(): View
    {
        return view('auth.login-mahasiswa');
    }

    public function showDosenLogin(): View
    {
        return view('auth.login-dosen');
    }

    public function loginMahasiswa(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // 🛡️ Session secure

            $user = Auth::user();
            \Log::info('Login berhasil', ['user' => $user]);
            if ($user->role === 'mahasiswa') {
                return redirect()->route('dashboard.mahasiswa');
            } else {
                \Log::warning('User bukan mahasiswa', ['role' => $user->role]);
                Auth::logout();
                return redirect()->route('login.mahasiswa')->withErrors([
                    'email' => 'Akun ini bukan mahasiswa.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function loginDosen(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'dosen') {
                return redirect()->route('dashboard.dosen');
            } else {
                Auth::logout();
                return redirect()->route('login.dosen')->withErrors([
                    'email' => 'Akun ini bukan dosen.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
}
