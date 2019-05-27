<?php

namespace App\Http\Middleware;

use Closure;

class ProjectsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        
        if($user->nick != 'admin'){
            return redirect()->route('projects.index')
                        ->with(['error' => 'No tiene permisos para entrar a esa ruta.']);
        }
        return $next($request);
    }
}
