<?php
session_start();

date_default_timezone_set('America/La_Paz');

if (isset($_SESSION['nombres']) || (isset($_GET['c']) && $_GET['c'] == 'login')) {
    // Cuando hay login
    // 1.- Recibir los valores enviados
    $c = $_GET['c'] ?? 'principal';
    $m = $_GET['m'] ?? 'inicio';
} else {
    // si no hay login
    $c = 'login';
    $m = 'index';
}
// 2.- Verificarsi estan definidos
// echo "Controlador: $c <br>";
// echo "Método: $m <br>";

// 3.- Uniformar los datos

$c = ucfirst(strtolower($c)); // Convierte la primera letra en mayúscula

// echo "Controlador: $c <br>";
// echo "Método: $m <br>";


// metodo para incluir a los archivos cuando tienen namespace dinamicos
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    if (file_exists($class . '.php')) {
        require_once $class . '.php';
    }
});


$creandoNameSpace = "controlador\\$c";

$objeto = new $creandoNameSpace(); // Creando un objeto de la clase que se este solicitando
$objeto->$m(); // Ejecutando el método que se este solicitando
