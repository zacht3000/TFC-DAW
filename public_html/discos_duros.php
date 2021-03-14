<?php

require_once './BBDD_Entidades/Componente.php';
require_once './BBDD_Entidades/Disco_duro.php';

$jsonCont = file_get_contents('./JSON_bbdd/DiscosDurosSPECTS___Google_Shopping.json');
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
    $tipo = 'disco_duro';
    
    $componente = new Componente();
    $componente->setNombre($nombre);
    $componente->setProveedor($proveedor);
    $componente->setPrecio_articulo($precio_articulo);
    $componente->setPrecio_total($precio_total);
    $componente->setUrl_imagen($url_imagen);
    $componente->setUrl_articulo($url_articulo);
    $componente->setTipo($tipo);

    $discoduro = new Disco_duro();
    $discoduro->setId_componente($componente->registrar());
    preg_match_all('/([A-Za-z0-9]*\sGB|[A-Za-z0-9]*GB|[A-Za-z0-9]*gb|[A-Za-z0-9]*Gb|[A-Za-z0-9]*\sTB|[A-Za-z0-9]*TB|[A-Za-z0-9]*tb|[A-Za-z0-9]*tb)/', $caracteristicas, $almacenamiento);
    preg_match_all('/(Estado sólido)/', $caracteristicas, $estadoSolido);
    preg_match_all('/(SATA)/', $caracteristicas, $sata);
    preg_match_all('/(M.2)/', $caracteristicas, $m2);

    $tipoDisco;
    if (!isset($estadoSolido[0][0]) && isset($sata[0][0])) {
        $tipoDisco = 'hdd';
    } elseif (isset($estadoSolido[0][0]) && isset($m2[0][0])) {
        $tipoDisco = 'm.2';
    } elseif (isset($estadoSolido[0][0]) && isset($sata[0][0])) {
        $tipoDisco = 'ssd';
    }
    
    $discoduro->setAlmacenamiento($almacenamiento[0][0]);
    $discoduro->setTipo($tipoDisco);
    $discoduro->registrar();
}

