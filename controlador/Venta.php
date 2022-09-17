<?php

namespace controlador;

class Venta
{

    function nuevo()
    {

        $js = [
            'js/venta.js'
        ];
        $titulo = "Nueva Venta";
        $vista = "vista/venta/nuevo.php";
        require_once "vista/cargador.php";
    }

    function fila()
    {
        $numerofila = $_POST['numerofila'];

        // llamar al modelo producto
        $producto = new \modelo\Producto();
        $productos = $producto->seleccionar("*", "estado =1");

        require_once "vista/venta/fila.php";
    }

    function datosproducto()
    {
        $id_producto = $_POST['id_producto'];

        $producto = new \modelo\Producto();
        $productos = $producto->seleccionar("*", "id_producto = $id_producto");
        $producto = $productos[0];


        /// Llamar al modelo compra
        $compra = new \modelo\Compra();
        $compras = $compra->seleccionar("SUM(cantidad) as totalstock", "id_producto = $id_producto");
        $compra = $compras[0];
        $stock = $compra['totalstock'] ?? 0;

        $arrayRespuesta = [
            'precio' => $producto['precio'],
            'stock' => $stock,
            'imagen' => $producto['foto']
        ];

        echo json_encode($arrayRespuesta);
    }

    function guardar()
    {

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit();
        $producto = $_POST['producto']; // Array de array (Matriz) productos

        $nombrecliente = $_POST['nombrecliente'];
        $nitcliente = $_POST['nitcliente'];
        $totalgeneral = $_POST['totalgeneral'];
        $cancelado = $_POST['cancelado'];
        $cambio = $_POST['cambio'];

        $datosGuardarVenta = [
            'nombrecliente' => $nombrecliente,
            'nitcliente' => $nitcliente,
            'totalgeneral' => $totalgeneral,
            'cancelado' => $cancelado,
            'cambio' => $cambio,
        ];
        // Llamar al modelo venta
        $venta = new \modelo\Venta();
        $respuesta = $venta->insertar($datosGuardarVenta); // Insertar la venta
        $id_venta = $venta->ultimo(); // Obtener el id de la venta


        // Llamar al modelo ventadetalle
        $ventadetalle = new \modelo\VentaDetalle();

        foreach ($producto as $fila) {
            //Preparando los datos a guardar en venta_detalle
            $datosVentaDetalle = [
                'id_venta' => $id_venta,
                'id_producto' => $fila['id_producto'],
                'cantidad' => $fila['cantidad'],
                'precio' => $fila['precio'],
                'total' => $fila['total'],
            ];
            $ventadetalle->insertar($datosVentaDetalle); // Insertar el detalle de la venta
        }




        if ($respuesta) {
            $mensaje =  "Se guardo correctamente";
        } else {
            $mensaje = "No se guardo";
        }


        //llamar a la vista
        $titulo = "Nueva Venta";
        $vista = "vista/venta/mensaje.php";
        require_once "vista/cargador.php";
    }
}
