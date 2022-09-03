<?php

namespace controlador;

class Producto
{
    //Métodos
    function nuevo()
    {
        //Llamar a una vista para que el usuario ingrese los datos del producto
        require_once 'vista/producto/nuevo.php';
    }

    function guardar()
    {
        // 1.- Recibir los datos del formulario
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $foto = $_FILES['foto']; // Variable global $_FILES donde se maneja el archivo
        $descripcion = $_POST['descripcion'];
        // 2.- Verificar que los datos no estén vacíos
        // echo $nombre . '<br>';
        // echo $precio . '<br>';

        // echo "<pre>";
        // print_r($foto);
        // echo "</pre>";

        // echo $descripcion . '<br>';
        // 3.- Uniformar los datos
        $nombre = \mb_strtolower($nombre);

        // 3.1 Validar que sea el archivo correcto
        //Validar que sea word o el tipo word // Buscar los mime types del archivo
        // if (
        // $foto['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
        // $foto['type'] == 'application/msword'

        if (
            $foto['type'] == 'image/jpeg' ||
            $foto['type'] == 'image/jpg' ||
            $foto['type'] == 'image/png' ||
            $foto['type'] == 'image/gif'
        ) {
            //Validar por peso
            if ($foto['size'] <= 1 * 1024 * 1024) // 1MB =
            {
                $archivoDestino = 'imagenes/' . $foto['name'];
                copy($foto['tmp_name'], $archivoDestino); // Copia del archivo temporal a la carpeta imagenes
            } else {
                echo "El archivo es muy pesado";
            }
        } else {
            echo "No es un archivo imagen";
        }


        //// EMPEZAR A LLAMAR AL MODELO

        // 4.- Llamar al modelo
        $producto = new \modelo\Producto();

        $valores = [
            'nombre' => $nombre,
            'precio' => $precio,
            'foto' => $archivoDestino,
            'descripcion' => $descripcion,
        ];

        $respuesta = $producto->insertar($valores);

        if ($respuesta) {
            echo "Producto guardado";
        } else {
            echo "Error al guardar el producto";
        }
    }

    function editar()
    {
        echo "Mostrando formulario para editar producto";
    }

    function actualizar()
    {
        echo "Actualizando producto";
    }

    function eliminar()
    {
        echo "Eliminando producto";
    }
}
