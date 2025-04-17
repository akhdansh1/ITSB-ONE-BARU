<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $email = $googleUser->email;

            // ✅ Cek domain email
            if (!str_ends_with($email, '@itsb.ac.id')) {
                return redirect()->route('login.mahasiswa')
                    ->withErrors(['email' => 'Login hanya diperbolehkan dengan email @itsb.ac.id']);
            }

            // 🔍 Cek user, kalau belum ada → buat baru
            $user = User::firstOrCreate(
                ['email' => $email],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(\Illuminate\Support\Str::random(12)),
                    'role' => 'mahasiswa', // Default role
                ]
            );

            // 🔐 Login
            Auth::login($user);

            // 🧭 Redirect sesuai role
            return match ($user->role) {
                'mahasiswa' => redirect()->route('dashboard.mahasiswa'),
                'dosen' => redirect()->route('dashboard.dosen'),
                default => redirect()->route('login.mahasiswa')->withErrors([
                    'email' => 'Role tidak valid.',
                ]),
            };
        } catch (\Exception $e) {
            return redirect()->route('login.mahasiswa')->withErrors([
                'email' => 'Gagal login dengan Google: ' . $e->getMessage(),
            ]);
        }
    }
}
