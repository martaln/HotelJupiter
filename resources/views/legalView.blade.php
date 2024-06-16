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
                    {{ __('Prueba') }}
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
        <!--Cuerpo--> 
        <div class="container ">
            <div class="row">
                <div class=" text-center col-12">
                    <p class="titulo">{{ __('Legal') }}</p>
                    <hr>
                </div>
                <div>
                    <div id="deed-body">
                        <div class="divlicencia">
                            <h1 class="" id="rights">
                                {{ __('Licencia') }}
                            </h1>
                            <img src="/imagenes/by-sa.svg">
                        </div>
                        <br>
                        <h2 class="" id="rights">
                            {{ __('Libre') }}
                        </h2>
                        <ol>
                            <li>
                                <strong>
                                   {{ __('Compartir') }}
                                </strong>
                                — {{ __('Copiar') }}
                            </li>
                            <li>
                                <strong>
                                    {{ __('Adaptar') }}
                                </strong>
                                — {{ __('Remezclar') }}
                            </li>
                            <li>
                                {{ __('Nolibertades') }}
                            </li>
                        </ol>
                        <h2 id="terms">
                           {{ __('Terminos') }}
                        </h2>
                        <ol>
                            <li class="cc-by">
                                <strong>
                                   {{ __('Atribución') }}
                                </strong>
                                —
                               {{ __('Credito') }}
                            </li>
                            <li>
                                <strong>
                                   {{ __('Restricciones') }}
                                </strong>
                                — {{ __('NoPuede') }}
                            </li>
                        </ol>
                        <h2 class="" style="font-weight: bold;">
                            {{ __('Avisos') }}
                        </h2>
                        <p>
                            {{ __('NoTiene') }}
                        </p>
                        <p>
                            {{ __('NoSeDan') }}
                        </p>
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