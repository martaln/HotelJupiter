
document.addEventListener('DOMContentLoaded', function () {

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
                disabledDates: fechasOcupadas,
                format: 'DD-MM-YYYY',
                startOfWeek: 'monday',
                clearButton: true,
                topbarPosition: 'bottom',
                submitButtonName: 'name_of_submit_button',
                i18n: {
                    selected: window.translations.CalendarSelected,
                    night: window.translations.CalendarNight,
                    nights: window.translations.CalendarNights,
                    button: window.translations.CalendarButton,
                    clearButton: window.translations.CalendarClearButton,
                    submitButton: window.translations.CalendarSubmitButton,
                    "checkin-disabled": window.translations.CalendarCheckinDisabled,
                    "checkout-disabled": window.translations.CalendarCheckoutDisabled,
                    "day-names-short": window.translations.CalendarDayNamesShort,
                    "day-names": window.translations.CalendarDayNames,
                    "month-names-short": window.translations.CalendarMonthNamesShort,
                    "month-names": window.translations.CalendarMonthNames,
                    "error-more": window.translations.CalendarErrorMore,
                    "error-more-plural": window.translations.CalendarErrorMorePlural,
                    "error-less": window.translations.CalendarErrorLess,
                    "error-less-plural": window.translations.CalendarErrorLessPlural,
                    "info-more": window.translations.CalendarInfoMore,
                    "info-more-plural": window.translations.CalendarInfoMorePlural,
                    "info-range": window.translations.CalendarInfoRange,
                    "info-range-equal": window.translations.CalendarInfoRangeEqual,
                    "info-default": window.translations.CalendarInfoDefault,
                    "aria-application": window.translations.CalendarAriaApplication,
                    "aria-selected-checkin": window.translations.CalendarAriaSelectedCheckin,
                    "aria-selected-checkout": window.translations.CalendarAriaSelectedCheckout,
                    "aria-selected": window.translations.CalendarAriaSelected,
                    "aria-disabled": window.translations.CalendarAriaDisabled,
                    "aria-choose-checkin": window.translations.CalendarAriaChooseCheckin,
                    "aria-choose-checkout": window.translations.CalendarAriaChooseCheckout,
                    "aria-prev-month": window.translations.CalendarAriaPrevMonth,
                    "aria-next-month": window.translations.CalendarAriaNextMonth,
                    "aria-close-button": window.translations.CalendarAriaCloseButton,
                    "aria-clear-button": window.translations.CalendarAriaClearButton,
                    "aria-submit-button": window.translations.CalendarAriaSubmitButton
                }
            }
    );
});
