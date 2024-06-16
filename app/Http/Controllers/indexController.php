<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller {

    public function index() {

        //Obtenemos las fechas con sus precios
        $fechas = DB::select("SELECT * FROM calendario_precios ORDER BY fecha ASC;");

        //Obtenemos las fechas de disponibilidad de las habitaciones
        $reservas = DB::select("SELECT * FROM disponibilidad_habitaciones;");

        $fechasOcupadas = [];

        //Recorremos cada fecha para comprobar que dia no hay ninguna habitacion disponible y agregamos esa fecha al array fechasOcupadas
        foreach ($reservas as $registro) {
            // Verificar si la suma de dbl_twin, trp y suite es 0
            if ($registro->dbl_twin + $registro->trp + $registro->suite == 0) {
                // Formatear la fecha y agregarla al array
                $fechasOcupadas[] = date('Y-m-d', strtotime($registro->fecha));
            }
        }

        return view("indexView")
                        ->with([
                            "fechas" => $fechas,
                            "fechasOcupadas" => $fechasOcupadas
        ]);
    }
}
