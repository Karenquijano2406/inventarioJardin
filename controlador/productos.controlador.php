<?php 

class ControladorProductos {

    static public function ctrMostrarProductos($item, $valor) {
        $tabla = "productos";
        $respuesta = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        return $respuesta;
    }


    static public function ctrMostrarProductosEntradas($item, $valor) {
        $tabla = "entradasp";
        $respuesta = ModeloProductos::mdlMostrarProductosEntradas($tabla, $item, $valor);
        return $respuesta;
    }


    static public function ctrMostrarProductosSalidas($item, $valor) {
        $tabla = "salidasp";
        $respuesta = ModeloProductos::mdlMostrarProductosSalidas($tabla, $item, $valor);
        return $respuesta;
    }


    static public function ctrCrearProductos() {
        if (isset($_POST["nuevoNombre"])) {
            $tabla = "productos";

           

            $datos = array("categoria" => $_POST['categoria'],
                "nombre" => $_POST['nuevoNombre'],
                "descripcion" => $_POST['nuevoDescripcion'],
                "precioCompra" => $_POST['nuevoPrecioCompra'],
                "precioVenta" => $_POST['nuevoPrecioVenta'],
                "stock" => $_POST['nuevoStock']
            );

            $respuesta = ModeloProductos::mdlIngresarProductos($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El producto ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "El producto no ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';
            }
        }
        
    }

