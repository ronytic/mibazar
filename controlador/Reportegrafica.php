<?php

namespace controlador;

class Reportegrafica
{
    public function ventas()
    {

        //ARmar un formato de datos para la grafica
        //Nombre
        //Cantidad

        $producto = new \modelo\Producto();
        $productos = $producto->seleccionar("*", "estado = 1");

        $ventadetalle = new \modelo\Ventadetalle();

        $datos = [];
        foreach ($productos as $fila) {

            $respuestaCantidad = $ventadetalle->seleccionar("sum(cantidad) as cantidad", "id_producto = " . $fila['id_producto']);
            // echo "<pre>";
            // print_r($respuestaCantidad);
            // echo "</pre>";
            $cantidad = $respuestaCantidad[0]['cantidad'] ?? 0;  //?? 0 si no existe la variable cantidad coloca el valor de 0
            $datos[] = [
                "nombre" => $fila["nombre"],
                "cantidad" => $cantidad
            ];
        }

        // echo "<pre>";
        // print_r($datos);
        // echo "</pre>";


        // exit();
        $titulo = " Gráfica Estadística de Ventas";
        $vista = "vista/reportegrafica/ventas.php";
        require_once "vista/cargador.php";
    }
}
