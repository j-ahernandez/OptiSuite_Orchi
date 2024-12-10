$(() => {
    let csrfToken = '';

    // Obtener el token CSRF
    $.get('/admin/obtener-csrf-token', (responseToken) => {        
        csrfToken = responseToken.csrfToken;
    });

    // Declaración de variables globales
    let _tipo = '';
    let _vehiculoId = '';
    let _vehiculo = '';
    let _nombreCorto = '';
    let _modeloVehiculo = '';
    let _yearId = '';
    let _year = '';
    let _positionId = '';
    let _position = '';
    let _identidad = '';
    let _materialId = '';
    let _material = '';
    let _longitId = '';
    let _longit = '';
    let _materialCombinado = '';
    let _materialGrapa = '';

    function applyStylesToInputs() {
        $("#CódigoInput").css({
            'color': 'black', 
            'opacity': '1'
        });  
    
        $("#descriptionInput").css({
            'color': 'black', 
            'opacity': '1'
        });
    }

    $('#typeidInput').off('change').on('change', (event) => {
        deselectAllTomSelects('typeidInput');

        const typeValue = $(event.target).val();
        const selectedText = $('#typeidInput option:selected').text();

        // Extraer el texto antes del primer paréntesis
        const beforeParenthesis = selectedText.split('(')[0].trim();
        console.log('Texto antes del paréntesis:', beforeParenthesis); // Depuración

        // Convertir las primeras letras de cada palabra a mayúsculas y eliminar los espacios
        const formattedText = beforeParenthesis
            .split(' ')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase())
            .join('');
        console.log('Texto formateado:', formattedText); // Depuración

        // Variable que guarda el texto procesado
        const variable = encodeURIComponent(formattedText);
        console.log('Texto codificado:', variable); // Depuración

        $('#CódigoInput').val('');

        // Verifica si el valor seleccionado es válido
        if (typeValue === undefined || typeValue === null || typeValue === '') {
            console.log('No se seleccionó ningún valor válido.');
            return; // Salir de la función si no hay un valor válido
        }

        if (typeValue > 0) {
            $.ajax({
                url: `/admin/obtener-codigo-vehiculo-por-nombre/${variable}`, // Enviando la palabra como parte de la URL
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: (response) => {
                    console.log('Respuesta del servidor:', response); // Depuración
                    _numero = response.numero;

                    let datos = _numero + '-';
                    $('#CódigoInput').val(_numero + '-');

                    if (typeValue === '2') {
                        datos = _numero + '-R';
                    }   

                    $('#CódigoInput').val(datos);
                    _vehiculoId = datos;

                    disableSelect('modelidInput');

                    // Aplica los estilos después de actualizar los valores
                    applyStylesToInputs();
                },
                error: (xhr) => {
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        console.error(xhr.responseJSON.error);
                    } else {
                        console.error('Error en la solicitud AJAX:', xhr.statusText);
                    }
                }
            });
        }

        switch (typeValue) {
            case '0':
                disableAllSelects();
                disableAllInputs();
                $('#CódigoInput').val('');
                $('#descriptionInput').val('');
                enableSelect('vehiculoidInput');
                enableSelect('typeidInput');
                clearAllRelationSelectFields('typeidInput');
                break;
            case '1':
                disableAllSelects();
                disableAllInputs();
                enableSelect('positionidInput');
                enableSelect('typeidInput');
                $('#CódigoInput').val('');
                $('#descriptionInput').val('Tramo--TrT');
                clearAllRelationSelectFields('typeidInput');
                break;
            case '2':
                disableAllSelects();
                disableAllInputs();
                $('#longitInput').prop('readonly', false);
                $('#cortecmInput').prop('readonly', false);
                $('#lccmInput').prop('readonly', false);
                $('#abrazlongcmInput').prop('readonly', false);
                enableSelect('typeidInput');
                enableSelect('materialidInput');
                enableSelect('porcendespunteInput');
                $('#CódigoInput').val('');
                $('#descriptionInput').val('TrR-');
                clearAllRelationSelectFields('typeidInput');
                break;
            case '3':                
                disableAllSelects();
                disableAllInputs();
                $('#longitInput').prop('readonly', false);
                enableSelect('typeidInput');
                enableSelect('materialgrapaidInput');
                $('#CódigoInput').val('');
                $('#descriptionInput').val('');
                clearAllRelationSelectFields('typeidInput');
                break;
            default:
                console.log('Valor no reconocido');
        }

        // Aplica los estilos después de actualizar los valores
        applyStylesToInputs();
    });

    $('#vehiculoidInput').off('change').on('change', (event) => {
        const vehiculosId = $(event.target).val();
        console.log('ID del vehículo seleccionado:', vehiculosId);

        clearRelationSelectField('modelidInput');

        // Verifica si el valor seleccionado es válido
        if (vehiculosId === undefined || vehiculosId === null || vehiculosId === '') {
            console.log('No se seleccionó ningún valor válido.');
            return; // Salir de la función si no hay un valor válido
        }        

        if (vehiculosId) {
            $.ajax({
                url: `/admin/obtener-vehiculos/${vehiculosId}`,
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                },
                dataType: 'json',
                success: (data) => {
                    console.log('Respuesta de la solicitud AJAX:', data);

                    const tomSelectInstance = $('#modelidInput')[0].tomselect;

                    if (tomSelectInstance) {
                        tomSelectInstance.clearOptions();
                        tomSelectInstance.addOption({ value: '', text: 'Seleccione una opción' });

                        data.forEach((modelo) => {
                            tomSelectInstance.addOption({ value: modelo.id, text: modelo.modelo_detalle });
                        });

                        tomSelectInstance.enable();
                    }

                    // Aplica los estilos después de actualizar los valores
                    applyStylesToInputs();

                    //HABLILITAMOS EL MODELO
                    enableSelect('modelidInput');
                },
                error: (xhr, status, error) => {
                    console.error('Error en la solicitud AJAX:', status, error);
                    alert('Hubo un error al intentar obtener los modelos. Por favor, inténtelo nuevamente.');
                },
            });
        }
    });

    $('#modelidInput').off('change').on('change', (event) => {
        const selectedValue = $(event.target).val();
        $('#CódigoInput').val('');

        if (selectedValue === undefined || selectedValue === null || selectedValue === '') {
            return;
        }

        $.ajax({
            url: `/admin/obtener-codigo-vehiculo/${selectedValue}`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: (response) => {                  
                _nombreCorto = response.nombrecorto;
                _modeloVehiculo = response.modelo_detalle;
                _numero = response.numero;

                const datos = _numero + ' -';
                $('#descriptionInput').val(_nombreCorto + ' ' + _modeloVehiculo + ' a');
                $('#CódigoInput').val(datos);

                _vehiculoId = _numero;

                // Aplica los estilos después de actualizar los valores
                applyStylesToInputs();

                $('#apodoInput').prop('readonly', false);
                enableSelect('yearidInput');
            },                
            error: (xhr) => {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    console.error(xhr.responseJSON.error); 
                } else {
                    console.error('Error en la solicitud AJAX:', xhr.statusText); 
                }
            }
        });
    });

    $('#yearidInput').off('change').on('change', (event) => {
        const selectedValue = $('#yearidInput').val();

        if (selectedValue === undefined || selectedValue === null || selectedValue === '') {
            return;
        }

        _yearId = $(event.target).val();
        _year = $('#yearidInput option:selected').text();
            
        if (selectedValue === '0') {
            $('#descriptionInput').val(_nombreCorto + ' ' + _modeloVehiculo + ' a' + _year.slice(-2));
        }
    
        enableSelect('positionidInput');

        // Aplica los estilos después de actualizar los valores
        applyStylesToInputs();
    });

    $('#positionidInput').off('change').on('change', (event) => {
        _positionId = $(event.target).val();
        _position = $('#positionidInput option:selected').text();
    
        const selectedValue = $('#typeidInput').val();        
    
        if (_positionId === undefined || _positionId === null || _positionId === '') {
            return;
        }

        let codigo = '';
    
        codigo = _tipo + _vehiculoId + _position + '-';
        $('#CódigoInput').val(codigo.trim());
    
        if (selectedValue === '0') {
            codigo = _vehiculoId + _position + '-';
            $('#CódigoInput').val(codigo.trim());
    
            $('#descriptionInput').val(_nombreCorto + ' ' + _modeloVehiculo + ' ' + _position.slice(-1) + ' a' + _year.slice(-2));

            $('#identidadInput').prop('readonly', false);
            enableSelect('materialidInput');
            enableSelect('tipohojaidInput');
            $('#distcccmInput').prop('readonly', false);
            $('#lccmInput').prop('readonly', false);
            enableSelect('diatcidInput');
            enableSelect('tiposbujesidInput');
            enableSelect('bujelcidInput');
            enableSelect('bujellidInput');
            enableSelect('brioidInput');
        }
    
        if (selectedValue === '1') {
            codigo = _tipo + _position + '-';
            $('#CódigoInput').val(codigo.trim());
    
            $('#descriptionInput').val('Tramo--TrT ' + _position);

            $('#identidadInput').prop('readonly', false);
            enableSelect('materialidInput');
            enableSelect('tipohojaidInput');
            $('#distcccmInput').prop('readonly', false);
            $('#lccmInput').prop('readonly', false);
            enableSelect('roleolcidInput');
            enableSelect('roleollidInput');
            enableSelect('diatcidInput');
            enableSelect('bujelcidInput');
            enableSelect('bujellidInput');
        }
    
        // Aplica los estilos después de actualizar los valores
        applyStylesToInputs();
    });

    $('#longitInput').off('keyup').on('keyup', (event) => {
        _longitId = $(event.target).val();
    
        const selectedValue = $('#typeidInput').val();           
    
        if (selectedValue === undefined || selectedValue === null || selectedValue === '') {
            return;
        }

        if (selectedValue === '2') {
            const codigo = _tipo + _materialId + '-R' + _longitId;
            $('#CódigoInput').val(codigo.trim());
            $('#descriptionInput').val('TramoRecto--TrR ' + _materialCombinado + _longitId);
        }     
    
        if (selectedValue === '3') {
            $('#descriptionInput').val('Grapa ' + _materialGrapa + ' ' + _longitId + 'cm');
        }
    
        // Aplica los estilos después de actualizar los valores
        applyStylesToInputs();
    });

    $('#materialgrapaidInput').off('change').on('change', (event) => {
        const selectedValue = $(event.target).val();
    
        // Verifica si el valor seleccionado es válido
        if (selectedValue === undefined || selectedValue === null || selectedValue === '') {
            console.log('No se seleccionó ningún valor válido.');
            return; // Salir de la función si no hay un valor válido
        }

        $.ajax({
            url: `/admin/obtener-inches-material-grapa/${selectedValue}`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: (response) => {
                _materialGrapa = response.inches;
                console.log("Estas llengando aqui");

                $('#descriptionInput').val('Grapa Edwin ' + _materialGrapa);
    
                // Aplica los estilos después de actualizar los valores
                applyStylesToInputs();
            },                
            error: (xhr) => {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    console.error(xhr.responseJSON.error); 
                } else {
                    console.error('Error en la solicitud AJAX:', xhr.statusText); 
                }
            }
        });
    });

    $('#identidadInput').off('keyup').on('keyup', (event) => {
        const selectedValue = $('#identidadInput').val();
        const typeidInput = $('#typeidInput').val();

        if (selectedValue === undefined || selectedValue === null || selectedValue === '') {
            return;
        }

        _identidad = $(event.target).val();
        let codigo = '';
    
        codigo = _tipo + _vehiculoId + _position + '-' + _identidad;
        $('#CódigoInput').val(codigo.trim());
    
        if (typeidInput === '0') {
            codigo = _vehiculoId + _position + '-' + _identidad;
            $('#CódigoInput').val(codigo.trim());
    
            // Obtener el valor del campo de entrada
            let noIdent = $('#identidadInput').val();
    
            // Convertir el valor a número
            let noIdentNum = parseInt(noIdent, 10);
    
            // Verificar si el número es impar o par y asignar el valor correspondiente
            let dltTrs;
            if (noIdentNum % 2 === 1) { // Impar
                dltTrs = "T";
            } else if (noIdentNum % 2 === 0) { // Par
                dltTrs = "D";
            } else {
                dltTrs = "";
            }
    
            $('#descriptionInput').val(_nombreCorto + ' ' + _modeloVehiculo + ' ' + dltTrs + _position.slice(-1) + ' a' + _year.slice(-2));
        }
    
        if (selectedValue === '1') {
            codigo = _tipo + _position + '-' + _identidad;
            $('#CódigoInput').val(codigo.trim());
    
            $('#descriptionInput').val('TrT tt1 D a');
        }
    
        // Aplica los estilos después de actualizar los valores
        applyStylesToInputs();
    });

    $('#materialidInput').off('change').on('change', (event) => {
        const selectedValue = $(event.target).val();
        const typeidInput = $('#typeidInput').val();
    
        _materialId = selectedValue;
        _material = $('#materialidInput option:selected').text();
    
        if (selectedValue === undefined || selectedValue === null || selectedValue === '') {
            return;
        }
    
        if (typeidInput === '1') {
            $('#descriptionInput').val('Tramo--Trt ' + _position);
        }
    
        if (typeidInput === '2') {
            const codigo = _tipo + _materialId + '-R';
            $('#CódigoInput').val(codigo.trim());
        }    
    
        $.ajax({
            url: `/admin/obtener-material-combinado-material/${selectedValue}`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: (response) => {
                _materialCombinado = response.material_combinado;
    
                if (typeidInput === '2') {
                    $('#descriptionInput').val('TramoRecto--TrR ' + _materialCombinado);
                }
    
                // Aplica los estilos después de actualizar los valores
                applyStylesToInputs();
            },                
            error: (xhr) => {
                if (xhr.responseJSON && xhr.responseJSON.error) {
                    console.error(xhr.responseJSON.error); 
                } else {
                    console.error('Error en la solicitud AJAX:', xhr.statusText); 
                }
            }
        });
    });

    $('#tipohojaidInput').off('change').on('change', (event) => {
        const selectedValue = $(event.target).val();
        let tipohojaidInput = $('#tipohojaidInput option:selected').text();
    
        if (selectedValue === undefined || selectedValue === null || selectedValue === '') {
            return;
        }

        $.ajax({
            url: `/admin/obtener-imagen-tipo-hoja/${selectedValue}`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: (response) => {
                $('#imagePreviewTipoHoja').attr('src', response.imageUrl);

                if (positionidInput === 'Standard' || positionidInput === 'Berlin' || positionidInput === 'Lisa' || positionidInput === 'Parabolica' || positionidInput === 'Tra' || positionidInput === 'Reverso') {
                    // HABILITAMOS
                    enableSelect('roleolcidInput');
                    enableSelect('roleollidInput');
    
                    // DESHABILITAMOS
                    $('#2roleolcInput').prop('readonly', true);
                    $('#2roleollcmInput').prop('readonly', true);
                    disableSelect('2porcenroleoInput');
                    disableSelect('diambocadoidInput');
                    disableSelect('anchoteidInput');
                    disableSelect('destajeidInput');
                    disableSelect('porcendespunteInput');
                } else if (positionidInput === 'Camello') {
                    // HABILITAMOS
                    enableSelect('diambocadoidInput');
    
                    // DESHABILITAMOS
                    disableSelect('roleolcidInput');
                    disableSelect('roleollidInput');
                    $('#2roleolcInput').prop('readonly', true);
                    $('#2roleollcmInput').prop('readonly', true);
                    disableSelect('2porcenroleoInput');
                    disableSelect('anchoteidInput');
                    disableSelect('destajeidInput');
                    disableSelect('porcendespunteInput');
                } else if (positionidInput === 'Cam Te') {
                    // HABILITAMOS
                    enableSelect('anchoteidInput');
    
                    // DESHABILITAMOS
                    disableSelect('roleolcidInput');
                    disableSelect('diambocadoidInput');
                    disableSelect('roleollidInput');
                    $('#2roleolcInput').prop('readonly', true);
                    $('#2roleollcmInput').prop('readonly', true);
                    disableSelect('2porcenroleoInput');
                    disableSelect('destajeidInput');
                    disableSelect('porcendespunteInput');
                } else if (positionidInput === 'Otros') {
                    // HABILITAMOS
                    enableSelect('roleolcidInput');
                    enableSelect('roleollidInput');
                    $('#2roleolcInput').prop('readonly', false);
                    $('#2roleollcmInput').prop('readonly', false);
                    enableSelect('2porcenroleoInput');
                    enableSelect('diambocadoidInput');
                    enableSelect('anchoteidInput');
                    enableSelect('destajeidInput');
                    enableSelect('porcendespunteInput');
                } else {
                    // DESHABILITAMOS TODO SI NO COINCIDE CON NINGUNO
                    disableSelect('roleolcidInput');
                    disableSelect('roleollidInput');
                    $('#2roleolcInput').prop('readonly', true);
                    $('#2roleollcmInput').prop('readonly', true);
                    disableSelect('2porcenroleoInput');
                    disableSelect('diambocadoidInput');
                    disableSelect('anchoteidInput');
                    disableSelect('destajeidInput');
                    disableSelect('porcendespunteInput');
                }
            },
            error: (xhr) => {
                console.error("Error al cargar la imagen");
            }
        });
    });

    $('#bujelcidInput').off('change').on('change', (event) => {
        const selectedValue = $(event.target).val();
    
        if (selectedValue === '' || selectedValue === '0' || selectedValue === '3') {
            return;
        }

        $.ajax({
            url: `/admin/obtener-imagen-buje-lc/${selectedValue}`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken 
            },
            success: (response) => {
                $('#imagePreviewBujeLC').attr('src', response.imageUrl);
            },
            error: (xhr) => {
                console.error("Error al cargar la imagen");
            }
        });
    });

    $('#bujellidInput').off('change').on('change', (event) => {
        const selectedValue = $(event.target).val();
    
        if (selectedValue === '' || selectedValue === '0' || selectedValue === '3') {
            return;
        }

        $.ajax({
            url: `/admin/obtener-imagen-buje-ll/${selectedValue}`, 
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': csrfToken 
            },
            success: (response) => {
                $('#imagePreviewBujeLL').attr('src', response.imageUrl); 
            },
            error: (xhr) => {
                console.error("Error al cargar la imagen");
            }
        });
    });


});