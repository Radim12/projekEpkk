<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */



    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        // Contoh log di middleware RedirectIfAuthenticated
        Log::info('RedirectIfAuthenticated', [
            'session_pengguna' => session('pengguna'),
            'auth_pengguna' => Auth::guard('pengguna')->check(),
        ]);

        Log::info('Session Check', [
            'pengguna_logged_in' => Auth::guard('pengguna')->check(),
            'default_logged_in' => Auth::check(),
        ]);

        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // Redirect ke dashboard berdasarkan guard
                if ($guard === 'pengguna') {
                    return redirect()->route('pengguna.dashboard');  // Pastikan ini sesuai dengan nama route untuk pengguna
                }

                return redirect()->route('user.dashboard');  // Pastikan ini sesuai dengan nama route untuk user
            }
        }

        return $next($request);
    }
}
