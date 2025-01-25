/** Subir logo */
$("#SubirLogo").change(function () {

    var imagenLogo = this.files[0]; // Obtener el archivo seleccionado

    /** Validamos el formato de la imagen si es JPG o PNG */
    if (imagenLogo["type"] != "image/jpeg" && imagenLogo["type"] != "image/png") {
        // Si el formato no es válido, reiniciamos el input y mostramos una alerta
        $("#SubirLogo").val(""); // Limpiar el campo del archivo seleccionado

        swal({
            title: '¡Error al subir la imagen!',
            text: "¡La imagen debe estar en formato JPG o PNG!",
            type: 'error',  // 'type' para SweetAlert 1.x
            confirmButtonText: 'Cerrar'
        });
        
        

    } else if (imagenLogo["size"] > 2000000) {
        // Validar que el tamaño no supere los 2 MB
        $("#SubirLogo").val(""); // Limpiar el campo del archivo seleccionado

        swal({
            title: '¡Error al subir la imagen!',
            text: "¡La imagen no debe pesar más de 2 MB!",
            icon: 'error',
            button: "Cerrar"
        });

    } else {
        // Si pasa las validaciones, previsualizamos la imagen
        var datosImagen = new FileReader();
        datosImagen.readAsDataURL(imagenLogo);

        $(datosImagen).on("load", function (event) {
            var rutaImagen = event.target.result;

            // Actualizar la previsualización
            $(".previsualizarLogo").attr("src", rutaImagen);
        });
    }





    
});

