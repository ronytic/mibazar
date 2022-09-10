<?php

namespace controlador;

class Producto
{
    //Métodos
    function nuevo()
    {
        //Llamar a una vista para que el usuario ingrese los datos del producto
        $titulo = "Registro de nuevo Producto";
        $vista = 'vista/producto/nuevo.php';
        require_once 'vista/cargador.php';
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
                $mensaje = "El archivo es muy pesado";
            }
        } else {
            $mensaje = "No es un archivo imagen";
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
            $mensaje = "Producto guardado";
        } else {
            $mensaje = "Error al guardar el producto";
        }




        //LLAMAR a la vista
        $titulo = "Registro de nuevo Producto";
        $vista = 'vista/producto/mensaje.php';
        require_once "vista/cargador.php";
    }

    function listar()
    {
        // SELECT -> OBtener los registros de la Tabla
        $producto = new \modelo\Producto();
        $productos = $producto->seleccionar("*", "estado = 1", "", "", "nombre asc");

        // Llamar a la vista y mostrar en formato de tabla
        $titulo  = "Listado de Productos";
        $vista = 'vista/producto/listar.php';
        require_once "vista/cargador.php";
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
