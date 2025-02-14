$(".tablas").on("click", ".btnEntradaProductos", function() {
    var idProducto = $(this).attr("idProducto");  // Obtiene el valor del atributo idProducto
    console.log(idProducto);  // Verifica si el valor de idProducto es el esperado

    var $datos = new FormData();
    $datos.append("idProducto", idProducto);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: $datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);  // Verifica si los datos que recibes son correctos


            $("#idEntrada").val(respuesta["id"]);

            
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);  // Verifica si hay algún error en la solicitud AJAX
        }
    });
});




// para las salidas
$(".tablas").on("click", ".btnSalidaProductos", function() {
    var idProducto = $(this).attr("idProducto");  // Obtiene el valor del atributo idProducto
    console.log(idProducto);  // Verifica si el valor de idProducto es el esperado

    var $datos = new FormData();
    $datos.append("idProducto", idProducto);

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: $datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);  // Verifica si los datos que recibes son correctos


            $("#idSalida").val(respuesta["id"]);
            $("#categoriap").val(respuesta["categoria"]);
            $("#nombreProductoSalida").val(respuesta["nombre"]);

            
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);  // Verifica si hay algún error en la solicitud AJAX
        }
    });
});