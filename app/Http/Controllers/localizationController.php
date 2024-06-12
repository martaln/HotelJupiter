<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

class localizationController extends Controller {

    //Metodo para almacenar el idioma seleccionado
    public function setLocale($locale) {
        // Establecer el idioma seleccionado en la sesión
        Session::put('locale', $locale);

        // Redirigir de vuelta a la página anterior
        return redirect()->back();
    }
}
