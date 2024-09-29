$(() => {
    //SELECT PARA TIPO
    const handleTypeChange = () => {
        const typeValue = $('#typeidInput').val();
    
        // DESHABILITAR OBJETOS
        disableAllSelects(['typeidInput']);
        disableAllInputs();
    
        // LIMPIAR OBJETOS
        clearAllRelationSelectFields(['typeidInput']);
        clearAllInputFields();
    
        // Habilitar campos según el valor de typeValue
        if (typeValue === '0') {//VEHICULO (01-99)
            enableSelect('modelidInput');
        } else if (typeValue === '1') {// TRAMO TERMINADO (9T -- TrT)
            console.log('TRAMO TERMINADO (9T -- TrT)');
            enableSelect('positionidInput');
        } else if (typeValue === '2') {// TRAMO RECTO (9TR -- TrR)
            $('#longitInput').prop('readonly', false);
            $('#cortecmInput').prop('readonly', false);
            $('#lccmInput').prop('readonly', false);
            $('#abrazlongcmInput').prop('readonly', false);
    
            enableSelect('materialidInput');
            enableSelect('porcendespunteInput');
        } else if (typeValue === '3') {// GRAPA
            $('#longitInput').prop('readonly', false);
            enableSelect('materialgrapaidInput');
        }
    };
    
    //SELECT PARA MODEL
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
    
    //SELECT PARA AñO
    const handleYearChange = () => {     
        // HABILITAR OBJETOS
        enableSelect('positionidInput');
    }; 

    //SELECT PARA POSICION
    const handlePositionChange = () => {
        // HABILITAR OBJETOS
        $('#identidadInput').prop('readonly', false);
        enableSelect('materialidInput');
    }

    // Asignar manejadores de eventos
    $('#typeidInput').on('change', () => {
        //DESHBILITAR TEMPORALMENTE EL EVENTO CHANGE
        $('#modelidInput').off('change', handleModelChange);
        //$('#yearidInput').off('change', handleYearChange);
        $('#positionidInput').off('change', handlePositionChange);

        handleTypeChange();
        
        //HABIITAR LOS EVENTOS CHANGE
        $('#modelidInput').on('change', handleModelChange);
        //$('#yearidInput').on('change', handleYearChange);
        $('#positionidInput').on('change', handlePositionChange);
    });

    $('#modelidInput').on('change', handleModelChange);
    $('#yearidInput').on('change', handleYearChange);
    $('#positionidInput').on('change', handlePositionChange);
});
