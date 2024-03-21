<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\TaskController;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est authentifié et s'il a le rôle d'administrateur
        if ($request->user() && $request->user()->role === 'admin') {
            return $next($request);
        }

        // Redirige l'utilisateur s'il n'est pas autorisé
        return redirect()->back();
   }
}
