$(".tablas").on("click", ".btnEditarClientes", function() {
    var idCliente = $(this).attr("idCliente");  // Obtiene el valor del atributo idCliente
    console.log(idCliente);  // Verifica si el valor de idCliente es el esperado

    var $datos = new FormData();
    $datos.append("idCliente", idCliente);

    $.ajax({
        url: "ajax/clientes.ajax.php",
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
ELIMINAR clientes
=============================================*/
$(".tablas").on("click", ".btnEliminarClientes", function(){

    var idCliente = $(this).attr("idCliente");
    
  
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
  
        window.location = "index.php?ruta=clientes&idCliente="+idCliente;
  
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

