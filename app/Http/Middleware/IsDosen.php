namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsDosen
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'dosen') {
            return $next($request);
        }

        return redirect()->route('login.dosen')->withErrors([
            'unauthorized' => 'Akses hanya untuk mahasiswa.',
        ]);
    }
}
