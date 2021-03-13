<?php

require_once './BBDD_Entidades/Componente.php';
require_once './BBDD_Entidades/Procesador.php';

$jsonCont = file_get_contents('./JSON_bbdd/ProcesadoresSPECTS___Google_Shopping.json');
$content = json_decode($jsonCont, true);
foreach ($content as $key => $value) {
    $nombre = $value['nombre'];
    $proveedor = $value['Vendidopor'];
    preg_match('/([0-9.])+/', $value['Preciodelartículo'], $output_array);
    $precio_articulo = (float) $output_array[0];
    preg_match('/([0-9.])+/', $value['Preciototal'], $output_array);
    $precio_total = (float) $output_array[0];
    $url_imagen = $value['Image_URL'];
    $url_articulo = $value['internallink_URL'];
    $caracteristicas = $value['caracteristicas'];
    $tipo = 'procesador';

    $componente = new Componente();
    $componente->setNombre($nombre);
    $componente->setProveedor($proveedor);
    $componente->setPrecio_articulo($precio_articulo);
    $componente->setPrecio_total($precio_total);
    $componente->setUrl_imagen($url_imagen);
    $componente->setUrl_articulo($url_articulo);
    $componente->setTipo($tipo);
    
    $procesador = new Procesador();
    $procesador->setId_componente($componente->registrar());
    preg_match_all('/([0-9.,]*)\sGHz|([0-9.,]*\sGhz)|([0-9.,]*GHz)|([0-9.,]*Ghz)/', $caracteristicas, $frecuencia);
    preg_match_all('/Socket ([A-Za-z]*\s[0-9]*|[A-Za-z0-9]*)/', $caracteristicas, $socket);
    preg_match_all('/([0-9]*) núcleos/', $caracteristicas, $nucleos);
    $procesador->setFrecuencia((float) str_replace(',', '.', str_replace('.', '', $frecuencia[1][0])));
    $procesador->setSocket($socket[1][0]);
    $procesador->setNucleos((int)$nucleos[1][0]);
    $procesador->registrar();
    
}
