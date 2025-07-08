<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class FuncionarioMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        
        $user = Auth::user();

        if ($user && isset($user->tipo) && strtolower($user->tipo) === 'funcionario') {
        return $next($request);
    }

    abort(403, 'Acesso não autorizado.');
    }
}

//if (Auth::check() && Auth::user()->tipo === 'funcionario') {
//   return $next($request);
//  }

//  abort(403, 'Acesso não autorizado.');