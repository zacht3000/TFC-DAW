<?php

/*
 * Recibir peticiones
 */
header('Content-Type: application/json');
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        require_once $_SERVER['DOCUMENT_ROOT'].'/Proyecto_Final_DAW/TFC-DAW/public_html/BBDD_Entidades/Componente.php';
        if(isset($_GET['tipo'])){
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentesTipo($_GET['tipo']);
        }else if(isset($_GET['oferta'])){
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentesOferta();
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

