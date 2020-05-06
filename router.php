<?php

require_once 'controllers/university.controller.php';

//defino la base de la url de forma dinámica
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');
//define la acción por defecto
if (empty($_GET['action'])) {
    $_GET['action'] = 'index';
}
// toma la acción que viene del usuario y parsea los parámetros
$accion = $_GET['action'];
$parametros = explode('/', $accion);

// decide que camino tomar según TABLA DE RUTEO
switch ($parametros[0]) {
    case 'index':
        //instancio el objeto de la clase UniversiyController
        $controller = new UniversityController();
        $controller->showMain();
        break;
    case 'add':
        $controller = new UniversityController();
        // $controller->addAll();
        break;
    case 'subject':
        $controller = new UniversityController();
        $controller->showCareer($parametros[1]);
        break;
    case 'minor3':
        $controller = new UniversityController();
        $controller->showCareer3();
        break;
}
