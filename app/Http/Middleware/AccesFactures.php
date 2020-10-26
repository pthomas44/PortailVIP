<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccesFactures
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

        //Pour l'instant, pas utilisé
        if(auth()->user()->Acces[6] != 1)
        {
            return redirect('/interventions');
        }
        return $next($request);
    }
}
