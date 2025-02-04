$(".tablas").on("click", ".btnEditarProveedores", function() {
    var idProveedores = $(this).attr("idProveedores");  // Obtiene el valor del atributo idProveedores
    console.log(idProveedores);  // Verifica si el valor de idProveedores es el esperado

    var $datos = new FormData();
    $datos.append("idProveedores", idProveedores);

    $.ajax({
        url: "ajax/proveedores.ajax.php",
        method: "POST",
        data: $datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);  // Verifica si los datos que recibes son correctos


            $("#id").val(respuesta["id"]);

            $("#editarEmpresa").val(respuesta["empresa"]);
            // Asignar el valor al campo select
            $("#editarTipoEmpresa").html(respuesta["tipoEmpresa"]);
            $("#editarCorreo").val(respuesta["correo"]);
            $("#editarTelefono").val(respuesta["telefono"]);
            $("#editarDireccion").val(respuesta["direccion"]);
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);  // Verifica si hay algún error en la solicitud AJAX
        }
    });
});



/*=============================================
ELIMINAR proveedores
=============================================*/
$(".tablas").on("click", ".btnEliminarProveedores", function(){

    var idProveedores = $(this).attr("idProveedores");
    
  
    swal({
      title: '¿Está seguro de eliminar el proveedor?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, borrar proveedor!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=proveedores&idProveedores="+idProveedores;
  
      }
  
    })
  
  })


  $(".display").on("click", ".btnImprimirExcel", function(){

    window.open("vistas/modulos/usuarios-excel.php?usuariosExcel=usuariosExcel", "blank");
  });


  $(".display").on("click", ".btnImprimirWord", function(){

    window.open("vistas/modulos/usuarios-word.php?usuariosWord=usuariosWord", "blank");
  });


  $(".display").on("click", ".btnImprimirCSV", function(){

    window.open("vistas/modulos/usuarios-csv.php?usuariosCSV=usuariosCSV", "blank");
  });


   $(".display").on("click", ".btnImprimirPDF", function(){

  window.open("extensiones/tcpdf/pdf/usuarios-pdf.php", "blank");
   });


   $(".display").on("click", ".btnImprimirPDFHorizontal", function(){

    window.open("extensiones/tcpdf/pdf/usuarios-horizontal-pdf.php", "blank");
     });

