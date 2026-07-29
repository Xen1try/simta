<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, $permission): Response
    {
        // Pastikan user sudah login
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // Gunakan helper hasPermission dari Model User
        if (! Auth::user()->hasPermission($permission)) {
            abort(403, 'Akses Ditolak. Anda tidak memiliki izin untuk tindakan ini.');
        }

        return $next($request);
    }
}
