<?php

namespace modelo;

class BD
{
    protected $conexion;
    function __construct()
    {
        // 1.- Conectar a la BD
        $this->conexion = new \mysqli('localhost', 'root', '', 'mibazar');
    }

    function insertar($valoresEntradaArray)
    {
        $valoresEntradaArray['fecha'] = date('Y-m-d H:i:s');
        $valoresEntradaArray['estado'] = 1;
        // echo "<pre>";
        // print_r($valoresEntradaArray);
        // echo "</pre>";

        // $valoresEntradaArray = [
        //     'nombre' => "naranja",
        //     'precio' => 150,
        //     'foto' => 'imagen.jpg',
        // ];
        $campos = \array_keys($valoresEntradaArray); // sacamos lo keys del array
        // echo "<pre>";
        // print_r($campos);
        // echo "</pre>";

        $campos = \implode(',', $campos); // unimos los campos con una coma
        // echo $campos;


        $valores = \array_values($valoresEntradaArray); // sacamos los valores del array
        // echo "<pre>";
        // print_r($valores);
        // echo "</pre>";
        $valores = "'" . \implode("','", $valores) . "'"; // unimos los valores con una coma

        // echo $valores;

        // $campos = "nombre, precio, foto, descripcion";
        // $valores = "'Producto 1', 100, 'imagen.jpg', 'Descripción del producto 1'";


        // 2.- Preparar la consulta
        $consulta = "INSERT INTO " . $this->nombreTabla . "
                            ($campos)
                        VALUES ($valores)";

        // echo $consulta;
        // Ejecutar la consulta
        $respuesta = $this->conexion->query($consulta);
        return $respuesta;
    }
    function actualizar()
    {
        // 1.- Conectar a la BD
    }
    function eliminar()
    {
        // 1.- Conectar a la BD
    }
    function seleccionar()
    {
        // 1.- Conectar a la BD
    }
}
