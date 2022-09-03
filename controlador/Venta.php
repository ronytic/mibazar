<?php

namespace controlador;

class Venta
{

    function nuevo()
    {

        require_once "vista/venta/nuevo.php";
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
