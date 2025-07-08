<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class EntregadorMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {

    $user = Auth::user();

    if ($user && isset($user->tipo) && strtolower($user->tipo) === 'entregador') {
        return $next($request);
    }

    abort(403, 'Acesso não autorizado.');

    // return $next($request); // ← permite passar direto (sem bloqueio)
    
    }
}
