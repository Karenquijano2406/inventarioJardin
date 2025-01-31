$(".tablas").on("click", ".btnEditarCategoria", function() {
    var idCategoria = $(this).attr("idCategoria");  // Obtiene el valor del atributo idUsuario
    console.log(idCategoria);  // Verifica si el valor de idUsuario es el esperado

    var $datos = new FormData();
    $datos.append("idCategoria", idCategoria);

    $.ajax({
        url: "ajax/categorias.ajax.php",
        method: "POST",
        data: $datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);  // Verifica si los datos que recibes son correctos


            $("#id").val(respuesta["id"]);

            $("#editarNombreC").val(respuesta["nombre"]);
            
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);  // Verifica si hay algún error en la solicitud AJAX
        }
    });
});



/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function(){

    var idCategoria = $(this).attr("idCategoria");
    
  
    swal({
      title: '¿Está seguro de eliminar la categoria?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, borrar categoria!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
  
      }
  
    })
  
  })



  $(".display").on("click", ".btnImprimirExcelCategorias", function(){

    window.open("vistas/modulos/categorias-excel.php?categoriasExcel=categoriasExcel", "blank");
  });


  $(".display").on("click", ".btnImprimirWordCategorias", function(){

    window.open("vistas/modulos/categorias-word.php?categoriasWord=categoriasWord", "blank");
  });


  $(".display").on("click", ".btnImprimirCSVCategorias", function(){

    window.open("vistas/modulos/categorias-csv.php?categoriasCSV=categoriasCSV", "blank");
  });


   $(".display").on("click", ".btnImprimirPDFCategorias", function(){

  window.open("extensiones/tcpdf/pdf/categorias-pdf.php", "blank");
   });


   $(".display").on("click", ".btnImprimirPDFHorizontalCategorias", function(){

    window.open("extensiones/tcpdf/pdf/categorias-horizontal-pdf.php", "blank");
     });

