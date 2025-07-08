<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
         $user = Auth::user();
             //dd($user); // Adicione isso temporariamente


    if ($user && isset($user->tipo) && strtolower($user->tipo) === 'admin') {
        return $next($request);
    }

    abort(403, 'Acesso não autorizado.');
    }
}
