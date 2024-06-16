<!DOCTYPE html>
<html lang="es" class="bodyres">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hotel Júpiter</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="/css/estilo.css" />
        <link rel="stylesheet" href="/css/hotel-datepicker.css">
        <script src="/js/fecha.js"></script>
        <script src="/js/hotel-datepicker.min.js"></script>
        <script src="/js/calendar.js"></script>
    </head>
    <div class="wrapper">

        <body class="bodyres">

            <!-- Pantalla completa  -->

            <!-- barra inicial -->
            <div class="top-bar">
                <div class="containerinicio">
                    <div class="contact-info">
                        <span><i class="fas fa-phone"></i><i class="material-icons iconos">phone</i> +34 123 456 789</span>
                    </div>
                    <div class=" idiomas idiomas-icons">
                        <a href=""><i class="fas fa-envelope"></i> <i class="material-icons iconos">luggage</i>{{ __('Reserva') }}</a>
                        <i class="material-icons iconos">language</i>
                        <a href="{{ route('locale.set', 'es') }}"><i class="fab fa-facebook-f"></i>ES</a>
                        <a href="{{ route('locale.set', 'en') }}"><i class="fab fa-twitter"></i>EN</a>
                    </div>
                </div>
            </div>

            <!-- Menú -->
            <nav class="navbar navbar-expand-lg  navbar-dark sticky-top colormenu">
                <a class="navbar-brand" href="/" id="logo">
                    <img class="logo" src="imagenes/logo/logo.svg" alt="logo">
                </a>
                <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Links -->
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item ">
                            <a class="nav-link" href="/">{{ __('Inicio') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="galeria">{{ __('Galeria') }}</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="habitaciones">{{ __('Habitaciones') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="servicios">{{ __('Servicios') }}</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link reservas" href="reservas">{{ __('Reservas') }}</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- CUERPO -->

            <!--Comprobamos si viene rellena la variable numReserva para imprimir por pantalla la confirmacion de la reserva sino mostramos el formulario-->
            <?php
            if ($numReserva > 0) {
                ?>
                <div class="centering-container">
                    <div class="text-center divconfirmada col-4" id="confirmacion">
                        <h1>{{ __('RerservaMinus') }} <span class="verde">{{ __('Confirmada') }}</span></h1>
                        <p>{{ __('NumReserva') }}  <?php echo $numReserva; ?></p>      
                    </div>
                </div>
                <?php
            } else {
                ?>
                <div class="container text-center">
                    <div class="col-12">
                        <form id="reservasForm" action="" method="GET" >
                            <!-- ELEGIR NUM HABITACION -->
                            <div class="section col-12" id="section1">
                                <!-- seleccionar fechas -->
                                <p class="titulo">{{ __('RservasMayus') }}</p>

                                <hr>

                                <div class="fechasres col-8 mx-auto">

                                    <!--// Calendario-->

                                    <div class="demo__input">
                                        <h2 class="h2principal">{{ __('SelecFecha') }}</h2>
                                        <div class="divrescalendario">
                                            <input type="text" id="calendario" placeholder="{{ __('SeleccionFecha') }}" name="check_in_out" value="{{ $fechas }}" aria-label="Check-in and check-out dates" aria-describedby="demo29-input-description" required/>
                                            <small class="text-muted">{{ __('Reserva5') }}</small>
                                        </div>
                                    </div>
                                    <script>
    // Parseando datos de PHP a JS
    let fechas = @json($fechasCalendario) != null ? @json($fechasCalendario) : "";
        let habitaciones = @json($habitaciones) != null ? @json($habitaciones) : "";
        let fechasOcupadas = @json($fechasOcupadas);
        let precioDesayuno = @json($precioDesayuno);
        let precioParking = @json($precioParking);
        let precioRomantico = @json($precioRomantico);
        let disponibilidadHabitaciones = @json($disponibilidadHabitaciones);
    //Añadimos las traducciones de PHP a JS
    window.translations = {
    Habitacion: @json(__('Habitacion')),
        Numpax: @json(__('Numpax')),
        AñadirHabitacion: @json(__('AñadirHabitacion')),
        Numpax: @json(__('Numpax')),
        Eliminar: @json(__('Eliminar')),
        HabitacionDoble: @json(__('HabitacionDoble')),
        Precio: @json(__('Precio')),
        TotalEstancia: @json(__('TotalEstancia')),
        HabitacionSupletoria: @json(__('HabitacionSupletoria')),
        Elegir: @json(__('Elegir')),
        Estancia: @json(__('Estancia')),
        ServicioHabi: @json(__('ServicioHabi')),
        Desayuno: @json(__('Desayuno')),
        DesayunoPrecio: @json(__('DesayunoPrecio')),
        TotalEstancia: @json(__('TotalEstancia')),
        Parking: @json(__('Parking')),
        ParkingPrecio: @json(__('ParkingPrecio')),
        Romantica: @json(__('Romantica')),
        Paquete: @json(__('Paquete')),
        AlertaFecha: @json(__('AlertaFecha')),
        AlertaHab: @json(__('AlertaHab')),
        Habitacion: @json(__('Habitacion')),
        Tipo: @json(__('Tipo')),
        Personas: @json(__('Personas')),
        PrecioHab: @json(__('PrecioHab')),
        Servicios: @json(__('Servicios')),
        ServiciosPre: @json(__('ServiciosPre')),
        CalendarSelected: @json(__('CalendarSelected')),
        CalendarNight: @json(__('CalendarNight')),
        CalendarNights: @json(__('CalendarNights')),
        CalendarButton: @json(__('CalendarButton')),
        CalendarClearButton: @json(__('CalendarClearButton')),
        CalendarSubmitButton: @json(__('CalendarSubmitButton')),
        CalendarCheckinDisabled: @json(__('CalendarCheckinDisabled')),
        CalendarCheckoutDisabled: @json(__('CalendarCheckoutDisabled')),
        CalendarDayNamesShort: @json(__('CalendarDayNamesShort')),
        CalendarDayNames: @json(__('CalendarDayNames')),
        CalendarMonthNamesShort: @json(__('CalendarMonthNamesShort')),
        CalendarMonthNames: @json(__('CalendarMonthNames')),
        CalendarErrorMore: @json(__('CalendarErrorMore')),
        CalendarErrorMorePlural: @json(__('CalendarErrorMorePlural')),
        CalendarErrorLess: @json(__('CalendarErrorLess')),
        CalendarErrorLessPlural: @json(__('CalendarErrorLessPlural')),
        CalendarInfoMore: @json(__('CalendarInfoMore')),
        CalendarInfoMorePlural: @json(__('CalendarInfoMorePlural')),
        CalendarInfoRange: @json(__('CalendarInfoRange')),
        CalendarInfoRangeEqual: @json(__('CalendarInfoRangeEqual')),
        CalendarInfoDefault: @json(__('CalendarInfoDefault')),
        CalendarAriaApplication: @json(__('CalendarAriaApplication')),
        CalendarAriaSelectedCheckin: @json(__('CalendarAriaSelectedCheckin')),
        CalendarAriaSelectedCheckout: @json(__('CalendarAriaSelectedCheckout')),
        CalendarAriaSelected: @json(__('CalendarAriaSelected')),
        CalendarAriaDisabled: @json(__('CalendarAriaDisabled')),
        CalendarAriaChooseCheckin: @json(__('CalendarAriaChooseCheckin')),
        CalendarAriaChooseCheckout: @json(__('CalendarAriaChooseCheckout')),
        CalendarAriaPrevMonth: @json(__('CalendarAriaPrevMonth')),
        CalendarAriaNextMonth: @json(__('CalendarAriaNextMonth')),
        CalendarAriaCloseButton: @json(__('CalendarAriaCloseButton')),
        CalendarAriaClearButton: @json(__('CalendarAriaClearButton')),
        CalendarAriaSubmitButton: @json(__('CalendarAriaSubmitButton')),
    }
    ;
                                    </script>
                                    <div id="habitacionesContainer">
                                        <div class="habitacion" data-habitacion="1">
                                            <h2  class="h2principal">{{ __('Habitacion') }} 1</h2>
                                            <div class="form-group mx-auto col-2 row">
                                                <label for="habitaciones1">{{ __('Numpax') }}</label>
                                                <select class="form-control" name="habitaciones1" id="habitaciones1">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 text-center botonres pulse ">
                                        <a href="#" id="addRoomButton">{{ __('AñadirHabitacion') }} +</a>
                                    </div>
                                    <div class="col-12 text-center botonres pulse">

                                        <button class="btn btn-primary show-section" data-target="#section2">{{ __('Siguiente') }}
                                            <img src="/imagenes/iconosreservas/flechablanca.svg">
                                        </button>

                                    </div>
                                </div>
                                <div class=" divfinrescalendario col-8 mx-auto">
                                    <p class="linea-con-texto">{{ __('MejoresOfertas') }} </p>
                                    <div class="d-flex flex-row">
                                        <div class="iconosreserva col-4">                                      
                                            <img class=""src="/imagenes/iconosreservas/mejorprecio.svg">
                                            <p class="">{{ __('MejorPrecio') }}</p>
                                        </div>
                                        <div class="iconosreserva col-4">                                      
                                            <img class=""src="/imagenes/iconosreservas/wifi.svg">
                                            <p class="">{{ __('WifiGratis') }}</p>
                                        </div>
                                        <div class="iconosreserva col-4">                                      
                                            <img class=""src="/imagenes/iconosreservas/confirmacion.svg">
                                            <p class="">{{ __('ConfInmediata') }}</p>
                                        </div>
                                    </div>
                                    <div class="lineafinal"></div>
                                </div>
                            </div>

                            <!-- ELEGIR HABITACION -->
                            <div class="col-12 section" id="section2" style="display: none;">
                                <div id="subSection2">
                                    <div>
                                        <h2 class="habelegir">{{ __('Habitacion') }} 1</h2>
                                    </div>
                                    <!-- ficha habitación double /twin -->
                                    <div class="habres row col-12" id="habitacionDobleContainer1">
                                        <!-- carruselhab -->
                                        <div class="carouselhabres col-4">
                                            <div id="habitacionDoble1" class="carousel slide">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="imagenes/habitaciones/doble-twin/DBL1.jpg"
                                                             class="d-block w-100">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="imagenes/habitaciones/doble-twin/TWIN2.jpg"
                                                             class="d-block w-100">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#habitacionDoble1" role="button"
                                                   data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#habitacionDoble1" role="button"
                                                   data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div></div>
                                            <div class="habnombre">
                                                <p>{{ __('HabitacionDoble') }}</p>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 ">
                                                    <p class="centrarres" id="precio">{{ __('Precio') }}</p>
                                                </div>
                                                <div class="col-4 ">
                                                    <p class="centrarres precioServicioHabitacion precioHabitacionDoble" id="precio">50€ </p>
                                                    <p id="total">*{{ __('TotalEstancia') }}</p>
                                                </div>
                                                <div class="col-4">
                                                    <input type="radio" class="elegirhab" name="elegirhab1" value="1">
                                                    <input type="hidden" class="precioHabitacionDobleHidden" id="precioHabitacionDobleHidden" name="precioHabitacionDobleHidden1" value="">
                                                    <label for="elegirhab1">{{ __('Elegir') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ficha habitación double /twin Agotada-->

                                    <div class="habres row col-12" id="habitacionDobleContainerAgotada1" style="display: none;">
                                        <!-- carruselhab -->
                                        <div class="carouselhabres col-4">
                                            <div id="habitacionDoble1" class="carousel slide">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="imagenes/habitaciones/doble-twin/DBL1.jpg"
                                                             class="d-block w-100">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="imagenes/habitaciones/doble-twin/TWIN2.jpg"
                                                             class="d-block w-100">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#habitacionDoble1" role="button"
                                                   data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#habitacionDoble1" role="button"
                                                   data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div></div>
                                            <div class="habnombre">
                                                <p>{{ __('HabitacionDoble') }}</p>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <p class="centrarres agotada" id="habitacionDobleAgotada1">Agotada</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- ficha habitación triple -->
                                    <div class="habres row col-12" id="habitacionSupletoriaContainer1" style="display: none;">
                                        <!-- carruselhab -->
                                        <div class="carouselhabres col-4">
                                            <div id="habitacionSupletoria1" class="carousel slide">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="imagenes/habitaciones/triple/TRIP2.jpg" class="d-block w-100">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="imagenes/habitaciones/triple/aseo1.jpg" class="d-block w-100">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#habitacionSupletoria1" role="button"
                                                   data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#habitacionSupletoria1" role="button"
                                                   data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div></div>
                                            <div class="habnombre">
                                                <p>{{ __('HabitacionSupletoria') }} </p>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 ">
                                                    <p class="centrarres" id="precio">{{ __('Precio') }}</p>
                                                </div>
                                                <div class="col-4 ">
                                                    <p class="centrarres precioServicioHabitacion precioHabitacionTriple" id="precio">50€ </p>
                                                    <p id="total">*{{ __('TotalEstancia') }}</p>
                                                </div>
                                                <div class="col-4">
                                                    <input type="radio" class="elegirhab" name="elegirhab1" value="2">
                                                    <input type="hidden" class="precioHabitacionTripleHidden" id="precioHabitacionTripleHidden" name="precioHabitacionTripleHidden1" value="">
                                                    <label for="elegirhab1">{{ __('Elegir') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ficha habitación triple Agotada-->
                                    <div class="habres row col-12" id="habitacionSupletoriaContainerAgotada1" style="display: none;">
                                        <!-- carruselhab -->
                                        <div class="carouselhabres col-4">
                                            <div id="habitacionSupletoria1" class="carousel slide">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="imagenes/habitaciones/triple/TRIP2.jpg" class="d-block w-100">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="imagenes/habitaciones/triple/aseo1.jpg" class="d-block w-100">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#habitacionSupletoria1" role="button"
                                                   data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#habitacionSupletoria1" role="button"
                                                   data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div></div>
                                            <div class="habnombre">
                                                <p>{{ __('HabitacionSupletoria') }} </p>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <p class="centrarres agotada" id="habitacionSupletoriaAgotada1">Agotada</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ficha habitación suite -->
                                    <div class="habres row col-12" id="habitacionSuiteContainer1">
                                        <!-- carruselhab -->
                                        <div class="carouselhabres col-4">
                                            <div id="habitacionSuite1" class="carousel slide">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="imagenes/habitaciones/suite/SUITE1.jpg" class="d-block w-100">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="imagenes/habitaciones/suite/aseosuite.jpg"
                                                             class="d-block w-100">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#habitacionSuite1" role="button"
                                                   data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#habitacionSuite1" role="button"
                                                   data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div></div>
                                            <div class="habnombre">
                                                <p>Suite</p>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 ">
                                                    <p class="centrarres" id="precio">{{ __('Precio') }}</p>
                                                </div>
                                                <div class="col-4 ">
                                                    <p class="centrarres precioServicioHabitacion precioHabitacionSuite" id="precio">50€ </p>
                                                    <p id="total">*{{ __('TotalEstancia') }}</p>
                                                </div>
                                                <div class="col-4">
                                                    <input type="radio" class="elegirhab" name="elegirhab1" value="3">
                                                    <input type="hidden" class="precioHabitacionSuiteHidden" id="precioHabitacionSuiteHidden" name="precioHabitacionSuiteHidden1" value="">
                                                    <label for="elegirhab">{{ __('Elegir') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ficha habitación suite Agotada-->
                                    <div class="habres row col-12" id="habitacionSuiteContainerAgotada1" style="display: none;">
                                        <!-- carruselhab -->
                                        <div class="carouselhabres col-4">
                                            <div id="habitacionSuite1" class="carousel slide">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="imagenes/habitaciones/suite/SUITE1.jpg" class="d-block w-100">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="imagenes/habitaciones/suite/aseosuite.jpg"
                                                             class="d-block w-100">
                                                    </div>
                                                </div>
                                                <a class="carousel-control-prev" href="#habitacionSuite1" role="button"
                                                   data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#habitacionSuite1" role="button"
                                                   data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div></div>
                                            <div class="habnombre">
                                                <p>Suite</p>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 ">
                                                    <p class="centrarres agotada" id="habitacionSuiteAgotada1">Agotada</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center botonres pulse">
                                    <button class="btn btn-primary show-section" data-target="#section3">{{ __('Siguiente') }}
                                        <img src="/imagenes/iconosreservas/flechablanca.svg"></button>

                                </div>
                            </div>

                            <!-- ELEGIR SUPLEMENTOS -->
                            <div class="col-12 section" id="section3" style="display: none;">
                                <div id="subSection3">

                                    <div>
                                        <h2 class="habelegir">{{ __('Estancia') }}</h2>
                                    </div>
                                    <div>
                                        <h3>{{ __('ServicioHabi') }} 1</h3>
                                    </div>
                                    <!-- ficha desayuno -->
                                    <div class="habres servicios row col-12">
                                        <div class=" col-4">
                                            <img src="imagenes/servicios/desayuno/desayuno1.jpg">
                                        </div>
                                        <div class="col-8">
                                            <div></div>
                                            <div class="habnombre">
                                                <p>{{ __('Desayuno') }}</p>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 ">
                                                    <p class="centrarres" id="precio">{{ $precioDesayuno }}{{ __('DesayunoPrecio') }}</p>
                                                </div>

                                                <!-- Mostrar el precio total en la vista -->
                                                <div class="col-4">
                                                    <p class="centrarres precioServicioHabitacion precioDesayuno" id="precioDesayuno" data-precio="{{ $precioDesayuno }}">{{ $precioDesayuno }}€</p>
                                                    <p id="total">*{{ __('TotalEstancia') }}</p>
                                                </div>

                                                <div class="col-4">
                                                    <input type="checkbox" class="elegirhab" name="desayuno1" value="3">
                                                    <input type="hidden" class="precioDesayunoHidden" id="precioDesayunoHidden" name="precioDesayunoHidden1" value="{{ $precioDesayuno }}">
                                                    <label for="elegirhab1">{{ __('Elegir') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ficha parking -->
                                    <div class="habres servicios row col-12">
                                        <div class="col-4">
                                            <img src="imagenes/servicios/parking.jpg">
                                        </div>
                                        <div class="col-8">
                                            <div></div>
                                            <div class="habnombre">
                                                <p> {{ __('Parking') }}</p>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 ">
                                                    <p class="centrarres" id="precio">{{ $precioParking }}{{ __('ParkingPrecio') }}</p>
                                                </div>
                                                <div class="col-4 ">
                                                    <p class="centrarres precioServicioHabitacion precioParking" id="precioParking" data-precio-parking="{{ $precioParking }}">{{ $precioParking }}€</p>
                                                    <p id="total">*{{ __('TotalEstancia') }}</p>
                                                </div>
                                                <div class="col-4">
                                                    <input type="checkbox" class="elegirhab" name="parking1" value="1">
                                                    <input type="hidden" class="precioParkingHidden" id="precioParkingHidden" name="precioParkingHidden" value="{{ $precioParking }}">
                                                    <label for="elegirhab1">{{ __('Elegir') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ficha romantico -->
                                    <div class="habres servicios row col-12">
                                        <div class=" col-4">
                                            <img src="imagenes/servicios/romantico.jpg">
                                        </div>
                                        <div class="col-8">
                                            <div></div>
                                            <div class="habnombre">
                                                <p>{{ __('Romantica') }}</p>
                                                <hr>
                                            </div>
                                            <div class="row">
                                                <div class="col-4 ">
                                                    <p class="centrarres" id="precio">{{ $precioRomantico }}{{ __('Paquete') }}</p>
                                                </div>
                                                <div class="col-4 ">
                                                    <p class="centrarres precioServicioHabitacion" id="precioRomantico">{{ $precioRomantico }}€</p>
                                                    <p id="total">*{{ __('TotalEstancia') }}</p>
                                                </div>
                                                <div class="col-4">
                                                    <input type="checkbox" class="elegirhab" name="romantica1" value="2">
                                                    <input type="hidden" id="precioRomantico" name="precioRomanticoHidden" value="{{ $precioRomantico }}">
                                                    <label for="elegirhab1">{{ __('Elegir') }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center botonres pulse">
                                    <!--<button class="show-section" data-target="#section4">{{ __('Siguiente') }}</button>-->
                                    <button class="btn btn-primary show-section" data-target="#section4">{{ __('Siguiente') }}
                                        <img src="/imagenes/iconosreservas/flechablanca.svg"></button>

                                </div>
                            </div>
                            <!-- DATOS PERSONALES -->
                            <div class="col-12 section" id="section4" style="display: none;">
                                <div id="formulario"class=" text-center col-12">
                                    <h3>{{ __('DatosReserva') }}</h3>
                                    <div id="formulario1" class="row formulario-group">
                                        <label class="col-6">{{ __('Nombre') }}: <br><input type="text" id="nombre" name="nombre" required  autocomplete="off"/>                                         
                                        </label>
                                        <label class="col-6">{{ __('Apellidos') }}: <br><input type="text" id="apellidos" name="apellidos" required  autocomplete="off"/>
                                        </label>
                                    </div>
                                    <div id="formulario2" class="row formulario-group">
                                        <label class="col-6">{{ __('Correo') }}: <br><input type="text" id="correo" name="correo" required autocomplete="off" />
                                        </label>
                                        <label class="col-6">{{ __('Telefono') }}: <br><input type="text" id="telefono" name="telefono" required autocomplete="off"/>
                                        </label>
                                    </div>
                                </div>
                                <!--Resumen reserva-->
                                <div id="resumenReservaContainer" class=" text-center col-12">
                                    <div class="col-8">
                                        <div id="fechasResumen" class="horizontal">
                                            <div class="">
                                                <h4>{{ __('CheckIn') }}</h4>
                                                <p id="fechaEntrada">11-07-2024</p>
                                            </div>
                                            <div>
                                                <h4>{{ __('CheckOut') }}</h4>
                                                <p id="fechaSalida">12-07-2024</p>
                                            </div>
                                        </div>                                          
                                        <div id="resumenHabitaciones">                                      
                                            <!-- Resumen de habitaciones será insertado aquí -->
                                        </div>
                                    </div>
                                    <div id="resumenTotal" class="col-4">
                                        <h3>{{ __('TotalEstancia') }}</h3>
                                        <p id="totalReserva">0€</p>
                                    </div>
                                </div>
                                <div class="text-center mx-auto">
                                    <button class="botonresf pulse" type="submit">{{ __('ConfirmarReserva') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </body>
        </div>

        <script src="/js/script.js"></script>

        <?php
    }
    ?>
    <footer>
        <div class="container">
            <div class="footer-logo col-5">
                <img class="tamanologofooter" src="/imagenes/logo/logo.svg">
            </div>
            <div class="footer-contact col-4">
                <h3>{{ __('Contactanos') }}</h3>
                <ul>
                    <li>{{ __('Telefono') }}: +34 123 456 789</li>
                    <li>{{ __('Correo') }}: hoteljupiter@hoteljupiter.com</li>
                    <li>{{ __('Direccion') }}: Calle Mar Menor, 5, 30010, Murcia, España</li>
                </ul>
            </div>
            <div class="footer-dont-miss col-4">
                <h3>{{ __('NoTePierdas') }}</h3>
                <ul>
                    <li><a href="habitaciones">{{ __('Habitaciones') }}</a></li>
                    <li><a href="galeria">{{ __('Galeria') }}</a></li>
                    <li><a href="reservas">{{ __('Reservas') }}</a></li>
                    <li><a href="legal">{{ __('Legal') }}</a></li>
                    <img class="cc" src="/imagenes/by-sa.svg">

                </ul>
            </div>
        </div>
    </footer>
</div>

</html>