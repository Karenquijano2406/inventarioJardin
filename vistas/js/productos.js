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
$(".tablas").on("click", ".btnEliminarClientes", function(){

    var idProducto = $(this).attr("idProducto");
    
  
    swal({
      title: '¿Está seguro de eliminar el cliente?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, borrar cliente!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=clientes&idProducto="+idProducto;
  
      }
  
    })
  
  })


  $(".display").on("click", ".btnImprimirExcelClientes", function(){

    window.open("vistas/modulos/clientes-excel.php?clientesExcel=clientesExcel", "blank");
  });


  $(".display").on("click", ".btnImprimirWordClientes", function(){

    window.open("vistas/modulos/clientes-word.php?clientesWord=clientesWord", "blank");
  });


  $(".display").on("click", ".btnImprimirCSVClientes", function(){

    window.open("vistas/modulos/clientes-csv.php?clientesCSV=clientesCSV", "blank");
  });


   $(".display").on("click", ".btnImprimirPDFClientes", function(){

  window.open("extensiones/tcpdf/pdf/clientes-pdf.php", "blank");
   });


   $(".display").on("click", ".btnImprimirPDFHorizontalClientes", function(){

    window.open("extensiones/tcpdf/pdf/clientes-horizontal-pdf.php", "blank");
     });

