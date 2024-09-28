$(() => {
    // Función para manejar el cambio en typeidInput
    const handleTypeChange = () => {
        const typeValue = $('#typeidInput').val();

        // DESHABILITAR OBJETOS
        disableAllSelects(['typeidInput']);
        disableAllInputs();

        // LIMPIAR OBJETOS
        clearAllRelationSelectFields(['typeidInput']);
        clearAllInputFields();

        // Habilitar campos según el valor de typeValue
        if (typeValue === '0') {
            // HABILITAR OBJETOS
            enableSelect('modelidInput');
        } else if (typeValue === '1') {
            enableSelect('positionidInput');
        } else if (typeValue === '2') {
            // Habilitar campos de longitud
            $('#longitInput').prop('readonly', false);
            $('#cortecmInput').prop('readonly', false);
            $('#lccmInput').prop('readonly', false);
            $('#abrazlongcmInput').prop('readonly', false);

            enableSelect('materialidInput');
            enableSelect('porcendespunteInput');
        } else if (typeValue === '3') {
            $('#longitInput').prop('readonly', false);
            enableSelect('materialgrapaidInput');
        }
    };

    // Función para manejar el cambio en modelidInput
    const handleModelChange = () => {
        // DESHABILITAR OBJETOS
        disableAllSelects(['typeidInput', 'modelidInput']);
        disableAllInputs();

        // LIMPIAR OBJETOS
        clearAllRelationSelectFields(['typeidInput', 'modelidInput']);
        clearAllInputFields();

        // HABILITAR OBJETOS
        $('#apodoInput').prop('readonly', false);
        enableSelect('yearidInput');
    };

    // Asignar manejadores de eventos
    $('#typeidInput').on('change', handleTypeChange);
    $('#modelidInput').on('change', handleModelChange);
});
