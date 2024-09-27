$(() => {
    // Inicialización o configuraciones si es necesario
});

/**
 * Deshabilita el campo <select> original y su instancia de Tom Select.
 *
 * @param {string} id - El ID del campo <select> (sin el símbolo '#' al inicio) que se desea deshabilitar.
 * @returns {void}
 */
function disableSelect(id) {
    // Deshabilitar el campo <select> original
    $('#' + id).prop('disabled', true);

    // Deshabilitar Tom Select usando su método específico
    const tomSelectInstance = $('#' + id)[0].tomselect;
    if (tomSelectInstance) {
        tomSelectInstance.disable(); // Método interno de Tom Select para deshabilitarlo
    }

    // Añadir la clase 'disabled' para bloquear visualmente Tom Select
    $('#' + id).closest('.ts-wrapper').addClass('locked disabled');

    // Deshabilitar el dropdown de Tom Select y ocultarlo
    $('#' + id + '-ts-dropdown').css('display', 'none'); // Ocultar el menú desplegable

    // Evitar que cualquier clic o evento en el contenedor de Tom Select responda
    $('#' + id + '-ts-control').css('pointer-events', 'none');
}

/**
 * Habilita el campo <select> original y su instancia de Tom Select.
 *
 * @param {string} id - El ID del campo <select> (sin el símbolo '#' al inicio) que se desea habilitar.
 * @returns {void}
 */
function enableSelect(id) {
    // Habilitar el campo <select> original
    $('#' + id).prop('disabled', false);

    // Habilitar Tom Select usando su método específico
    const tomSelectInstance = $('#' + id)[0].tomselect;
    if (tomSelectInstance) {
        tomSelectInstance.enable(); // Método interno de Tom Select para habilitarlo
    }

    // Quitar las clases que bloquean la funcionalidad visual
    $('#' + id).closest('.ts-wrapper').removeClass('locked disabled');

    // Mostrar el dropdown de Tom Select nuevamente
    $('#' + id + '-ts-dropdown').css('display', 'block');

    // Habilitar clics y eventos en el contenedor de Tom Select nuevamente
    $('#' + id + '-ts-control').css('pointer-events', 'auto');
}
