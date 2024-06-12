<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reservasController extends Controller {

    public function index(Request $request) {

        $datos = $request->all();

        // Obtenemos la informacion necesaria respecto a cada servicio
        $precioParkingResults = DB::select("SELECT ser_precio FROM `servicios` WHERE ser_id = 1");
        $precioRomanticoResults = DB::select("SELECT ser_precio FROM `servicios` WHERE ser_id = 2");
        $precioDesayunoResults = DB::select("SELECT ser_precio FROM `servicios` WHERE ser_id = 3");

        // Obtenemos el precio necesario de cada servicio
        $precioParking = count($precioParkingResults) > 0 ? $precioParkingResults[0]->ser_precio : null;
        $precioRomantico = count($precioRomanticoResults) > 0 ? $precioRomanticoResults[0]->ser_precio : null;
        $precioDesayuno = count($precioDesayunoResults) > 0 ? $precioDesayunoResults[0]->ser_precio : null;

        //Obtenemos las fechas con sus precios
        $fechasCalendario = DB::select("SELECT * FROM calendario_precios ORDER BY fecha ASC;");

        //Obtenemos la informacion de todas las habitaciones
        $habitaciones = DB::select("SELECT * FROM habitaciones;");

        //Obtenemos las fecha de entrada y salida de las reservas
        $reservas = DB::select("SELECT check_in, check_out FROM reservas_habitaciones;");

        
        $fechas = "";
        //Comprobamos si hemos rellenado la fecha en el index
        if (isset($datos['fechas'])) {
            $fechas = $datos['fechas'];
        }
        
        $numReserva = 0;

        //Comprobamos si nos viene relleno todo el formulario del usuario
        if (isset($datos['nombre']) && isset($datos['apellidos']) && isset($datos['correo']) && isset($datos['telefono'])) {
            //Comprobamos si el cliente ya existe en la BBDD para no volver a introducir los datos repetidos
            $cliente = DB::select("SELECT * FROM clientes WHERE cli_nombre = '" . $datos['nombre'] . "' "
                            . "AND cli_apellidos = '" . $datos['apellidos'] . "' AND correo = '" . $datos['correo'] . "' AND telefono = '" . $datos['telefono'] . "'");
            //Si el cliente no existe lo añadimos a la BBDD
            if (!isset($cliente[0])) {
                //Inserto el cliente en la BBDD
                DB::statement("INSERT INTO `clientes`(`cli_nombre`, `cli_apellidos`, `correo`, `telefono`) VALUES "
                        . "('" . $datos['nombre'] . "','" . $datos['apellidos'] . "','" . $datos['correo'] . "','" . $datos['telefono'] . "')");

                //Obtenemos el ID del cliente añadido en BBDD
                $clienteId = DB::getPdo()->lastInsertId();
            } else {
                //Obtenemos el Id del cliente
                $clienteId = $cliente[0]->cli_id;
            }


            //Inserto la reserva de habitaciones

            //Dividimos la fecha en dos
            $fechaCalendario = $datos['check_in_out'];
            // Reemplazamos '+-+' por una coma para facilitar la separación
            $fechaCalendario = str_replace(' - ', ',', $fechaCalendario);

            // Dividimos el string en dos partes usando explode y verificamos que tengamos dos elementos
            $fechasSeparadas = explode(',', $fechaCalendario);

            if (count($fechasSeparadas) === 2) {
                $fechaEntrada = date('Y-m-d', strtotime($fechasSeparadas[0]));
                $fechaSalida = date('Y-m-d', strtotime($fechasSeparadas[1]));
            }

            //Obtenemos el ultimo numero de reserva
            $numReserva = DB::select("SELECT COALESCE(MAX(rh_num), 0) as max_rh_num FROM reservas_habitaciones");
            $numReserva = $numReserva[0]->max_rh_num + 1;

            //Guardamos las reservas
            for ($i = 1; $i < 5; $i++) {
                //Comprobamos si existe la habitacion1, 2 etc
                if (isset($datos['habitaciones' . $i])) {

                    $precioDesayuno = 0;
                    $precioParking = 0;
                    $precioRomantico = 0;
                    
                    //Comprobamos si hemos seleccionado algun servicio y recuperamos el precio del servicio
                    if (isset($datos['desayuno' . $i])) {
                        $precioDesayuno += $datos['precioDesayunoHidden' . $i];
                    }
                    if (isset($datos['parking' . $i])) {
                        $precioParking = $datos['precioParkingHidden'];
                    }
                    if (isset($datos['romantica' . $i])) {
                        $precioRomantico = $datos['precioRomanticoHidden'];
                    }

                    //Sumamos el precio de todos los servicios
                    $precioTotal = $precioDesayuno + $precioParking + $precioRomantico;

                    //Comprobamos la habitacion seleccionada y obtenemos su precio
                    if ($datos['elegirhab' . $i] == 1) {
                        $precioTotal += $datos['precioHabitacionDobleHidden' . $i];
                    } else if ($datos['elegirhab' . $i] == 2) {
                        $precioTotal += $datos['precioHabitacionTripleHidden' . $i];
                    } else {
                        $precioTotal += $datos['precioHabitacionSuiteHidden' . $i];
                    }

                    //Guardamos la reserva
                    DB::statement("INSERT INTO `reservas_habitaciones`(`hab_id`, `check_in`, `check_out`, `cli_id`, `num_personas`, `rh_precio`, `rh_fecha`, `rh_num`) "
                            . "VALUES (" . $datos['elegirhab' . $i] . ",'" . $fechaEntrada . "','" . $fechaSalida . "','" . $clienteId . "','" . $datos['habitaciones' . $i] .
                            "'," . $precioTotal . ",NOW()," . $numReserva . ")");

                    //Obtenemos el ID de la reserva
                    $reservaId = DB::getPdo()->lastInsertId();

                    //Inserto los servicios reservados en caso de que los haya
                    if (isset($datos['desayuno' . $i])) {
                        DB::statement("INSERT INTO `reservas_servicios`(`ser_id`, `rh_id`) VALUES (" . $datos['desayuno' . $i] . "," . $reservaId . ")");
                    }
                    if (isset($datos['parking' . $i])) {
                        DB::statement("INSERT INTO `reservas_servicios`(`ser_id`, `rh_id`) VALUES (" . $datos['parking' . $i] . "," . $reservaId . ")");
                    }
                    if (isset($datos['romantica' . $i])) {
                        DB::statement("INSERT INTO `reservas_servicios`(`ser_id`, `rh_id`) VALUES (" . $datos['romantica' . $i] . "," . $reservaId . ")");
                    }
                }
            }
        }

        return view("reservasView")
                        ->with([
                            "reservas" => $reservas,
                            "fechasCalendario" => $fechasCalendario,
                            "habitaciones" => $habitaciones,
                            "fechas" => $fechas,
                            "precioParking" => $precioParking,
                            "precioRomantico" => $precioRomantico,
                            "precioDesayuno" => $precioDesayuno,
                            "numReserva" => $numReserva
        ]);
    }
}
