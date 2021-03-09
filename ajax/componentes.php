<?php

/*
 * Recibir peticiones
 */
header('Content-Type: application/json');
switch ($_SERVER['REQUEST_METHOD']) {
    case 'POST':
        $_POST = json_decode(file_get_contents('php://input'), true);
    break;
    case 'GET':
        if($isset($_GET['id']))
            echo 'El producto es ' . $_GET['id']; 
        else
            echo 'Renornar todos los usuarios';
    break;
    case 'PUT':
        echo 'Actualizar';
    break;
    case 'DELETE';
        echo 'Eliminar';
    break;
    default:
        echo 'Lo sentimos, se produjo un error.';
    break;
}