    static public function ctrEditarProductos() {
        if (isset($_POST["editarNombre"])) {
            $tabla = "productos";

            

            $datos = array("id" => $_POST['id'],
                "categoria" => $_POST['editarCategoria'],
                "nombre" => $_POST['editarNombre'],
                "descripcion" => $_POST['editarDescripcion'],
                "precioCompra" => $_POST['editarPrecioCompra'],
                "precioVenta" => $_POST['editarPrecioVenta'],
                "stock" => $_POST['editarStock']
            );

            $respuesta = ModeloProductos::mdlEditarProductos($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "El producto ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';

            }else {

                echo '<script>
                    swal({
                        type: "error",
                        title: "El producto no ha sido editado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';
                
            }

        }


    }



    static public function ctrBorrarProductos(){

        if (isset($_GET['idProducto'])) {
            
            $tabla = "productos";
            $datos = $_GET['idProducto'];

            $respuesta = ModeloProductos::mdlBorrarProductos($tabla,$datos);

            if ($respuesta == "ok") {
                
                echo '<script>
                    swal({
                        type: "success",
                        title: "El producto ha sido eliminado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';

            }
        }


    }




    static public function ctrCrearEntradasProductos() {
        if (isset($_POST["nombreEmpresa"])) {
            $tabla = "entradasp";

           

            $datos = array("nombreEmpresa" => $_POST['nombreEmpresa'],
                "tipoEmpresa" => $_POST['tipoEmpresa'],
                "nombreProducto" => $_POST['nombreProducto'],
                "entradap" => $_POST['entradaStock'],
               
            );


            $respuesta = ModeloProductos::mdlIngresarProductosEntrada($tabla, $datos);

            $tablaDos = "productos";
            $item = "id";
            $valor = $_POST['idEntrada'];
            $traerProducto = ControladorProductos::ctrMostrarProductos($item,$valor);
            
            $itemDos = "stock";

            foreach ($traerProducto as $key => $datos) {
                $resultado = $traerProducto["stock"] + $_POST['entradaStock'];
                $modificar = ModeloProductos::mdlActualizarProductosEntrada($tablaDos,$itemDos,$valor,$resultado);



            }



            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "La entrada ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "La entrada no ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';
            }
        }



        
    }



    static public function ctrCrearSalidasProductos() {
        if (isset($_POST["nombreProductoSalida"])) {

            
            $item = "id";
            $valor = $_POST['idSalida'];
            $traerProducto = ControladorProductos::ctrMostrarProductos($item,$valor);

            // var_dump($traerProducto);


            if ($_POST['salidaStock'] > $traerProducto["stock"]) {
                
                echo '<script>
                    swal({
                        type: "error",
                        title: "La salida no puede ser mayor que el número de registro en stock en la base de datos",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';

            }else {

            
            // $item = "id";
            // $valor = $_POST['idSalida'];
            // $traerProducto = ControladorProductos::ctrMostrarProductos($item,$valor);



               

                $tabla = "salidasp";
                



                // //se le pone el numero 3 para que a partir de 3 productos se empiece a enviar las notificaciones de que es necesario comprar mas producto
                // if ($traerProducto["stock"] <= 3) {

                //     //para notificaciones
                // $tablaDos = "notificacionesstock";


                //  // para las notificaciones del stock disponible o si falta por comprar producto
                // $datosDos = array("idproducto" => $_POST['idSalida'],
                // "stock" => $_POST['salidaStock'],
                //  "valorStock" =>1
                        
                //     );

                //         //para las notificaciones
                //         $respuestaDos = ModeloNotificaciones::mdlIngresarProductosNotificaciones($tablaDos, $datosDos);

                // }

           

            $datos = array( "categoriap" => $_POST['categoriap'],
                "nombrep" => $_POST['nombreProductoSalida'],
                "nombreCliente" => $_POST['nombreCliente'],
                "salidap" => $_POST['salidaStock'],
               
            );



            $respuesta = ModeloProductos::mdlIngresarProductosSalidas($tabla, $datos);

            
            $tablaDos = "productos";
            $itemDos = "stock";

            foreach ($traerProducto as $key => $datos) {
                $resultado = $traerProducto["stock"] - $_POST['salidaStock'];
                $modificar = ModeloProductos::mdlActualizarProductosSalidas($tablaDos,$itemDos,$valor,$resultado);


            }

            



            $item = "id";
            $valor = $_POST['idSalida'];
            $traerProducto = ControladorProductos::ctrMostrarProductos($item,$valor);



            //se le pone el numero 3 para que a partir de 3 productos se empiece a enviar las notificaciones de que es necesario comprar mas producto
            if ($traerProducto["stock"] <= 3) {

                //para notificaciones
            $tablaDos = "notificacionesstock";


             // para las notificaciones del stock disponible o si falta por comprar producto
            $datosDos = array("idproducto" => $_POST['idSalida'],
            "stock" => $_POST['salidaStock'],
             "valorStock" =>1
                    
                );

                    //para las notificaciones
                    $respuestaDos = ModeloNotificaciones::mdlIngresarProductosNotificaciones($tablaDos, $datosDos);

            }





            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        type: "success",
                        title: "La salida ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';
            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "La salida no ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "productos";
                        }
                    });
                </script>';
            }

            }



            
        }



        
    }



    public function ctrDescargarReportesExcelProductos() {
        if (isset($_GET["productosExcel"])) {
            
            $tabla = "productos";
            $item = null;
            $valor = null;
    
            // Obtener los productos desde el modelo
            $clientes = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        }
    
        // Nombre del archivo Excel a generar
        $name = $_GET["productosExcel"] . '.xls';
    
        // Configuración de los encabezados HTTP para descarga de archivo Excel
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Iniciar la tabla y definir los encabezados de las columnas
        echo utf8_decode("<table border='1'>
            <tr>
                <td style='text-align:center; font-weight:bold;'>Categoría</td>
                <td style='text-align:center; font-weight:bold;'>Nombre</td>
                <td style='text-align:center; font-weight:bold;'>Descripción</td>
                <td style='text-align:center; font-weight:bold;'>Precio Compra</td>
                <td style='text-align:center; font-weight:bold;'>Precio Venta</td>
                <td style='text-align:center; font-weight:bold;'>Stock</td>
            </tr>");
    
        // Recorrer los usuarios y generar las filas de la tabla
        foreach ($clientes as $key => $datos) {
            echo utf8_decode("<tr>
                <td style='text-align:center;'>" . $datos["categoria"] . "</td>
                <td style='text-align:center;'>" . $datos["nombre"] . "</td>
                <td style='text-align:center;'>" . $datos["descripcion"] . "</td>
                <td style='text-align:center;'>$ " . $datos["precioCompra"] . "</td>
                <td style='text-align:center;'>$ " . $datos["precioVenta"] . "</td>
                <td style='text-align:center;'>" . $datos["stock"] . "</td>
            </tr>");
        }
    
        // Cerrar la tabla
        echo "</table>";
        exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }


    public function ctrDescargarReportesExcelProductosEntradas() {
        if (isset($_GET["productosEExcel"])) {
            
            $tabla = "entradasp";
            $item = null;
            $valor = null;
    
            // Obtener los productos desde el modelo
            $clientes = ModeloProductos::mdlMostrarProductosEntradas($tabla, $item, $valor);
        }
    
        // Nombre del archivo Excel a generar
        $name = $_GET["productosEExcel"] . '.xls';
    
        // Configuración de los encabezados HTTP para descarga de archivo Excel
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Iniciar la tabla y definir los encabezados de las columnas
        echo utf8_decode("<table border='1'>
            <tr>
                <td style='text-align:center; font-weight:bold;'>Nombre Empresa</td>
                <td style='text-align:center; font-weight:bold;'>Tipo Empresa</td>
                <td style='text-align:center; font-weight:bold;'>Nombre Producto</td>
                <td style='text-align:center; font-weight:bold;'>Entrada</td>
                <td style='text-align:center; font-weight:bold;'>Fecha</td>
                
            </tr>");
    
        // Recorrer los usuarios y generar las filas de la tabla
        foreach ($clientes as $key => $datos) {
            echo utf8_decode("<tr>
                <td style='text-align:center;'>" . $datos["nombreEmpresa"] . "</td>
                <td style='text-align:center;'>" . $datos["tipoEmpresa"] . "</td>
                <td style='text-align:center;'>" . $datos["nombreProducto"] . "</td>
                <td style='text-align:center;'> " . $datos["entradap"] . "</td>
                <td style='text-align:center;'> " . $datos["fecha"] . "</td>
                
            </tr>");
        }
    
        // Cerrar la tabla
        echo "</table>";
        exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }




    public function ctrDescargarReportesExcelProductosSalidas() {
        if (isset($_GET["productosSExcel"])) {
            
            $tabla = "salidasp";
            $item = null;
            $valor = null;
    
            // Obtener los productos desde el modelo
            $clientes = ModeloProductos::mdlMostrarProductosSalidas($tabla, $item, $valor);
        }
    
        // Nombre del archivo Excel a generar
        $name = $_GET["productosSExcel"] . '.xls';
    
        // Configuración de los encabezados HTTP para descarga de archivo Excel
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Iniciar la tabla y definir los encabezados de las columnas
        echo utf8_decode("<table border='1'>
            <tr>
                <td style='text-align:center; font-weight:bold;'>Categoría</td>
                <td style='text-align:center; font-weight:bold;'>Nombre Producto</td>
                <td style='text-align:center; font-weight:bold;'>Nombre Cliente</td>
                <td style='text-align:center; font-weight:bold;'>salida</td>
                <td style='text-align:center; font-weight:bold;'>Fecha</td>
                
            </tr>");
    
        // Recorrer los usuarios y generar las filas de la tabla
        foreach ($clientes as $key => $datos) {
            echo utf8_decode("<tr>
                <td style='text-align:center;'>" . $datos["categoriap"] . "</td>
                <td style='text-align:center;'>" . $datos["nombrep"] . "</td>
                <td style='text-align:center;'>" . $datos["nombreCliente"] . "</td>
                <td style='text-align:center;'> " . $datos["salidap"] . "</td>
                <td style='text-align:center;'> " . $datos["fecha"] . "</td>
                
            </tr>");
        }
    
        // Cerrar la tabla
        echo "</table>";
        exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }





    public function ctrDescargarReportesWordProductos() {
        if (isset($_GET["productosWord"])) {
            
            $tabla = "productos";
            $item = null;
            $valor = null;
    
            // Obtener los productos desde el modelo
            $productos = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        }
    
        // Nombre del archivo Word a generar
        $name = $_GET["productosWord"] . '.doc';
    
        // Configuración de los encabezados HTTP para descarga de archivo Word
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-doc');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Iniciar la tabla y definir los encabezados de las columnas
        echo utf8_decode("<table border='1'>
            <tr>
                <td style='text-align:center; font-weight:bold;'>Categoría</td>
                <td style='text-align:center; font-weight:bold;'>Nombre</td>
                <td style='text-align:center; font-weight:bold;'>Descripción</td>
                <td style='text-align:center; font-weight:bold;'>Precio Compra</td>
                <td style='text-align:center; font-weight:bold;'>Precio Venta</td>
                <td style='text-align:center; font-weight:bold;'>Stock</td>
            </tr>");
    
        // Recorrer los clientes y generar las filas de la tabla
        foreach ($productos as $key => $datos) {
            echo utf8_decode("<tr>
                <td style='text-align:center;'>" . $datos["categoria"] . "</td>
                <td style='text-align:center;'>" . $datos["nombre"] . "</td>
                <td style='text-align:center;'>" . $datos["descripcion"] . "</td>
                <td style='text-align:center;'>$ " . $datos["precioCompra"] . "</td>
                <td style='text-align:center;'>$ " . $datos["precioVenta"] . "</td>
                <td style='text-align:center;'>" . $datos["stock"] . "</td>
            </tr>");
        }
    
        // Cerrar la tabla
        echo "</table>";
        exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }




    public function ctrDescargarReportesWordProductosEntradas() {
        if (isset($_GET["productosEWord"])) {
            
            $tabla = "entradasp";
            $item = null;
            $valor = null;
    
            // Obtener los productos desde el modelo
            $productos = ModeloProductos::mdlMostrarProductosEntradas($tabla, $item, $valor);
        }
    
        // Nombre del archivo Word a generar
        $name = $_GET["productosEWord"] . '.doc';
    
        // Configuración de los encabezados HTTP para descarga de archivo Word
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-doc');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
       // Iniciar la tabla y definir los encabezados de las columnas
       echo utf8_decode("<table border='1'>
       <tr>
           <td style='text-align:center; font-weight:bold;'>Nombre Empresa</td>
           <td style='text-align:center; font-weight:bold;'>Tipo Empresa</td>
           <td style='text-align:center; font-weight:bold;'>Nombre Producto</td>
           <td style='text-align:center; font-weight:bold;'>Entrada</td>
           <td style='text-align:center; font-weight:bold;'>Fecha</td>
           
       </tr>");

   // Recorrer los prodcutos y generar las filas de la tabla
   foreach ($productos as $key => $datos) {
       echo utf8_decode("<tr>
           <td style='text-align:center;'>" . $datos["nombreEmpresa"] . "</td>
           <td style='text-align:center;'>" . $datos["tipoEmpresa"] . "</td>
           <td style='text-align:center;'>" . $datos["nombreProducto"] . "</td>
           <td style='text-align:center;'> " . $datos["entradap"] . "</td>
           <td style='text-align:center;'> " . $datos["fecha"] . "</td>
           
       </tr>");
   }

   // Cerrar la tabla
   echo "</table>";
   exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }



    public function ctrDescargarReportesWordProductosSalidas() {
        if (isset($_GET["productosSWord"])) {
            
            $tabla = "salidasp";
            $item = null;
            $valor = null;
    
            // Obtener los productos desde el modelo
            $productos = ModeloProductos::mdlMostrarProductosSalidas($tabla, $item, $valor);
        }
    
        // Nombre del archivo Word a generar
        $name = $_GET["productosSWord"] . '.doc';
    
        // Configuración de los encabezados HTTP para descarga de archivo Word
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: application/vnd.ms-doc');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
       // Iniciar la tabla y definir los encabezados de las columnas
       echo utf8_decode("<table border='1'>
       <tr>
           <td style='text-align:center; font-weight:bold;'>Categoría</td>
           <td style='text-align:center; font-weight:bold;'>Nombre Producto</td>
           <td style='text-align:center; font-weight:bold;'>Nombre Cliente</td>
           <td style='text-align:center; font-weight:bold;'>salida</td>
           <td style='text-align:center; font-weight:bold;'>Fecha</td>
           
       </tr>");

   // Recorrer los usuarios y generar las filas de la tabla
   foreach ($productos as $key => $datos) {
       echo utf8_decode("<tr>
           <td style='text-align:center;'>" . $datos["categoriap"] . "</td>
           <td style='text-align:center;'>" . $datos["nombrep"] . "</td>
           <td style='text-align:center;'>" . $datos["nombreCliente"] . "</td>
           <td style='text-align:center;'> " . $datos["salidap"] . "</td>
           <td style='text-align:center;'> " . $datos["fecha"] . "</td>
           
       </tr>");
   }

   // Cerrar la tabla
   echo "</table>";
   exit(); // Para evitar que el script continúe ejecutándose después de la exportación
    }



    public function ctrDescargarReportesCSVProductos() {
        if (isset($_GET["productosCSV"])) {
            $tabla = "productos";
            $item = null;
            $valor = null;
    
            // Obtener los productos desde el modelo
            $productos = ModeloProductos::mdlMostrarProductos($tabla, $item, $valor);
        }
    
        // Nombre del archivo CSV
        $name = $_GET["productosCSV"] . '.csv';
    
        // Configuración de los encabezados HTTP
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Crear contenido del CSV
        $datos = "";
        $datos .= "CATEGORÍA,NOMBRE,DESCRIPCIÓN,PRECIO COMPRA,PRECIO VENTA,STOCK\r\n";
    
        foreach ($productos as $key => $values) {
            $datos .= "$values[categoria],$values[nombre],$values[descripcion],$values[precioCompra],$values[precioVenta],$values[stock]\r\n";
        }
    
        echo utf8_decode($datos);
        exit();
    }




    public function ctrDescargarReportesCSVProductosEntradas() {
        if (isset($_GET["productosECSV"])) {
            $tabla = "entradasp";
            $item = null;
            $valor = null;
    
            // Obtener los productos desde el modelo
            $productos = ModeloProductos::mdlMostrarProductosEntradas($tabla, $item, $valor);
        }
    
        // Nombre del archivo CSV
        $name = $_GET["productosECSV"] . '.csv';
    
        // Configuración de los encabezados HTTP
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Crear contenido del CSV
        $datos = "";
        $datos .= "NOMBRE EMPRESA,TIPO EMPRESA,NOMBRE PRODUCTO,ENTRADA,FECHA\r\n";
    
        foreach ($productos as $key => $values) {
            $datos .= "$values[nombreEmpresa],$values[tipoEmpresa],$values[nombreProducto],$values[entradap],$values[fecha]\r\n";
        }
    
        echo utf8_decode($datos);
        exit();
    }



    public function ctrDescargarReportesCSVProductosSalidas() {
        if (isset($_GET["productosSCSV"])) {
            $tabla = "salidasp";
            $item = null;
            $valor = null;
    
            // Obtener los productos desde el modelo
            $productos = ModeloProductos::mdlMostrarProductosSalidas($tabla, $item, $valor);
        }
    
        // Nombre del archivo CSV
        $name = $_GET["productosSCSV"] . '.csv';
    
        // Configuración de los encabezados HTTP
        header('Expires: 0');
        header('Cache-Control: private');
        header('Content-type: text/csv');
        header('Content-Disposition: attachment; filename="' . $name . '"');
    
        // Crear contenido del CSV
        $datos = "";
        $datos .= "CATEGORÍA,NOMBRE PRODUCTO,NOMBRE CLIENTE,SALIDA,FECHA\r\n";
    
        foreach ($productos as $key => $values) {
            $datos .= "$values[categoriap],$values[nombrep],$values[nombreCliente],$values[salidap],$values[fecha]\r\n";
        }
    
        echo utf8_decode($datos);
        exit();
    }
    





        // Método para obtener los productos más vendidos
        public static function ctrProductosMasVendidos($fechaInicio, $fechaFin) {
            $respuesta = ModeloProductos::mdlProductosMasVendidos($fechaInicio, $fechaFin);
            return $respuesta;
        }
    
            // Método para obtener el historial solo de entradas de productos
            public static function ctrHistorialEntradas($fechaInicio, $fechaFin) {
                $respuesta = ModeloProductos::mdlHistorialEntradas($fechaInicio, $fechaFin);
                return $respuesta;
            }

            // Método para obtener el historial solo de salidas de productos
            public static function ctrHistorialSalidas($fechaInicio, $fechaFin) {
                $respuesta = ModeloProductos::mdlHistorialSalidas($fechaInicio, $fechaFin);
                return $respuesta;
            }

    
    
    

    
            
            



    
}
