$(() => {
    //SELECT PARA TIPO
    const handleTypeChange = () => {
        const typeValue = $('#typeidInput').val();
       
        // Habilitar campos según el valor de typeValue
        if (typeValue === '0') {//VEHICULO (01-99)
            enableSelect('modelidInput');
        } else if (typeValue === '1') {// TRAMO TERMINADO (9T -- TrT)
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
        if($('#typeidInput').val() === '0') {//VEHICULO (01-99)
            // HABILITAR OBJETOS
            $('#identidadInput').prop('readonly', false);
            $('#distcccmInput').prop('readonly', false);           
            enableSelect('materialidInput');
            enableSelect('tipohojaidInput');
            enableSelect('diatcidInput');
            enableSelect('tiposbujesidInput');
            enableSelect('bujelcidInput');
            enableSelect('bujellidInput');
            enableSelect('brioidInput');
            enableSelect('brioidInput');
        }

        if($('#typeidInput').val() === '1') {// TRAMO TERMINADO (9T -- TrT)
            // HABILITAR OBJETOS
            $('#identidadInput').prop('readonly', false);
            $('#distcccmInput').prop('readonly', false);           
            enableSelect('materialidInput');
            enableSelect('tipohojaidInput');
            enableSelect('roleolcidInput');
            enableSelect('roleollidInput');
            enableSelect('abraztipoidInput');
            enableSelect('abrazmasteridInput');
            enableSelect('diatcidInput');
            enableSelect('bujelcidInput');
            enableSelect('bujellidInput');
        }
    }

    //SELECT PARA POSICION
    const handleTramoRectoChange = () => {

    }

    // Asignar manejadores de eventos
    $('#typeidInput').on('change', () => {
        //DESHBILITAR TEMPORALMENTE EL EVENTO CHANGE
        $('#modelidInput').off('change', handleModelChange);
        //$('#yearidInput').off('change', handleYearChange);
        $('#positionidInput').off('change', handlePositionChange);
        $('#positionidInput').off('change', handleTramoRectoChange);

        handleTypeChange();
        
        //HABIITAR LOS EVENTOS CHANGE
        $('#modelidInput').on('change', handleModelChange);
        //$('#yearidInput').on('change', handleYearChange);
        $('#positionidInput').on('change', handlePositionChange);
    });

    $('#modelidInput').on('change', handleModelChange);
    $('#yearidInput').on('change', handleYearChange);
    $('#positionidInput').on('change', handlePositionChange);

    /*$('form').on('submit', function() {
        enableSelect(modelidInput)

        var modelidInput = $('#modelidInput');
        if (modelidInput.length) {
            // Habilitar el campo deshabilitado
            modelidInput.prop('disabled', false);
            console.log('modelidInput value:', modelidInput.val());
        }
    });*/ 

    // Primero, obtenemos el token CSRF
    $.get('/obtener-csrf-token', function(response) {
        const csrfToken = response.csrfToken;

        // Escuchar el evento de cambio en el Select
        $('#tipohojaidInput').on('change', function() {
            var selectedValue = $(this).val();

            // Realizar la solicitud AJAX para obtener la URL de la imagen
            $.ajax({
                url: `/obtener-imagen-tipo-hoja/${selectedValue}`, // Ruta hacia el controlador
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Usamos el token CSRF obtenido
                },
                success: function(response) {
                    // Actualizar la imagen con la URL obtenida en la respuesta
                    console.log(response.imageUrl);
                    $('#imagePreviewTipoHoja').attr('src', response.imageUrl); // Asegúrate de que esto coincide con lo que devuelves
                },
                error: function(xhr) {
                    console.error("Error al cargar la imagen");
                }
            });
        });

        // Escuchar el evento de cambio en el Select
        $('#bujelcidInput').on('change', function() {
            var selectedValue = $(this).val();

            // Realizar la solicitud AJAX para obtener la URL de la imagen
            $.ajax({
                url: `/obtener-imagen-buje-lc/${selectedValue}`, // Ruta hacia el controlador
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Usamos el token CSRF obtenido
                },
                success: function(response) {
                    // Actualizar la imagen con la URL obtenida en la respuesta
                    $('#imagePreviewBujeLC').attr('src', response.imageUrl); // Asegúrate de que esto coincide con lo que devuelves
                },
                error: function(xhr) {
                    console.error("Error al cargar la imagen");
                }
            });
        });

        // Escuchar el evento de cambio en el Select
        $('#bujellidInput').on('change', function() {
            var selectedValue = $(this).val();

            // Realizar la solicitud AJAX para obtener la URL de la imagen
            $.ajax({
                url: `/obtener-imagen-buje-ll/${selectedValue}`, // Ruta hacia el controlador
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Usamos el token CSRF obtenido
                },
                success: function(response) {
                    // Actualizar la imagen con la URL obtenida en la respuesta
                    console.log(response.imageUrl);
                    $('#imagePreviewBujeLL').attr('src', response.imageUrl); // Asegúrate de que esto coincide con lo que devuelves
                },
                error: function(xhr) {
                    console.error("Error al cargar la imagen");
                }
            });
        });


    });

});
