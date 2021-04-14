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
            if($_GET['tipo'] !== 'componentes')
                $resultadoQuery = $componentes->getComponentesTipo($_GET['tipo']);
            else
                 $resultadoQuery = $componentes->getComponentes();
        }else if(isset($_GET['oferta'])){
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentesOferta();
        }
        echo json_encode($resultadoQuery);
    break;
    default:
        echo json_encode('Lo sentimos, se produjo un error.');
        break;
}
