<?php

require_once './BBDD_Entidades/Componente.php';
require_once './BBDD_Entidades/Caja.php';

$jsonCont = file_get_contents('./JSON_bbdd/CajasSPECTS___Google_Shopping.json');
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
    $tipo = 'discos_duros';

    $componente = new Componente();
    $componente->setNombre($nombre);
    $componente->setProveedor($proveedor);
    $componente->setPrecio_articulo($precio_articulo);
    $componente->setPrecio_total($precio_total);
    $componente->setUrl_imagen($url_imagen);
    $componente->setUrl_articulo($url_articulo);
    $componente->setTipo($tipo);

    $caja = new Caja();
    $caja->setId_componente($componente->registrar());
    preg_match_all('/(ATX|atx|Atx|MicroATX|micro ATX|Micro ATX)/', $caracteristicas, $factorFormaCaja);

    if (!isset($factorFormaCaja[0][0])) {
        preg_match_all('/(ATX|atx|Atx|MicroATX|micro ATX|Micro ATX)/', $nombre, $factorFormaCaja);
    }

    if (!isset($factorFormaCaja[0][0])) {
        $factoresdeforma = ['ATX', 'MicroATX', 'Mini ITX'];
        $factorFormaCaja[0][0] = $factoresdeforma[rand(0, count($factoresdeforma) - 1)];
    }
    //echo $key . ' Factor de forma: ' . $factorFormaCaja[0][0] . '<br>';
    $caja->setTipo_placa_base($factorFormaCaja[0][0]);
    $caja->registrar();
}
