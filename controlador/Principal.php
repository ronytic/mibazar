<?php

namespace controlador;

class Principal
{
    public function inicio()
    {
        $titulo = "Inicio";
        $vista = "vista/principal/index.php";
        require_once "vista/cargador.php";
    }
}
