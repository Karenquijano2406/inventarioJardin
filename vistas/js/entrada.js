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




/*-------------------- Reportes de prodcutos de entradas----------*/
$(".display").on("click", ".btnImprimirExcelProductosEntradas", function(){

    window.open("vistas/modulos/productos-entradas-excel.php?productosEExcel=productosEExcel", "blank");
  });


  $(".display").on("click", ".btnImprimirWordProductosEntradas", function(){

    window.open("vistas/modulos/productos-entradas-word.php?productosEWord=productosEWord", "blank");
  });


  $(".display").on("click", ".btnImprimirCSVProductosEntradas", function(){

    window.open("vistas/modulos/productos-entradas-csv.php?productosECSV=productosECSV", "blank");
  });


   $(".display").on("click", ".btnImprimirPDFProductosEntradas", function(){

  window.open("extensiones/tcpdf/pdf/productos-entradas-pdf.php", "blank");
   });


   $(".display").on("click", ".btnImprimirPDFHorizontalProductosEntradas", function(){

    window.open("extensiones/tcpdf/pdf/productos-entradas-horizontal-pdf.php", "blank");
     });

/*-------------------- FIN  Reportes de prodcutos de entradas----------*/



/*-------------------- Reportes de prodcutos de salidas----------*/
$(".display").on("click", ".btnImprimirExcelProductosSalidas", function(){

    window.open("vistas/modulos/productos-salidas-excel.php?productosSExcel=productosSExcel", "blank");
  });


  $(".display").on("click", ".btnImprimirWordProductosSalidas", function(){

    window.open("vistas/modulos/productos-salidas-word.php?productosSWord=productosSWord", "blank");
  });


  $(".display").on("click", ".btnImprimirCSVProductosSalidas", function(){

    window.open("vistas/modulos/productos-salidas-csv.php?productosSCSV=productosSCSV", "blank");
  });


   $(".display").on("click", ".btnImprimirPDFProductosSalidas", function(){

  window.open("extensiones/tcpdf/pdf/productos-salidas-pdf.php", "blank");
   });


   $(".display").on("click", ".btnImprimirPDFHorizontalProductosSalidas", function(){

    window.open("extensiones/tcpdf/pdf/productos-salidas-horizontal-pdf.php", "blank");
     });

/*-------------------- FIN  Reportes de prodcutos de salidas----------*/

