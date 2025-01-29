$(document).on("click", ".btnEditarEmpresa", function() {
    let idEmpresa = $(this).attr("idEmpresa");

    let datos = new FormData();
    datos.append("idEmpresa", idEmpresa);

    $.ajax({
        url: "ajax/empresa.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            // Asignamos los valores a los campos del modal
            $("#idEmpresa").val(respuesta.id);  // Asignar el id
            $("#editarEmpresa").val(respuesta.nombre);
            $("#editarTelefono").val(respuesta.telefono);
            $("#editarSitioWeb").val(respuesta.sitioweb);
            $("#editarDireccion").val(respuesta.direccion);
        }
    });
});
