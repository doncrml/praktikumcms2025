<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminParam
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('role') === 'admin') {
            return $next($request);
        }

        return response("Akses ditolak. Anda bukan admin.", 403);
    }
}
