<?php

namespace controlador;

class Login
{

    public function index()
    {
        // FORMIULARIO DE LOGIN
        $titulo = "Inicio de sesión";
        require_once "vista/login/index.php";
    }


    public function verificar()
    {
        $usu = $_POST['usu'];
        $pass = $_POST['pass'];

        $usuario = new \modelo\Usuario();
        $usuarios = $usuario->seleccionar("*", "usu='$usu' and contra=SHA1('$pass')");
        // echo "<pre>";
        // print_r($usuarios);
        // echo "</pre>";
        if (count($usuarios) > 0) {
            // El usuario existe
            $usuario = $usuarios[0];
            $_SESSION['nombres'] = $usuario['nombres'];
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            header("Location: ./?c=principal&m=inicio");
        } else {
            // El usuario no existe
            header("Location: ./?c=login&m=index&error=1");
        }
    }

    public function cerrar()
    {
        //Eliminar las variables de sesión
        unset($_SESSION['nombres']);
        unset($_SESSION['id_usuario']);
        \session_destroy(); //Destruir la sesión
        \header("Location: ./?c=login&m=index");
    }
}
