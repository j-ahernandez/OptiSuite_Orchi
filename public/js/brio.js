$(() => {
    $("#inchesInput").attr("readonly", true);

    // Agregar estilo al elemento inchesInput
    $("#inchesInput").css({
        'color': 'black',  // Fondo blanco
        'opacity': '1'  // No opaco
    });    

    //Brios Resources
    $("#cmInput").on("input", () => {
        var cmInput = $("#cmInput").val();
        var cmValue = parseFloat(cmInput);

        if (!isNaN(cmValue)) {
            const inchesValue = cmValue / 2.54;
            $("#inchesInput").val(inchesValue.toFixed(2));
        } else {
            $("#inchesInput").val("");
        }
    });
});