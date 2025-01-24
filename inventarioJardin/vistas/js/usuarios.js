$(".tablas").on("click", ".btnEditarUsuarios", function() {
    var idUsuario = $(this).attr("idUsuario");  // Obtiene el valor del atributo idUsuario
    console.log(idUsuario);  // Verifica si el valor de idUsuario es el esperado

    var $datos = new FormData();
    $datos.append("idUsuario", idUsuario);

    $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: $datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(respuesta) {
            console.log(respuesta);  // Verifica si los datos que recibes son correctos


            $("#id").val(respuesta["id"]);

            $("#editarNombre").val(respuesta["nombre"]);
            $("#editarUsuario").val(respuesta["usuario"]);
            // Asignar el valor al campo select
            $("#editarPerfil").val(respuesta["perfil"]);
        },
        error: function(xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);  // Verifica si hay algún error en la solicitud AJAX
        }
    });
});



/*=============================================
ELIMINAR USUARIO
=============================================*/
$(".tablas").on("click", ".btnEliminarUsuario", function(){

    var idUsuario = $(this).attr("idUsuario");
    
  
    swal({
      title: '¿Está seguro de eliminar el usuario?',
      text: "¡Si no lo está puede cancelar la accíón!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: '¡Si, borrar usuario!'
    }).then(function(result){
  
      if(result.value){
  
        window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario;
  
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

