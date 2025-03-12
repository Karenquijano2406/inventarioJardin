$(".actualizarnotificaciones").click(function(e) {
    e.preventDefault();

    var item = $(this).attr("item");
    

    var $datos = new FormData();
    $datos.append("item", item);

    $.ajax({
        url: "ajax/notificaciones.ajax.php",
        method: "POST",
        data: $datos,
        cache: false,
        contentType: false,
        processData: false,
        
        success: function(respuesta) {
            console.log(respuesta);  // Verifica si los datos que recibes son correctos

            if (respuesta == "ok") {
                if (item == "valorStock") {

                    window.location = "productos";
                    
                }
                
            }

            
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);  // Verifica si hay algún error en la solicitud AJAX
        }
    });
});