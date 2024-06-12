<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        //Comprueba si existe una sesion "locale"
        if (Session::has('locale')) {
            $locale = Session::get('locale');
        } else {
            // Si no usar el idioma predeterminado de la aplicación
            $locale = config('app.locale');
        }

        // Establece el idioma de la aplicación
        App::setLocale($locale);
        
        return $next($request);
    }
}
