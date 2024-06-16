document.addEventListener('DOMContentLoaded', function () {

    // Asignar el índice correcto al carrusel del Hotel
    $('#hotelPhotosSection a').on('click', function () {
        var index = $(this).index();
        $('#photoCarouselHotel').carousel(index);
    });

    // Asignar el índice correcto al carrusel de Habitaciones
    $('#habitacionesPhotosSection a').on('click', function () {
        var index = $(this).index();
        $('#photoCarouselRoom').carousel(index);
    });

    // Asignar el índice correcto al carrusel de Murcia
    $('#murciaPhotosSection a').on('click', function () {
        var index = $(this).index();
        $('#photoCarouselMurcia').carousel(index);
    });

    // Iniciar los modales con el índice correcto
    $('#photoModalHotel').on('shown.bs.modal', function (e) {
        var index = $(e.relatedTarget).index();
        $('#photoCarouselHotel').carousel(index);
    });

    $('#photoModalRoom').on('shown.bs.modal', function (e) {
        var index = $(e.relatedTarget).index();
        $('#photoCarouselRoom').carousel(index);
    });

    $('#photoModalMurcia').on('shown.bs.modal', function (e) {
        var index = $(e.relatedTarget).index();
        $('#photoCarouselMurcia').carousel(index);
    });

    // Desactivar el cambio automático en los carruseles
    $('#photoCarouselHotel').carousel({
        interval: false
    });

    $('#photoCarouselRoom').carousel({
        interval: false
    });

    $('#photoCarouselMurcia').carousel({
        interval: false
    });

    $('#habitacionDoble').carousel({
        interval: false
    });

    $('#habitacionSupletoria').carousel({
        interval: false
    });

    $('#habitacionSuite').carousel({
        interval: false
    });

    /*Reservas*/
    const botonAñadirHabitacion = document.getElementById("addRoomButton");
    const habitacionesContainer = document.getElementById("habitacionesContainer");
    const habitacionesDetailsContainer = document.getElementById("subSection2");
    const serviciosContainer = document.getElementById("subSection3");

    let numHabitacion = 1;

    // Actualizar visibilidad de las habitaciones y el número total de personas
    habitacionesContainer.querySelector('select').addEventListener('change', function () {
        actualizarMostrarHabitacion(numHabitacion, this.value);
        calcularYActualizarNumeroTotalPersonas();
    });

    // Agregar el listado de personas para una nueva habitación
    botonAñadirHabitacion.addEventListener("click", function (event) {
        event.preventDefault();
        if (numHabitacion < 5) {
            numHabitacion++;
            const nuevaHabitacion = document.createElement("div");
            nuevaHabitacion.className = "habitacion";
            nuevaHabitacion.setAttribute("data-habitacion", numHabitacion);
            nuevaHabitacion.innerHTML = `
                <h2 class="h2principal"> ${window.translations.Habitacion}  ${numHabitacion} </h2>
                <div class="form-group mx-auto col-2">
                    <label for="habitaciones${numHabitacion}">${window.translations.Numpax}</label>
                    <select class="form-control" name="habitaciones${numHabitacion}" id="habitaciones${numHabitacion}">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="col-12 text-center botonres pulse">
                    <button type="button" class="removeRoomButton">${window.translations.Eliminar}</button>
                </div>
            `;
            habitacionesContainer.appendChild(nuevaHabitacion);

            const nuevoDetalleHabitacion = crearDetalleHabitacion(numHabitacion);
            habitacionesDetailsContainer.appendChild(nuevoDetalleHabitacion);

            const nuevosServicios = crearNuevosServicios(numHabitacion);
            serviciosContainer.appendChild(nuevosServicios);

            /*Desabilitar botón "añadir habitación"*/
            if (numHabitacion === 5) {
                botonAñadirHabitacion.style.display = "none";
            }

            //Cuando pulsamos el boton eliminar habitacion, actualizamos los tipos de habitaciones 
            //que se van a mostrar y el numero de personas que tenemos seleccionadas
            nuevaHabitacion.querySelector('.removeRoomButton').addEventListener('click', function () {
                nuevaHabitacion.remove();
                document.getElementById(`roomDetails${numHabitacion}`).remove();
                document.getElementById(`serviceDetails${numHabitacion}`).remove();
                numHabitacion--;
                if (numHabitacion < 5) {
                    botonAñadirHabitacion.style.display = "inline-block";
                }
                actualizarNumHabitacion();
            });

            calcularYActualizarNumeroTotalPersonas();

            //Al elegir el numeor de personas por habitacion actualizamos el numero de perosnas en
            // total que tenemose seleccionadas y actualizamos el tipo de habitacion que se muestra
            nuevaHabitacion.querySelector('select').addEventListener('change', function () {
                actualizarMostrarHabitacion(numHabitacion, this.value);
                calcularYActualizarNumeroTotalPersonas();
            });
        }
    });

//Mediante DOM se añade una habitacion nueva
  function crearDetalleHabitacion(roomNumber) {
        const detalleHabitacion = document.createElement("div");
        detalleHabitacion.id = `roomDetails${roomNumber}`;
        detalleHabitacion.innerHTML = `
            <div>
                <h2 class="habelegir">${window.translations.Habitacion} ${roomNumber}</h2>
            </div>
            <!-- ficha habitación double /twin -->
            <div class="habres row col-12" id="habitacionDobleContainer${roomNumber}">
                <!-- carruselhab -->
                <div class="carouselhabres col-4">
                    <div id="habitacionDoble${roomNumber}" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="imagenes/habitaciones/doble-twin/DBL1.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/habitaciones/doble-twin/TWIN2.jpg" class="d-block w-100">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#habitacionDoble${roomNumber}" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#habitacionDoble${roomNumber}" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="habnombre">
                        <p>${window.translations.HabitacionDoble}</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-4 ">
                            <p class="centrarres" id="precio">${window.translations.Precio}</p>
                        </div>
                        <div class="col-4 ">
                            <p class="centrarres precioServicioHabitacion precioHabitacionDoble" id="precio">50€ </p>
                            <p id="total">*${window.translations.TotalEstancia}</p>
                        </div>
                        <div class="col-4">
                        <input type="radio" class="elegirhab" name="elegirhab${roomNumber}" value="1">
                        <input type="hidden" class="precioHabitacionDobleHidden" id="precioHabitacionDobleHidden" name="precioHabitacionDobleHidden${roomNumber}" value="">
                        <label for="elegirhab">${window.translations.Elegir}</label>
                    </div>
                    </div>
                </div>
            </div>
        
        <!-- ficha habitación double /twin Agotada-->
            <div class="habres row col-12" id="habitacionDobleContainerAgotada${roomNumber}" style="display: none;">
                <!-- carruselhab -->
                <div class="carouselhabres col-4">
                    <div id="habitacionDoble${roomNumber}" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="imagenes/habitaciones/doble-twin/DBL1.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/habitaciones/doble-twin/TWIN2.jpg" class="d-block w-100">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#habitacionDoble${roomNumber}" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#habitacionDoble${roomNumber}" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="habnombre">
                        <p>${window.translations.HabitacionDoble}</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <p class="centrarres agotada" id="#habitacionDobleAgotada${roomNumber}">Agotada</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ficha habitación triple -->
            <div class="habres row col-12" id="habitacionSupletoriaContainer${roomNumber}" style="display: none;">
                <!-- carruselhab -->
                <div class="carouselhabres col-4">
                    <div id="habitacionSupletoria${roomNumber}" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="imagenes/habitaciones/triple/TRIP2.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/habitaciones/triple/aseo1.jpg" class="d-block w-100">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#habitacionSupletoria${roomNumber}" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#habitacionSupletoria${roomNumber}" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="habnombre">
                        <p>${window.translations.HabitacionSupletoria}</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-4 ">
                            <p class="centrarres" id="precio">${window.translations.Precio}</p>
                        </div>
                        <div class="col-4 ">
                            <p class="centrarres precioServicioHabitacion precioHabitacionTriple" id="precio">50€ </p>
                            <p id="total">*${window.translations.TotalEstancia}</p>
                        </div>
                        <div class="col-4">
                                <input type="radio" class="elegirhab" name="elegirhab${roomNumber}" value="2">
                                <input type="hidden" class="precioHabitacionTripleHidden" id="precioHabitacionTripleHidden" name="precioHabitacionTripleHidden${roomNumber}" value="">     
                                <label for="elegirhab">${window.translations.Elegir}</label>
                            </div>
                    </div>
                </div>
            </div>
        
        <!-- ficha habitación triple Agotada-->
            <div class="habres row col-12" id="habitacionSupletoriaContainerAgotada${roomNumber}" style="display: none;">
                <!-- carruselhab -->
                <div class="carouselhabres col-4">
                    <div id="habitacionSupletoria${roomNumber}" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="imagenes/habitaciones/triple/TRIP2.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/habitaciones/triple/aseo1.jpg" class="d-block w-100">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#habitacionSupletoria${roomNumber}" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#habitacionSupletoria${roomNumber}" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="habnombre">
                        <p>${window.translations.HabitacionSupletoria}</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <p class="centrarres agotada" id="#habitacionSupletoriaAgotada${roomNumber}">Agotada</p>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- ficha habitación suite -->
            <div class="habres row col-12" id="habitacionSuiteContainer${roomNumber}">
                <!-- carruselhab -->
                <div class="carouselhabres col-4">
                    <div id="habitacionSuite${roomNumber}" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="imagenes/habitaciones/suite/SUITE1.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/habitaciones/suite/aseosuite.jpg" class="d-block w-100">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#habitacionSuite${roomNumber}" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#habitacionSuite${roomNumber}" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="habnombre">
                        <p>Suite</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-4 ">
                            <p class="centrarres" id="precio">${window.translations.Precio}</p>
                        </div>
                        <div class="col-4 ">
                            <p class="centrarres precioServicioHabitacion precioHabitacionSuite" id="precio">50€ </p>
                            <p id="total">*${window.translations.TotalEstancia}</p>
                        </div>
                        <div class="col-4">
                        <input type="radio" class="elegirhab" name="elegirhab${roomNumber}" value="3">
                        <input type="hidden" class="precioHabitacionSuiteHidden" id="precioHabitacionSuiteHidden" name="precioHabitacionSuiteHidden${roomNumber}" value="">
                        <label for="elegirhab">${window.translations.Elegir}</label>
                    </div>
                    </div>
                </div>
            </div>
        <!-- ficha habitación suite Agotada-->
            <div class="habres row col-12" id="habitacionSuiteContainerAgotada${roomNumber}" style="display: none;">
                <!-- carruselhab -->
                <div class="carouselhabres col-4">
                    <div id="habitacionSuite${roomNumber}" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="imagenes/habitaciones/suite/SUITE1.jpg" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="imagenes/habitaciones/suite/aseosuite.jpg" class="d-block w-100">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#habitacionSuite${roomNumber}" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#habitacionSuite${roomNumber}" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="habnombre">
                        <p>Suite</p>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-12 ">
                            <p class="centrarres agotada" id="habitacionSuiteAgotada${roomNumber}">Agotada</p>
                        </div>
                    </div>
                </div>
            </div>
        `;
        return detalleHabitacion;
    }

    //Mediante DOM se añaden los servicios para la nueva habitacion
    function crearNuevosServicios(roomNumber) {
        const detalleServicios = document.createElement("div");
        detalleServicios.id = `serviceDetails${roomNumber}`;
        detalleServicios.innerHTML = `
         <div id="subSection3">
                            <div>
                                <h3>${window.translations.ServicioHabi} ${roomNumber}</h3>
                            </div>
                            <!-- ficha desayuno -->
                            <div class="habres servicios row col-12">
                                <div class=" col-4">
                                    <img src="imagenes/servicios/desayuno/desayuno1.jpg">
                                </div>
                                <div class="col-8">
                                    <div></div>
                                    <div class="habnombre">
                                        <p>${window.translations.Desayuno}</p>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 ">
                                            <p class="centrarres" id="precio">${precioDesayuno}${window.translations.DesayunoPrecio}</p>
                                        </div>

                                        <!-- Mostrar el precio total en la vista -->
                                        <div class="col-4">
                                            <p class="centrarres precioServicioHabitacion precioDesayuno" id="precioDesayuno" data-precio="${precioDesayuno}">${precioDesayuno}€</p>
                                            <p id="total">*${window.translations.TotalEstancia}</p>
                                        </div>

                                        <div class="col-4">
                                            <input type="checkbox" class="elegirhab" name="desayuno${roomNumber}" value="3">
                                            <input type="hidden" class="precioDesayunoHidden" id="precioDesayunoHidden" name="precioDesayunoHidden${roomNumber}" value="${precioDesayuno}">
                                            <label for="elegirhab1">${window.translations.Elegir}</label>
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
                                        <p> ${window.translations.Parking}</p>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 ">
                                            <p class="centrarres" id="precio">${precioParking}${window.translations.ParkingPrecio}</p>
                                        </div>
                                        <div class="col-4 ">
                                            <p class="centrarres precioServicioHabitacion precioParking" id="precioParking" data-precio-parking="${precioParking}">${precioParking}€</p>
                                            <p id="total">*${window.translations.TotalEstancia}</p>
                                        </div>
                                        <div class="col-4">
                                            <input type="checkbox" class="elegirhab" name="parking${roomNumber}" value="1">
                                            <label for="elegirhab1">${window.translations.Elegir}</label>
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
                                        <p>${window.translations.Romantica}</p>
                                        <hr>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 ">
                                            <p class="centrarres" id="precio">${precioRomantico}${window.translations.Paquete}</p>
                                        </div>
                                        <div class="col-4 ">
                                            <p class="centrarres precioServicioHabitacion" id="precioRomantico">${precioRomantico}€</p>
                                            <p id="total">*${window.translations.TotalEstancia}</p>
                                        </div>
                                        <div class="col-4">
                                            <input type="checkbox" class="elegirhab" name="romantica${roomNumber}" value="2">
                                            <label for="elegirhab1">${window.translations.Elegir}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
        </div>
`;

        return detalleServicios;

    }

    //Visualizar el tipo habitación segun el numero de personas seleccionadas
    function actualizarMostrarHabitacion(roomNumber, numPax) {
        const dobleContainer = document.getElementById(`habitacionDobleContainer${roomNumber}`);
        const supletoriaContainer = document.getElementById(`habitacionSupletoriaContainer${roomNumber}`);
        const suiteContainer = document.getElementById(`habitacionSuiteContainer${roomNumber}`);

        switch (numPax) {
            case "1":
            case "2":
                dobleContainer.style.display = "flex";
                supletoriaContainer.style.display = "none";
                suiteContainer.style.display = "flex";
                break;
            case "3":
                dobleContainer.style.display = "none";
                supletoriaContainer.style.display = "flex";
                suiteContainer.style.display = "none";
                break;
        }
    }

    function actualizarNumHabitacion() {
        // Selecciona todos los elementos con la clase 'habitacion'
        const habitaciones = document.querySelectorAll('.habitacion');

        // Itera sobre cada elemento 'habitacion'
        habitaciones.forEach((habitacion, index) => {
            // Actualiza el contenido del encabezado con la clase 'h2principal' para reflejar el nuevo número de habitación
            habitacion.querySelector('.h2principal').textContent = `Habitación ${index + 1}`;

            // Establece un atributo 'data-habitacion' en el elemento 'habitacion' con el nuevo índice
            habitacion.setAttribute("data-habitacion", index + 1);

            // Selecciona el elemento 'select' dentro de la habitación y actualiza su id
            const select = habitacion.querySelector('select');
            select.id = `habitaciones${index + 1}`;

            // Si es la primera habitación (índice 0), elimina el botón de borrar si existe
            if (index === 0) {
                const botonBorrar = habitacion.querySelector('.removeRoomButton');
                if (botonBorrar) {
                    botonBorrar.remove();
                }
            } else {
                // Para otras habitaciones (no la primera), agrega el botón de borrar si no existe
                if (!habitacion.querySelector('.removeRoomButton')) {
                    // Crea un contenedor para el botón de borrar
                    const botonBorrarContainer = document.createElement('div');
                    botonBorrarContainer.className = 'col-12 text-center botonres pulse';

                    // Usa plantillas literales (backticks) para insertar el HTML del botón de borrar
                    botonBorrarContainer.innerHTML = `<button type="button" class="removeRoomButton">${window.translations.Eliminar}</button>`;

                    // Agrega el contenedor del botón de borrar a la habitación
                    habitacion.appendChild(botonBorrarContainer);

                    // Agrega un evento 'click' al botón de borrar para eliminar la habitación y actualizar el conteo
                    botonBorrarContainer.querySelector('.removeRoomButton').addEventListener('click', function () {
                        habitacion.remove();

                        // Elimina el detalle de la habitación correspondiente
                        document.getElementById(`roomDetails${index + 1}`).remove();

                        // Decrementa el número de habitaciones y muestra el botón de añadir si hay menos de 5 habitaciones
                        numHabitacion--;
                        if (numHabitacion < 5) {
                            botonAñadirHabitacion.style.display = "inline-block";
                        }

                        // Llama a la función para actualizar los números de las habitaciones restantes
                        actualizarNumHabitacion();
                    });
                }
            }
        });
    }



    const secciones = document.querySelectorAll(".section");
    const botones = document.querySelectorAll(".show-section");

    // Añade un evento 'click' a cada botón en la colección 'botones'
    botones.forEach(boton => {
        boton.addEventListener("click", function (event) {
            // Previene el comportamiento por defecto del botón (por ejemplo, en un formulario)
            event.preventDefault();

            // Obtiene el elemento de destino a partir del atributo 'data-target' del botón
            const target = document.querySelector(boton.getAttribute("data-target"));

            // Encuentra la sección actual en la que se encuentra el botón
            const currentSection = boton.closest('.section');

            // Si la sección actual es 'section1', valida el calendario y realiza cálculos si es válido
            if (currentSection.id === "section1" && !validarCalendarioSeleccion()) {
                return;
            } else {
                var fechaCalendario = document.getElementById('calendario');
                calcularNoches(fechaCalendario.value);
                calcularYActualizarNumeroTotalPersonas();
                precioHabitaciones(fechaCalendario.value);
                verificarDisponibilidad();
            }

            // Si la sección actual es 'section2', valida la selección de la habitación
            if (currentSection.id === "section2" && !validarHabitacionSeleccionada()) {
                return;
            }

            // Si la sección actual es 'section3', actualiza el resumen de la reserva
            if (currentSection.id === "section3") {
                actualizarResumenReserva();
            }

            // Oculta todas las secciones
            secciones.forEach(section => {
                section.style.display = "none";
            });

            // Muestra la sección de destino
            target.style.display = "block";

            // Al cambiar de sección, desplaza la ventana hacia la parte superior con un efecto suave
            window.scrollTo({top: 0, behavior: 'smooth'});
        });
    });



    function validarCalendarioSeleccion() {
        // Obtiene el elemento del calendario por su ID
        var fechaCalendario = document.getElementById('calendario');

        // Verifica si el valor del calendario está vacío
        if (!fechaCalendario.value) {
            // Muestra una alerta solicitando que se seleccione una fecha
            alert(window.translations.AlertaFecha);

            // Evita que el formulario se envíe
            event.preventDefault();

            // Devuelve falso para indicar que la validación falló
            return false;
        }

        // Devuelve verdadero para indicar que la validación fue exitosa
        return true;
    }


    function validarHabitacionSeleccionada() {
        // Selecciona todos los elementos con la clase 'habitacion'
        const habitaciones = document.querySelectorAll('.habitacion');

        // Itera sobre cada elemento 'habitacion'
        for (let i = 0; i < habitaciones.length; i++) {
            // Obtiene el número de la habitación del atributo 'data-habitacion'
            const numHabitacion = habitaciones[i].getAttribute('data-habitacion');

            // Selecciona el tipo de habitación seleccionada para la habitación actual
            const tipoHabitacionSeleccionada = document.querySelector(`input[name="elegirhab${numHabitacion}"]:checked`);

            // Si no hay ningún tipo de habitación seleccionada, muestra una alerta y retorna false
            if (!tipoHabitacionSeleccionada) {
                alert(`${window.translations.AlertaHab} ${numHabitacion}.`);
                return false;
            }
        }

        // Si todas las habitaciones tienen un tipo seleccionado, retorna true
        return true;
    }



// Calcula el número total de personas y actualiza el campo oculto
    function calcularYActualizarNumeroTotalPersonas() {
        // Aquí debes tener tu lógica para calcular el número total de personas
        var numeroTotalPersonas = calcularNumeroTotalPersonas(); // Supongamos que tienes una función para calcular esto

        // Obtiene el precio del desayuno desde el atributo 'data-precio' del elemento con ID 'precioDesayuno'
        var precioDesayuno = parseFloat(document.getElementById('precioDesayuno').getAttribute('data-precio'));

        // Obtiene todos los elementos con la clase 'precioDesayuno'
        let precioDesayunoTextContent = document.getElementsByClassName('precioDesayuno');
        // Obtiene todos los elementos ocultos que almacenan el precio del desayuno
        let precioDesayunoHiddenValue = document.getElementsByClassName('precioDesayunoHidden');

        // Itera sobre los elementos de 'precioDesayunoTextContent' y actualiza su contenido
        for (let i = 0; i < precioDesayunoTextContent.length; i++) {
            precioDesayunoTextContent[i].textContent = precioDesayuno * numeroTotalPersonas[i] * noches + '€';
        }

        // Itera sobre los elementos ocultos de 'precioDesayunoHiddenValue' y actualiza su valor
        for (let i = 0; i < precioDesayunoHiddenValue.length; i++) {
            precioDesayunoHiddenValue[i].value = precioDesayuno * numeroTotalPersonas[i] * noches;
        }

        // Obtiene el precio del parking desde el atributo 'data-precio-parking' del elemento con ID 'precioParking'
        var precioParking = parseFloat(document.getElementById('precioParking').getAttribute('data-precio-parking'));

        // Actualiza el contenido y valor oculto del precio del parking para el elemento con ID 'precioParking'
        document.getElementById('precioParking').textContent = precioParking * noches + '€';
        document.getElementById('precioParkingHidden').value = precioParking * noches;

        // Obtiene todos los elementos con la clase 'precioParking'
        let precioParkingTextContent = document.getElementsByClassName('precioParking');
        // Obtiene todos los elementos ocultos que almacenan el precio del parking
        let precioParkingHiddenValue = document.getElementsByClassName('precioParkingHidden');

        // Itera sobre los elementos de 'precioParkingTextContent' y actualiza su contenido
        for (let i = 0; i < precioParkingTextContent.length; i++) {
            precioParkingTextContent[i].textContent = precioParking * noches + '€';
        }

        // Itera sobre los elementos ocultos de 'precioParkingHiddenValue' y actualiza su valor
        for (let i = 0; i < precioParkingHiddenValue.length; i++) {
            precioParkingHiddenValue[i].value = precioParking * noches;
        }
    }


    function calcularNumeroTotalPersonas() {
        // Inicializa un array para almacenar el total de personas en cada selección
        var totalPersonas = [];

        // Selecciona todos los elementos con la clase "form-control"
        var camposSelect = document.querySelectorAll('.form-control');

        // Itera sobre cada elemento de selección
        camposSelect.forEach(function (select) {
            // Convierte el valor de la selección a entero y lo agrega al array totalPersonas
            totalPersonas.push(parseInt(select.value));
        });

        // Devuelve el array con el total de personas por cada selección
        return totalPersonas;
    }


    let noches = 1;
    function calcularNoches(fechaRango) {
        // Extraer las dos fechas del string
        const [fechaInicio, fechaFin] = fechaRango.split(" - ");

        // Convertir las fechas a objetos Date
        const partesInicio = fechaInicio.split("-");
        const partesFin = fechaFin.split("-");

        // Crear objetos Date para la fecha de inicio y la fecha de fin
        const dateInicio = new Date(partesInicio[2], partesInicio[1] - 1, partesInicio[0]);
        const dateFin = new Date(partesFin[2], partesFin[1] - 1, partesFin[0]);

        // Calcular la diferencia en milisegundos entre las dos fechas
        const diferenciaTiempo = dateFin - dateInicio;

        // Convertir la diferencia de tiempo de milisegundos a días
        noches = diferenciaTiempo / (1000 * 60 * 60 * 24);
    }

    //Calcular el precio de las habitaciones segun la fecha seleccionada
    function precioHabitaciones(fechaRango) {
        // Divide el rango de fechas en un array de dos elementos
        let rangoFecha = fechaRango.split(' - ');

        // Si el rango de fechas no tiene exactamente dos partes, sal de la función
        if (rangoFecha.length !== 2)
            return;

        // Convierte las fechas de texto a objetos Date
        let fechaInicio = parseDate(rangoFecha[0]);
        let fechaFin = parseDate(rangoFecha[1]);

        // Inicializa el total del precio
        let totalPrice = 0;

        // Itera sobre las fechas disponibles
        fechas.forEach(function (item) {
            let fecha = new Date(item.fecha);
            // Si la fecha está dentro del rango de fechas seleccionado, suma el precio correspondiente
            if (fecha >= fechaInicio && fecha < fechaFin) {
                totalPrice += parseFloat(item.fec_precio);
            }
        });

        // Calcula el precio de la habitación triple sumando el suplemento de la habitación y el total del precio
        let habitacionTriplePrecio = (habitaciones[1].suplemento * noches) + totalPrice;
        // Calcula el precio de la suite sumando el suplemento de la habitación y el total del precio
        let suitePrecio = (habitaciones[2].suplemento * noches) + totalPrice;

        // Obtiene elementos con la clase 'precioHabitacionDoble', 'precioHabitacionTriple', 'precioHabitacionSuite'
        let precioHabitacionDoble = document.getElementsByClassName('precioHabitacionDoble');
        let precioHabitacionTriple = document.getElementsByClassName('precioHabitacionTriple');
        let precioHabitacionSuite = document.getElementsByClassName('precioHabitacionSuite');

        // Obtiene elementos ocultos con la clase 'precioHabitacionDobleHidden', 'precioHabitacionTripleHidden', 'precioHabitacionSuiteHidden'
        let precioHabitacionDobleHidden = document.getElementsByClassName('precioHabitacionDobleHidden');
        let precioHabitacionTripleHidden = document.getElementsByClassName('precioHabitacionTripleHidden');
        let precioHabitacionSuiteHidden = document.getElementsByClassName('precioHabitacionSuiteHidden');

        // Itera sobre los elementos con la clase 'precioHabitacionDoble' y actualiza su contenido y valor oculto
        for (let i = 0; i < precioHabitacionDoble.length; i++) {
            precioHabitacionDoble[i].textContent = totalPrice + '€';
            precioHabitacionDobleHidden[i].value = totalPrice;
        }

        // Itera sobre los elementos con la clase 'precioHabitacionTriple' y actualiza su contenido y valor oculto
        for (let i = 0; i < precioHabitacionTriple.length; i++) {
            precioHabitacionTriple[i].textContent = habitacionTriplePrecio + '€';
            precioHabitacionTripleHidden[i].value = habitacionTriplePrecio;
        }

        // Itera sobre los elementos con la clase 'precioHabitacionSuite' y actualiza su contenido y valor oculto
        for (let i = 0; i < precioHabitacionSuite.length; i++) {
            precioHabitacionSuite[i].textContent = suitePrecio + '€';
            precioHabitacionSuiteHidden[i].value = suitePrecio;
        }
    }


//Se cambia la fecha a formato Date
    function parseDate(dateStr) {
        // Divide la cadena de fecha en un array usando '-' como delimitador
        let fecha = dateStr.split('-');

        // Crea un nuevo objeto Date con el año, mes y día obtenidos del array
        // Nota: El mes se resta en 1 porque en JavaScript los meses van de 0 a 11
        return new Date(fecha[2], fecha[1] - 1, fecha[0]); // YYYY, MM (0-based), DD
    }



    function actualizarResumenReserva() {
        // Selecciona el elemento donde se mostrará el resumen de las habitaciones
        const resumenHabitaciones = document.getElementById('resumenHabitaciones');
        // Limpia el contenido actual del resumen
        resumenHabitaciones.innerHTML = '';

        // Inicializa el total de la reserva
        let totalReserva = 0;

        // Obtiene todas las habitaciones
        const habitaciones = document.querySelectorAll('.habitacion');
        habitaciones.forEach((habitacion, index) => {
            // Obtener el número de la habitación
            let numeroHabitacion = index + 1;

            // Obtener el número de personas seleccionado para esta habitación
            let selectElement = habitacion.querySelector('select');
            let numPersonas = selectElement.value;

            // Obtener el tipo de habitación seleccionado para esta habitación
            let tipoHabitacion = document.querySelector('input[name="elegirhab' + numeroHabitacion + '"]:checked').value;

            // Inicializar el nombre de la habitación como Habitación Doble por defecto
            let nombreHabitacion = window.translations.HabitacionDoble;

            // Obtener el precio de la habitación dependiendo del tipo seleccionado
            let inputElement;
            let precioHabitacion;
            if (tipoHabitacion == 2) {
                nombreHabitacion = window.translations.HabitacionSupletoria;
                inputElement = document.querySelector('input[name="precioHabitacionTripleHidden' + numeroHabitacion + '"]');
            } else if (tipoHabitacion == 3) {
                nombreHabitacion = "Suite";
                inputElement = document.querySelector('input[name="precioHabitacionSuiteHidden' + numeroHabitacion + '"]');
            } else {
                inputElement = document.querySelector('input[name="precioHabitacionDobleHidden' + numeroHabitacion + '"]');
            }
            // Obtiene el valor del input para el precio de la habitación
            precioHabitacion = inputElement.value;

            // Inicializar un array para almacenar los servicios seleccionados
            let servicios = [];

            // Variables para almacenar los precios de los servicios seleccionados
            let precioServicios = 0;

            // Verificar y procesar los servicios seleccionados para esta habitación
            let desayuno = document.querySelector('input[name="desayuno' + numeroHabitacion + '"]:checked');
            let parking = document.querySelector('input[name="parking' + numeroHabitacion + '"]:checked');
            let romantica = document.querySelector('input[name="romantica' + numeroHabitacion + '"]:checked');

            // Verificar si el desayuno está seleccionado y agregarlo al resumen
            if (desayuno != null) {
                desayuno = desayuno.value;
                servicios.push(window.translations.Desayuno);
                precioServicios += parseInt(document.querySelector('input[name="precioDesayunoHidden' + numeroHabitacion).value);
            }

            // Verificar si el parking está seleccionado y agregarlo al resumen
            if (parking != null) {
                parking = parking.value;
                servicios.push(window.translations.Parking);
                precioServicios += parseInt(document.querySelector('input[name="precioParkingHidden').value);
            }

            // Verificar si la opción romántica está seleccionada y agregarla al resumen
            if (romantica != null) {
                romantica = romantica.value;
                servicios.push(window.translations.Romantica);
                precioServicios += parseInt(document.querySelector('input[name="precioRomanticoHidden').value);
            }
            

            // Calcular el precio total de la reserva para esta habitación
            totalReserva += (parseInt(precioHabitacion) + precioServicios);

            //Optener fechas de la reserva

            const calendario = document.getElementById('calendario');
            const fechas = calendario.value.split(' - '); // Dividir el valor del calendario en dos partes

            const fechaEntrada = fechas[0];
            const fechaSalida = fechas[1];

            // Actualizar los elementos del DOM con las fechas extraídas
            document.getElementById('fechaEntrada').textContent = fechaEntrada;
            document.getElementById('fechaSalida').textContent = fechaSalida;
            // Crear un elemento div para mostrar el resumen de la habitación
            const roomResumen = document.createElement('div');
            // Establecer el contenido HTML del elemento div
            roomResumen.innerHTML = `<hr><h5>${window.translations.Habitacion}${numeroHabitacion}</h5>`;
            const roomResumen1 = document.createElement('div');
            // Establecer el contenido HTML del elemento div
            roomResumen1.innerHTML = `
            <p>${window.translations.Tipo}: ${nombreHabitacion}</p>
            <p>${window.translations.Personas}: ${numPersonas}</p>
            <p>${window.translations.PrecioHab}: ${precioHabitacion}€</p>
            <p>${window.translations.Servicios}: ${servicios.join(', ')}</p>
            <p>${window.translations.ServiciosPre}: ${precioServicios}€</p>
        `;
            roomResumen1.classList.add('horizontal');
            // Agregar el elemento div al resumen de las habitaciones
            resumenHabitaciones.appendChild(roomResumen);
                 resumenHabitaciones.appendChild(roomResumen1);
        });

        // Actualizar el total de la reserva en la interfaz
        document.getElementById('totalReserva').textContent = `${totalReserva}€`;
        
    }
    
    function verificarDisponibilidad() {
        
        const calendarioInput = document.getElementById('calendario');
        let rangoFechas = calendarioInput.value;
        let fechas = rangoFechas.split(' - ');
        let fechaInicio = convertirFecha(fechas[0]);
        let fechaFin = convertirFecha(fechas[1]);

        let dblTwinDisponible = true;
        let trpDisponible = true;
        let suiteDisponible = true;


        disponibilidadHabitaciones.forEach(habitacion => {
            let fecha = new Date(habitacion.fecha);
            if (fecha >= fechaInicio && fecha <= fechaFin) {
                if (habitacion[`dbl_twin`] === 0) {
                    dblTwinDisponible = false;
                }
                if (habitacion[`trp`] === 0) {
                    trpDisponible = false;
                }
                if (habitacion[`suite`] === 0) {
                    suiteDisponible = false;
                }

            }
        });

        // Mostrar/Ocultar contenedores según disponibilidad
        for (let i = 1; i <= 5; i++) {
            const dobleContainer = document.getElementById(`habitacionDobleContainer${i}`);
            const supletoriaContainer = document.getElementById(`habitacionSupletoriaContainer${i}`);
            const suiteContainer = document.getElementById(`habitacionSuiteContainer${i}`);



            if (dobleContainer != null && dobleContainer.style.display != 'none' && !dblTwinDisponible) {
                $(`#habitacionDobleContainer${i}`).hide();
                $(`#habitacionDobleContainerAgotada${i}`).show();
            }

            if (supletoriaContainer != null && supletoriaContainer.style.display != 'none' && !trpDisponible) {
                $(`#habitacionSupletoriaContainer${i}`).hide();
                $(`#habitacionSupletoriaContainerAgotada${i}`).show();
            }

            if (suiteContainer != null && suiteContainer.style.display != 'none' && !suiteDisponible) {
                $(`#habitacionSuiteContainer${i}`).hide();
                $(`#habitacionSuiteContainerAgotada${i}`).show();
            }
        }
    }

    function convertirFecha(fechaStr) {
        const partes = fechaStr.split('-');
        const dia = parseInt(partes[0], 10);
        // Los meses en JS van de 0 a 11
        const mes = parseInt(partes[1], 10) - 1;
        const año = parseInt(partes[2], 10);
        return new Date(año, mes, dia);
    }


});
