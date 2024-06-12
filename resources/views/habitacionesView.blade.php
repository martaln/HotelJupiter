<!DOCTYPE html>
<html lang="es">

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
    </head>

    <body>

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
    </div>
    <!-- Menú -->
    <nav class="navbar navbar-expand-lg  navbar-dark  sticky-top colormenu">
        <a class="navbar-brand" href="/" id="logo">
            <img class="logo" src="/imagenes/logo/logo.svg" alt="logo">
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
                <li class="nav-item active">
                    <a class="nav-link" href="habitaciones">{{ __('Habitaciones') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="servicios">{{ __('Servicios') }}</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link reservas" href="reservas">{{ __('Reservas') }}</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
    </div>
    <!-- Cuerpo -->
    <div class="container">
        <div class="col-12">
            <div class="col-12 text-center">
                <p class="titulo">{{ __('HabitacionesMayus') }}</p>
                <hr>
                <!-- <img id="separador" src="/imagenes/separador/separador.png" style="width:11%;"> -->
                <h2 class="h2principal">{{ __('HabitacionesDescripcion1') }} <br> {{ __('HabitacionesDescripcion2') }}</h2>
                <p>{{ __('HabitacionesDescripcion3') }} <br> {{ __('HabitacionesDescripcion4') }}</p>
            </div>
            <!-- Ficha habitación doble o twin -->
            <div class="row col-12 contenedorhab">
                <!-- Carrusel -->
                <div class="carouselhab  col-6">
                    <div id="demo" class="carousel slide">
                        <div class="carousel-item active">
                            <img src="/imagenes/habitaciones/doble-twin/DBL1.jpg">
                        </div>
                        <div class="carousel-item">
                            <img src="/imagenes/habitaciones/doble-twin/TWIN2.jpg">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                    <br>
                </div>
                <!-- Ficha -->
                <div class="ficha col-6">
                    <div>
                        <h2>{{ __('HabitacionDoble') }}</h2>
                    </div>
                    <div>
                        <p>{{ __('HabitacionDobleDescripcion') }}
                            <br>
                        </p>
                    </div>
                    <div>

                        <h3>
                            {{ __('HabitacionServicios') }}
                        </h3>
                        <ul class="listaservicios">
                            <li>{{ __('Wifi') }}</li>
                            <li>{{ __('Cuna') }}</li>
                            <li>{{ __('AireAcondicionado') }}</li>
                            <li>{{ __('TV') }}</li>
                            <li>{{ __('CajaSeguridad') }}</li>
                            <li>{{ __('Equipajes') }}</li>
                            <li>{{ __('Bañera') }}</li>
                            <li>{{ __('Secador') }}</li>
                            <li>{{ __('Amenities') }}</li>
                            <li>{{ __('Escritorio') }}</li>
                            <li>{{ __('Telefono') }}</li>
                            <li>{{ __('Minibar') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Ficha habitación triple -->
            <div class="row col-12 contenedorhab">
                <!-- Ficha -->
                <div class="ficha col-6">
                    <div>
                        <h2>{{ __('HabitacionSupletoria') }}</h2>
                    </div>
                    <div>
                        <p>{{ __('HabitacionSupletoriaDescripcion') }}
                            <br>
                        </p>
                    </div>
                    <div>
                        <h3>
                            {{ __('HabitacionServicios') }}
                        </h3>
                        <ul class="listaservicios">
                            <li>{{ __('Wifi') }}</li>
                            <li>{{ __('Cuna') }}</li>
                            <li>{{ __('AireAcondicionado') }}</li>
                            <li>{{ __('TV') }}</li>
                            <li>{{ __('CajaSeguridad') }}</li>
                            <li>{{ __('Equipajes') }}</li>
                            <li>{{ __('Bañera') }}</li>
                            <li>{{ __('Secador') }}</li>
                            <li>{{ __('Amenities') }}</li>
                            <li>{{ __('Escritorio') }}</li>
                            <li>{{ __('Telefono') }}</li>
                            <li>{{ __('Minibar') }}</li>
                        </ul>
                    </div>
                </div>
                <!-- Carrusel -->
                <div class="carouselhab  col-6">
                    <div id="demo2" class="carousel slide">
                        <div class="carousel-item active">
                            <img src="/imagenes/habitaciones/triple/TRIP2.jpg">
                        </div>
                        <div class="carousel-item">
                            <img src="/imagenes/habitaciones/triple/aseo1.jpg">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo2" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo2" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                    <br>
                </div>
            </div>
            <!-- Ficha habitación suite -->
            <div class="row col-12 contenedorhab">
                <!-- Carrusel -->
                <div class="carouselhab  col-6">
                    <div id="demo3" class="carousel slide">
                        <div class="carousel-item active">
                            <img src="/imagenes/habitaciones/suite/SUITE1.jpg">
                        </div>
                        <div class="carousel-item">
                            <img src="/imagenes/habitaciones/suite/aseosuite.jpg">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo3" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo3" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                    <br>
                </div>
                <!-- Ficha -->
                <div class="ficha col-6">
                    <div>
                        <h2>{{ __('HabitacionSuite') }}</h2>
                    </div>
                    <div>
                        <p>{{ __('HabitacionSuiteDescripcion') }}
                            <br>
                        </p>
                    </div>
                    <div>
                        <h3>
                            {{ __('HabitacionServicios') }}
                        </h3>
                        <ul class="listaservicios">
                            <li>{{ __('Wifi') }}</li>
                            <li>{{ __('Cuna') }}</li>
                            <li>{{ __('AireAcondicionado') }}</li>
                            <li>{{ __('TV') }}</li>
                            <li>{{ __('CajaSeguridad') }}</li>
                            <li>{{ __('Equipajes') }}</li>
                            <li>{{ __('Bañera') }}</li>
                            <li>{{ __('Secador') }}</li>
                            <li>{{ __('Amenities') }}</li>
                            <li>{{ __('Escritorio') }}</li>
                            <li>{{ __('Telefono') }}</li>
                            <li>{{ __('Minibar') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 text-center botonres pulse ">
                <a href="reservas">{{ __('Reservar') }}</a>
            </div>

        </div>
    </div>
</body>
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

</html>