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
        <link rel="stylesheet" href="/css/hotel-datepicker.css">

    </head>

    <body>
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
                    <li class="nav-item active">
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
                    <li class="nav-item ">
                        <a class="nav-link" href="reservas">{{ __('Reservas') }}</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <!-- Carrusel -->
            <div class=" col-12 carrusel">
                <div class="carousel-caption carouselportada">
                    <h1>HOTEL JÚPITER</h1>
                    <h1 class="estrellascarrusel">****</h1>
                    <p>{{ __('ComoCasa') }}</p>
                </div>
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <div class="carousel-item active">
                        <img src="/imagenes/index/portada/habazulpano.png">
                    </div>
                    <div class="carousel-item">
                        <img src="/imagenes/index/portada/habromanticapano.jpg">
                    </div>
                    <div class="carousel-item">
                        <img src="/imagenes/index/portada/murciapano.jpg">
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
        </div>

        <!-- Cuerpo pagina principal -->
        <div class="container text-center">
            <div class="row">
                <form class="form-container" action="reservas" method="GET" >
                    <div class="justify-content-center calendario col-10 ">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <div class="form-group text-center">
                                                <label for="fechaEntrada">{{ __('FechaEntrada') }}</label>
                                                <!--Calendario-->
                                                <div class="demo__input">
                                                    <input type="text" id="calendario" placeholder="Seleccione una fecha" name="fechas" value="" aria-label="Check-in and check-out dates"
                                                           aria-describedby="demo29-input-description" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <button class="btn btn-primary btn-block mt-4"
                                                        >{{ __('Buscar') }}</button>
                                            </div>
                                        </div>
                                        <small class="text-muted">{{ __('Reserva5') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <script>
// Parseando datos de PHP a JS
let fechas = @json($fechas);
        let reservasJs = @json($reservas);
                </script>
                <script src="/js/fecha.js"></script>
                <script src="/js/hotel-datepicker.min.js"></script>
                <script src="/js/calendar.js"></script>
                <!-- Presentación hotel, página principal -->
                <div class="row col-12">
                    <div class="col-12">
                        <img id="separador" src="/imagenes/separador/separador.png" style="width:11%;">
                        <p class="titulo">{{ __('Bienvenido') }}</p>
                    </div>
                    <div class="row">
                        <div class="divcatedral col-6 ">
                            <img class="imgprincipal" src="/imagenes/index/cuerpo/catedral2.jpg">
                        </div>
                        <div class="col-6">
                            <h2 class="h2principal">Hotel Júpiter ****</h2>
                            <p class="textoprincipal1">{{ __('BienvenidoHotel') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h2 class="h2principal">{{ __('NuestrasHabitaciones') }}</h2>
                            <p class="textoprincipal2">{{ __('DescripcionHabitaciones') }}</p>
                            <a href="habitaciones" class="material-symbols-outlined flechaprincipal">
                                arrow_circle_right</a>
                        </div>
                        <div class="divcatedral col-6 ">
                            <img class="imgprincipal" src="/imagenes/index/cuerpo/habbienvenida.jpg">
                        </div>
                    </div>

                    <div class="row">
                        <div class="divcatedral col-6 ">
                            <img class="imgprincipal" src="/imagenes/index/cuerpo/desayuno1.jpg">
                        </div>
                        <div class="col-6">
                            <h2 class="h2principal">{{ __('ServiciosComplementarios') }}</h2>
                            <p class="textoprincipal1">{{ __('DescripcionServicios') }}</p>
                            <a href="servicios" class="material-symbols-outlined flechaprincipal">
                                arrow_circle_right</a>
                        </div>
                    </div>
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