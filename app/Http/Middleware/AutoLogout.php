<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AutoLogout
{
    public function handle($request, Closure $next)
    {
        $maxInactiveInterval = 1800; // Establece el tiempo máximo de inactividad en segundos

        if (Auth::check()) {
            $user = Auth::user();
            $lastActivity = session('lastActivity');
            $currentTime = time();

            if ($lastActivity && ($currentTime - $lastActivity > $maxInactiveInterval)) {
                Auth::logout(); // Cerrar sesión si el usuario ha estado inactivo más tiempo del permitido
                session()->forget('lastActivity');
                
                return redirect()->route('login')->withErrors('Su sesión ha expirado por inactividad.');
                

            }

            session(['lastActivity' => $currentTime]);
        }

        return $next($request);
    }
}
