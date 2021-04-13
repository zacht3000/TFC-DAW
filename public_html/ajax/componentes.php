<?php

/*
 * Recibir peticiones
 */
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Componente.php';
        if(isset($_GET['tipo'])){
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentesTipo($_GET['tipo']);
        }else if(isset($_GET['oferta'])){
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentesOferta();
        }else if(isset($_GET['procesador'])){
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentesTipoProcesador();
        }else {
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentes();
        }
        echo json_encode($resultadoQuery);
    break;
    default:
        echo json_encode('Lo sentimos, se produjo un error.');
        break;
}
