<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Override default redirect jika user belum login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request): ?string
{
    if (! $request->expectsJson()) {
        if (
            $request->is('dashboard/dosen') ||
            $request->is('dashboard/dosen/*') ||
            $request->is('login/dosen') ||
            $request->is('dosen/*')
        ) {
            return route('login.dosen');
        }

        return route('login.mahasiswa');
    }

    return null;
}
}
