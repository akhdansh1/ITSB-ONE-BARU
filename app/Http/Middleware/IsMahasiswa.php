namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsMahasiswa
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'mahasiswa') {
            return $next($request);
        }

        return redirect()->route('login.mahasiswa')->withErrors([
            'unauthorized' => 'Akses hanya untuk mahasiswa.',
        ]);
    }
}
