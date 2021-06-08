<?php

require_once './BBDD_Entidades/Componente.php';
require_once './BBDD_Entidades/Placa_base.php';

$jsonCont = file_get_contents('./NUEVOS_JSON/PlacasBasesSPECTS___Google_Shopping.json');
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
    $tipo = 'placa_base';

    $componente = new Componente();
    $componente->setNombre($nombre);
    $componente->setProveedor($proveedor);
    $componente->setPrecio_articulo($precio_articulo);
    $componente->setPrecio_total($precio_total);
    $componente->setUrl_imagen($url_imagen);
    $componente->setUrl_articulo($url_articulo);
    $componente->setTipo($tipo);

    $placabase = new Placa_Base();
    $placabase->setId_componente($componente->registrar());
    preg_match_all('/(ATX|atx|Atx|MicroATX|micro ATX|Micro ATX|E-ATX)/', $caracteristicas, $factor_forma);
    preg_match_all('/Socket ([A-Za-z]*\s[0-9]*|[A-Za-z0-9]*)/', $caracteristicas, $socket);
    $placabase->setFactor_forma($factor_forma[1][0]);
    $placabase->setSocket($socket[1][0]);
    $placabase->registrar();

}