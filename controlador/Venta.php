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
        $nit = $_POST['nit'];

        $datosGuardar = [
            'nit' => $nit,
        ];

        // 1.- Llamar al modelo
        $venta = new \modelo\Venta();
        $respuesta = $venta->insertar($datosGuardar);
        if ($respuesta) {
            echo "Se guardo correctamente";
        } else {
            echo "No se guardo";
        }
    }
}
