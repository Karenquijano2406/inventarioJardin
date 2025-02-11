$(".tablas").on("click", ".btnEditarProductos", function() {
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


            $("#id").val(respuesta["id"]);

            $("#editarCategoria").html(respuesta["categoria"]);
            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarDescripcion").val(respuesta["descripcion"]);
            $("#editarPrecioCompra").val(respuesta["precioCompra"]);
            $("#editarPrecioVenta").val(respuesta["precioVenta"]);
            $("#editarStock").val(respuesta["stock"]);
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);  // Verifica si hay algún error en la solicitud AJAX
        }
    });
});



/*=============================================
ELIMINAR productos
=============================================*/
$(".tablas").on("click", ".btnEliminarProductos", function(){

    var idProducto = $(this).attr("idProducto");
    
  
    swal({
      title: '¿Está seguro de eliminar el producto?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, borrar producto!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=productos&idProducto="+idProducto;
  
      }
  
    })
  
  })


  $(".display").on("click", ".btnImprimirExcelProductos", function(){

    window.open("vistas/modulos/productos-excel.php?productosExcel=productosExcel", "blank");
  });


  $(".display").on("click", ".btnImprimirWordProductos", function(){

    window.open("vistas/modulos/productos-word.php?productosWord=productosWord", "blank");
  });


  $(".display").on("click", ".btnImprimirCSVProductos", function(){

    window.open("vistas/modulos/productos-csv.php?productosCSV=productosCSV", "blank");
  });


   $(".display").on("click", ".btnImprimirPDFProductos", function(){

  window.open("extensiones/tcpdf/pdf/productos-pdf.php", "blank");
   });


   $(".display").on("click", ".btnImprimirPDFHorizontalProductos", function(){

    window.open("extensiones/tcpdf/pdf/productos-horizontal-pdf.php", "blank");
     });

