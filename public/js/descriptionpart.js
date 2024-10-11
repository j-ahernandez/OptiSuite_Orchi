$(() => {
    $("#CódigoInput").css({
        'color': 'black', 
        'opacity': '1' 
    });    

    const handleTypeChange = () => {
        const typeValue = $('#typeidInput').val();
       
        if (typeValue === '0') {
            enableSelect('modelidInput');
        } else if (typeValue === '1') {
            enableSelect('positionidInput');
            disableSelect('modelidInput');
        } else if (typeValue === '2') {
            $('#longitInput').prop('readonly', false);
            $('#cortecmInput').prop('readonly', false);
            $('#lccmInput').prop('readonly', false);
            $('#abrazlongcmInput').prop('readonly', false);

            disableSelect('modelidInput');
            enableSelect('materialidInput');
            enableSelect('porcendespunteInput');
        } else if (typeValue === '3') {
            $('#longitInput').prop('readonly', false);
            enableSelect('materialgrapaidInput');
            disableSelect('modelidInput');
        }
    };
    
    const handleModelChange = () => {   
        $('#apodoInput').prop('readonly', false);
        enableSelect('yearidInput');
    };   
    
    const handleYearChange = () => {     
        enableSelect('positionidInput');
    }; 

    //SELECT PARA POSICION
    const handlePositionChange = () => {
        if($('#typeidInput').val() === '0') {
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

        if($('#typeidInput').val() === '1') {
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

    const handleTramoRectoChange = () => {

    }

    $('#typeidInput').on('change', () => {
        $('#modelidInput').off('change', handleModelChange);
        //$('#yearidInput').off('change', handleYearChange);
        $('#positionidInput').off('change', handlePositionChange);
        $('#positionidInput').off('change', handleTramoRectoChange);

        handleTypeChange();
        
        $('#modelidInput').on('change', handleModelChange);
        //$('#yearidInput').on('change', handleYearChange);
        $('#positionidInput').on('change', handlePositionChange);
    });

    $('#modelidInput').on('change', handleModelChange);
    $('#yearidInput').on('change', handleYearChange);
    $('#positionidInput').on('change', handlePositionChange);

    $('#modelidInput').on('change', function() {        
        var modelidValue = $(this).val();

        $('#CódigoInput').val(modelidValue.trim() + '-');
    });

    $('#modelidInput').on('change', function() {        
        var modelidValue = $(this).val();

        $('#CódigoInput').val(modelidValue.trim() + '-');
    });

    $.get('/obtener-csrf-token', function(response) {
        const csrfToken = response.csrfToken;

        $('#typeidInput').on('change', function() {
            var selectedValue = $(this).val();
            $('#CódigoInput').val('');

            if (selectedValue === '' || selectedValue === '0' || selectedValue === '3') {
                return;
            }

            $.ajax({
                url: `/obtener-codigo-tipo-vehiculo/${selectedValue}`,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    $('#CódigoInput').val(response.numero + '-');                

                    if (selectedValue === '2'){
                        $('#CódigoInput').val(response.numero + '-R');
                    }
                },
                error: function(xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        console.error(xhr.responseJSON.error); 
                    } else {
                        console.error('Error en la solicitud AJAX:', xhr.statusText); 
                    }
                }
            });
        });

        $('#tipohojaidInput').on('change', function() {
            var selectedValue = $(this).val();

            $.ajax({
                url: `/obtener-imagen-tipo-hoja/${selectedValue}`,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(response) {
                    console.log(response.imageUrl);
                    $('#imagePreviewTipoHoja').attr('src', response.imageUrl);
                },
                error: function(xhr) {
                    console.error("Error al cargar la imagen");
                }
            });
        });

        $('#bujelcidInput').on('change', function() {
            var selectedValue = $(this).val();

            $.ajax({
                url: `/obtener-imagen-buje-lc/${selectedValue}`,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken 
                },
                success: function(response) {
                    $('#imagePreviewBujeLC').attr('src', response.imageUrl);
                },
                error: function(xhr) {
                    console.error("Error al cargar la imagen");
                }
            });
        });

        $('#bujellidInput').on('change', function() {
            var selectedValue = $(this).val();

            $.ajax({
                url: `/obtener-imagen-buje-ll/${selectedValue}`, 
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken 
                },
                success: function(response) {
                    console.log(response.imageUrl);
                    $('#imagePreviewBujeLL').attr('src', response.imageUrl); 
                },
                error: function(xhr) {
                    console.error("Error al cargar la imagen");
                }
            });
        });

    });
});
