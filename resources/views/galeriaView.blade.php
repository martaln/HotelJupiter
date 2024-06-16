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
                    <li class="nav-item active">
                        <a class="nav-link" href="galeria">{{ __('Galeria') }}</a>
                    </li>
                    <li class="nav-item ">
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

    <!-- Cuerpo -->
    <div class="container text-center">
        <section>
            <p class="titulo">{{ __('GALERIA') }}</p>
            <hr>
            <!-- Hotel -->
            <div class="divfoto">
                <h2 class="galeriatitulo">{{ __('HOTEL') }}</h2>
                <div class="col-12" id="hotelPhotosSection">
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalHotel">
                        <img class="imgaleria" src="/imagenes/todas/meetingroom1.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalHotel">
                        <img class="imgaleria" src="/imagenes/todas/meetingroom2.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalHotel">
                        <img class="imgaleria" src="/imagenes/todas/desayuno1.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalHotel">
                        <img class="imgaleria" src="/imagenes/todas/desayuno2.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalHotel">
                        <img class="imgaleria" src="/imagenes/todas/gym1.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalHotel">
                        <img class="imgaleria" src="/imagenes/todas/parking.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalHotel">
                        <img class="imgaleria" src="/imagenes/todas/recepcion.jpg">
                    </a>
                </div>
            </div>
            <hr>
            <!-- Habitaciones -->
            <div class="divfoto">
                <h2 class="galeriatitulo">{{ __('HabitacionesMayus') }}</h2>
                <div class="col-12" id="habitacionesPhotosSection">
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalRoom">
                        <img class="imgaleria" src="/imagenes/todas/DBL1.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalRoom">
                        <img class="imgaleria" src="/imagenes/todas/aseo1.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalRoom">
                        <img class="imgaleria" src="/imagenes/todas/SUITE1.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalRoom">
                        <img class="imgaleria" src="/imagenes/todas/aseosuite.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalRoom">
                        <img class="imgaleria" src="/imagenes/todas/habazul.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalRoom">
                        <img class="imgaleria" src="/imagenes/todas/habromantica.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalRoom">
                        <img class="imgaleria" src="/imagenes/todas/TRIP2.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalRoom">
                        <img class="imgaleria" src="/imagenes/todas/TWIN2.jpg">
                    </a>
                </div>
            </div>
            <hr>
            <!-- Murcia -->
            <div class="divfoto">
                <h2 class="galeriatitulo">{{ __('MURCIA') }}</h2>
                <div class="col-12" id="murciaPhotosSection">
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalMurcia">
                        <img class="imgaleria" src="/imagenes/todas/catedral1.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalMurcia">
                        <img class="imgaleria" src="/imagenes/todas/constitucion.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalMurcia">
                        <img class="imgaleria" src="/imagenes/todas/pasarela.jpg">
                    </a>
                    <a href="#" class="photo-link" data-toggle="modal" data-target="#photoModalMurcia">
                        <img class="imgaleria" src="/imagenes/todas/puentepeligros.jpg">
                    </a>
                </div>
            </div>
        </section>

        <!-- Carrusel para fotos del Hotel -->
        <div class="modal fade" id="photoModalHotel" tabindex="-1" role="dialog" aria-labelledby="photoModalLabelHotel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="photoModalLabelHotel">{{ __('GaleriaHotel') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="photoCarouselHotel" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="/imagenes/todas/meetingroom1.jpg"
                                        alt="Meeting Room 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/meetingroom2.jpg"
                                        alt="Meeting Room 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/desayuno1.jpg" alt="Desayuno 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/desayuno2.jpg" alt="Desayuno 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/gym1.jpg" alt="Gym 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/parking.jpg" alt="Parking">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/recepcion.jpg" alt="Recepción">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#photoCarouselHotel" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#photoCarouselHotel" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carrusel para fotos de Habitaciones -->
        <div class="modal fade" id="photoModalRoom" tabindex="-1" role="dialog" aria-labelledby="photoModalLabelRoom"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="photoModalLabelRoom">{{ __('GaleriaHabitaciones') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="photoCarouselRoom" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="/imagenes/todas/DBL1.jpg" alt="DBL1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/aseo1.jpg" alt="Aseo 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/SUITE1.jpg" alt="Suite 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/aseosuite.jpg" alt="Aseo Suite">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/habazul.jpg" alt="Hab Azul">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/habromantica.jpg"
                                        alt="Hab Romántica">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/TRIP2.jpg" alt="Trip 2">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/TWIN2.jpg" alt="Twin 2">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#photoCarouselRoom" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#photoCarouselRoom" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carrusel para fotos de Murcia -->
        <div class="modal fade" id="photoModalMurcia" tabindex="-1" role="dialog"
            aria-labelledby="photoModalLabelMurcia" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="photoModalLabelMurcia">{{ __('GaleriaMurcia') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="photoCarouselMurcia" class="carousel slide">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="/imagenes/todas/catedral1.jpg" alt="Catedral 1">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/constitucion.jpg" alt="Constitución">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/pasarela.jpg" alt="Pasarela">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="/imagenes/todas/puentepeligros.jpg"
                                        alt="Puente Peligros">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#photoCarouselMurcia" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#photoCarouselMurcia" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>
<!--Footer-->
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