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
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek kalau user login
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized: silakan login terlebih dahulu.'
            ], Response::HTTP_UNAUTHORIZED);
        }

        // Cek role
        if ($user->role !== $role) {
            return response()->json([
                'message' => 'Akses ditolak: hanya ' . $role . ' yang bisa melakukan aksi ini.'
            ], Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
