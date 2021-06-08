<?php

require_once './BBDD_Entidades/Componente.php';
require_once './BBDD_Entidades/Refrigeracion.php';

$jsonCont = file_get_contents('./NUEVOS_JSON/RefrigeracionSPECTS___Google_Shopping.json');
$content = json_decode($jsonCont, true);
foreach ($content as $key => $value) {
    $nombre = $value['nombre'];
    $proveedor = $value['Vendidopor'];
    preg_match('/([0-9.])+/', $value['Preciodelarticulo'], $output_array);
    $precio_articulo = (float) $output_array[0];
    preg_match('/([0-9.])+/', $value['Preciototal'], $output_array);
    $precio_total = (float) $output_array[0];
    $url_imagen = $value['Image_URL'];
    $url_articulo = $value['internallink_URL'];
    $caracteristicas = $value['caracteristicas'];
    $tipo = 'refrigeracion';
    
    $componente = new Componente();
    $componente->setNombre($nombre);
    $componente->setProveedor($proveedor);
    $componente->setPrecio_articulo($precio_articulo);
    $componente->setPrecio_total($precio_total);
    $componente->setUrl_imagen($url_imagen);
    $componente->setUrl_articulo($url_articulo);
    $componente->setTipo($tipo);

    $refrigeracion = new Refrigeracion();
    $refrigeracion->setId_componente($componente->registrar());
  
    preg_match_all('/(Liquid)|(líquida)|(liquida)/', $nombre, $refrigeracion_liquida);
    preg_match_all('/(Ventilador)/', $nombre, $refrigeracion_aire);

    $tipoRefrigeracion;
    if (isset($refrigeracion_liquida[0][0])) {
        $tipoRefrigeracion = 'liquida';
    } elseif (isset($refrigeracion_aire[0][0])) {
        $tipoRefrigeracion = 'aire';
    } 
    
    $refrigeracion->setTipo($tipoRefrigeracion);
    $refrigeracion->registrar();
}

