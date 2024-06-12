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
        <script src="/js/script.js"></script>
        <link rel="stylesheet" href="/css/estilo.css" />
        <link rel="stylesheet" href="/css/hotel-datepicker.css">

    </head>

    <body>

        <!-- barra inicial -->
        <div class="top-bar">
            <div class="containerinicio">
                <div class="contact-info">
                    <span><i class="fas fa-phone"></i><i class="material-icons iconos">phone</i> +34 123 456 789</span>
                </div>
                <div class="idiomas idiomas-icons">
                    <a href=""><i class="fas fa-envelope"></i> <i class="material-icons iconos">luggage</i>{{ __('Reserva') }}</a>
                    <i class="material-icons iconos">language</i>
                    <a href="{{ route('locale.set', 'es') }}"><i class="fab fa-facebook-f"></i>ES</a>
                    <a href="{{ route('locale.set', 'en') }}"><i class="fab fa-twitter"></i>EN</a>
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
                    <li class="nav-item ">
                        <a class="nav-link" href="habitaciones">{{ __('Habitaciones') }}</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="servicios">{{ __('Servicios') }}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link reservas" href="reservas">{{ __('Reservas') }}</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Cuerpo -->
        <div class="container text-center">
            <div class="col-12">
                <p class="titulo">{{ __('ServiciosMayus') }}</p>
                <hr>
                <h2 class="h2principal">{{ __('ServiciosDescripcion') }}</h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="col-12">
                <div class="photoser">
                    <img src="/imagenes/servicios/gym/gym1_1.jpg">
                </div>
                <div class="text-box">
                    <h2>{{ __('Gimnasio') }}</h2>
                    <p>{{ __('GimnasioDescripcion') }}</p>
                </div>
            </div>
            <div class="col-12  position-relative d-flex justify-content-end">
                <div class="photoser2">
                    <img src="/imagenes/servicios/salas_reuniones/meetingroom2_1.jpg">
                </div>
                <div class="text-box2">
                    <h2>{{ __('Salones') }}</h2>
                    <p>{{ __('SalonesDescripcion') }}</p>
                </div>
            </div>
            <div class="divser text-center">
                <div>
                    <h2 class="h2principal">{{ __('EligeMayus') }}</h2>
                    <p>
                        {{ __('EligeMayusDescripcion') }}
                    </p>
                </div>
                <div class="row">

                    <div class="col-4" id="desayuno">
                        <img class="servicios" src="/imagenes/servicios/desayuno/desayuno1.jpg">
                        <h4>{{ __('Desayuno') }}</h4>
                        <p>{{ __('DesayunoDescripcion1') }} <br>
                            {{ __('DesayunoDescripcion2') }} <br> S{{ __('DesayunoDescripcion3') }}</p>
                    </div>
                    <div class="col-4" id="parking">
                        <img class="servicios" src="/imagenes/servicios/parking.jpg">
                        <h4>{{ __('Parking') }}</h4>
                        <p>{{ __('ParkingDescripcion') }}</p>
                    </div>
                    <div class="col-4" id="romantico">
                        <img class="servicios" src="/imagenes/servicios/romantico.jpg">
                        <h4>{{ __('Romantica') }}</h4>
                        <p>{{ __('RomanticaDescripcion') }}</p>
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