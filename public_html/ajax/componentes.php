<?php

/*
 * Recibir peticiones
 */
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if(isset($_GET['tipo'])){
            require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Componente.php';
            $componentes = new Componente();
            if($_GET['tipo'] !== 'componentes')
                $resultadoQuery = $componentes->getComponentesTipo($_GET['tipo']);
            else
                 $resultadoQuery = $componentes->getComponentes();
        }
        else if(isset($_GET['search'])){
            require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Componente.php';
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentesSearch($_GET['search']);
        }
        else if(isset($_GET['oferta'])){
            require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Componente.php';
            $componentes = new Componente();
            $resultadoQuery = $componentes->getComponentesOferta();
        }else if(isset($_GET['tipoGenerador'])){
            if($_GET['tipoGenerador'] === 'ram'){
                require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Memoria_ram.php';
                $memoriaRam = new Memoria_ram();
                $resultadoQuery = $memoriaRam->getMemoriaGenerador($_GET['min'], isset($_GET['max']) ? $_GET['max'] : 0); 
                
            } else if($_GET['tipoGenerador'] === 'gpu'){
                require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Tarjeta_grafica.php';
                $tarjetaGrafica = new Tarjeta_grafica();
                $resultadoQuery = $tarjetaGrafica->getTarjetaGraficaGenerador($_GET['min'], isset($_GET['max']) ? $_GET['max'] : 0); 
                
            } else if($_GET['tipoGenerador'] === 'procesador'){
                require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Procesador.php';
                $procesador = new Procesador();
                $resultadoQuery = $procesador->getProcesadorGenerador($_GET['min'], isset($_GET['max']) ? $_GET['max'] : 0); 
                
            } else if($_GET['tipoGenerador'] === 'discos'){
                require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Disco_duro.php';
                $discos = new Disco_duro();
                $resultadoQuery = $discos->getDicosDurosGenerador($_GET['tipoDisco'], $_GET['min']); 
            }  else if($_GET['tipoGenerador'] === 'fuente'){
                require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Fuente_alimentacion.php';
               $fuente = new Fuente_alimentacion();
                $resultadoQuery = $fuente->getFuenteAlimentacionGenerador($_GET['min'], isset($_GET['max']) ? $_GET['max'] : 0); 
            } else if($_GET['tipoGenerador'] === 'placa'){
                require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Placa_base.php';
                $placa = new Placa_base();
                $resultadoQuery = $placa->getPlacaBaseGenerador($_GET['min']); 
            } else if($_GET['tipoGenerador'] === 'placa'){
                require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Placa_base.php';
                $placa = new Placa_base();
                $resultadoQuery = $placa->getPlacaBaseGenerador($_GET['min']); 
            }  else if($_GET['tipoGenerador'] === 'caja'){
                require_once $_SERVER['DOCUMENT_ROOT'] . '/BBDD_Entidades/Caja.php';
                $caja = new Caja();
                $resultadoQuery = $caja->getCajaGenerador($_GET['min']); 
            }
        }

        echo json_encode($resultadoQuery);
    break;
    default:
        echo json_encode('Lo sentimos, se produjo un error.');
        break;
}

