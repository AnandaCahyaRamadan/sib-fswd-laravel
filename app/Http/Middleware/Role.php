<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        
        // Memeriksa apakah pengguna memiliki salah satu peran yang diizinkan
        if ($user && in_array($user->roles->role_name, $roles)) {
            return $next($request);
        }
        abort(403, 'Unauthorized');
    }
}
