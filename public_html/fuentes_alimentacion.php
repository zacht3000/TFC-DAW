<?php

require_once './BBDD_Entidades/Componente.php';
require_once './BBDD_Entidades/Fuente_alimentacion.php';

$jsonCont = file_get_contents('./JSON_bbdd/FuentesAlimentacionSPECTS___Google_Shopping');
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
    $tipo = 'fuente_alimentacion';
    
    $componente = new Componente();
    $componente->setNombre($nombre);
    $componente->setProveedor($proveedor);
    $componente->setPrecio_articulo($precio_articulo);
    $componente->setPrecio_total($precio_total);
    $componente->setUrl_imagen($url_imagen);
    $componente->setUrl_articulo($url_articulo);
    $componente->setTipo($tipo);

    $fuentesalimentacion = new Fuente_alimentacion();
    $fuentesalimentacion->setId_componente($componente->registrar());
    preg_match_all('/([A-Za-z0-9]*\sW|[A-Za-z0-9]*W|[A-Za-z0-9]*vatios|[A-Za-z0-9]*\svatios)/', $nombre, $potencia);
    if(!isset($potencia[0][0])){
        preg_match_all('/([A-Za-z0-9]*\sW|[A-Za-z0-9]*W|[A-Za-z0-9]*vatios|[A-Za-z0-9]*\svatios)/', $caracteristicas, $potencia);
    }
    //echo $key . ' Potencia: ' . $potencia[0][0] . '<br>';
    $fuentesalimentacion->setPotencia($potencia[0][0]);
    $fuentesalimentacion->registrar();

}