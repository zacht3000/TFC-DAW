<?php

/*
 * Recibir peticiones
 */
header('Content-Type: application/json');
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        require_once dirname(__FILE__) . '/Componente.php';
        if(isset($_GET['tipo'])){
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentesTipo($_GET['tipo']);
        } else {
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentes();
        }
        echo json_encode($resultadoQuery);
    break;
    default:
        echo json_encode('Lo sentimos, se produjo un error.');
        break;
}

