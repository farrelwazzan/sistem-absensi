<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $userRoles = auth()->user()->roles;

        // pastikan roles berupa array
        if (!is_array($userRoles)) {
            $userRoles = json_decode($userRoles, true);
        }

        // cek apakah salah satu role cocok
        if (!array_intersect($roles, $userRoles)) {
            abort(403, 'AKSES DITOLAK');
        }

        return $next($request);
    }
}
