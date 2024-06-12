
document.addEventListener('DOMContentLoaded', function () {

    // Función para calcular la fechas entre dos fechas
    function obtenerFechas(fechaInicio, fechaFin) {
        let fechas = [];
        //Usamos new Date para pasar la fecha de string a formado fecha. 
        let fechaInicioFecha = new Date(fechaInicio);

        while (fechaInicioFecha < new Date(fechaFin)) {
            fechas.push(new Date(fechaInicioFecha).toISOString().split('T')[0]);
            fechaInicioFecha.setDate(fechaInicioFecha.getDate() + 1);
        }

        return fechas;
    }

    // Contar las reservas por fecha
    let fechaCuentas = {};
    reservasJs.forEach(reserva => {
        let fechas = obtenerFechas(reserva.check_in, reserva.check_out);
        fechas.forEach(date => {
            if (!fechaCuentas[date]) {
                fechaCuentas[date] = 0;
            }
            fechaCuentas[date]++;
        });
    });

    // Obtener las fechas con más de 100 reservas
    let fechasDeshabilitadas = [];
    for (let fecha in fechaCuentas) {
        if (fechaCuentas[fecha] >= 100) {
            fechasDeshabilitadas.push(fecha);
        }
    }

    let demo29 = new HotelDatepicker(
            document.getElementById("calendario"),
            {
                extraDayText: function (date, attributes) {
                    // Convirtiendo la fecha a un formato que se puede comparar
                    let fechaFormateada = date;
                    // Iterando sobre las fechas para encontrar la coincidencia
                    for (let i = 0; i < fechas.length; i++) {
                        if (
                                fechaFormateada === fecha.format(new Date(fechas[i].fecha), "DD-MM-YYYY") &&
                                attributes.class.includes("datepicker__month-day--visibleMonth")
                                ) {
                            return "<span>" + fechas[i].fec_precio + "€</span>";
                        }
                    }
                },
                disabledDates: fechasDeshabilitadas,
                format: 'DD-MM-YYYY',
                startOfWeek: 'monday',
                clearButton: true,
                topbarPosition: 'bottom',
                submitButtonName: 'name_of_submit_button',
                i18n: {
                    selected: "Su estancia:",
                    night: "Noche",
                    nights: "Noches",
                    button: "Cerrar",
                    clearButton: "Borrar",
                    submitButton: "Enviar",
                    "checkin-disabled": "Registro deshabilitado",
                    "checkout-disabled": "Pago deshabilitado",
                    "day-names-short": ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab'],
                    "day-names": ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
                    "month-names-short": ['En', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                    "month-names": ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    "error-more": "El rango de fechas no debe ser más de 1 noche",
                    "error-more-plural": "El rango de fechas no debe ser superior a %d noches",
                    "error-less": "El rango de fechas no debe ser inferior a 1 noche",
                    "error-less-plural": "El rango de fechas no debe ser inferior a %d noches",
                    "info-more": "Por favor seleccione un rango de fechas de al menos 1 noche",
                    "info-more-plural": "Por favor seleccione un rango de fechas de al menos %d noches",
                    "info-range": "Por favor seleccione un rango de fechas entre %d y %d noches",
                    "info-range-equal": "PPor favor seleccione un rango de fechas de %d noches",
                    "info-default": "Por favor seleccione un rango de fechas",
                    "aria-application": "Calendario",
                    "aria-selected-checkin": "Seleccionada como fecha de entrada, %s",
                    "aria-selected-checkout": "Seleccionada como fecha de salida, %s",
                    "aria-selected": "Seleccionado, %s",
                    "aria-disabled": "No disponible, %s",
                    "aria-choose-checkin": "Elige %s como fecha de entrada",
                    "aria-choose-checkout": "Elige %s como fecha de salida",
                    "aria-prev-month": "Retroceder para cambiar al mes anterior",
                    "aria-next-month": "Retroceder para cambiar al mes siguiente",
                    "aria-close-button": "Cerrar el selector de fechas",
                    "aria-clear-button": "Borrar las fechas seleccionadas",
                    "aria-submit-button": "Enviar el formulario"
                }
            }
    );
});
