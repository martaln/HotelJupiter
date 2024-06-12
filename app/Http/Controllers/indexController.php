<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class indexController extends Controller {

    public function index() {

        //Obtenemos las fechas con sus precios
        $fechas = DB::select("SELECT * FROM calendario_precios ORDER BY fecha ASC;");

        //Obtenemos las fecha de entrada y salida de las habitaciones
        $reservas = DB::select("SELECT check_in, check_out FROM reservas_habitaciones;");

        return view("indexView")
                        ->with([
                            "reservas" => $reservas,
                            "fechas" => $fechas
        ]);
    }
}
