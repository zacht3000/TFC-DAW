<?php

require_once './BBDD_Entidades/Componente.php';
require_once './BBDD_Entidades/Tarjeta_grafica.php';

$jsonCont = file_get_contents('./NUEVOS_JSON/TarjetasGraficasSPECTS___Google_Shopping.json');
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
    $tipo = 'tarjeta_grafica';

    $componente = new Componente();
    $componente->setNombre($nombre);
    $componente->setProveedor($proveedor);
    $componente->setPrecio_articulo($precio_articulo);
    $componente->setPrecio_total($precio_total);
    $componente->setUrl_imagen($url_imagen);
    $componente->setUrl_articulo($url_articulo);
    $componente->setTipo($tipo);

    $grafica = new Tarjeta_grafica();
    $grafica->setId_componente($componente->registrar());
    $vrams = ['8GB', '4GB', '10GB'];
      preg_match_all('/([A-Za-z0-9]*\sGB|[A-Za-z0-9]*GB|[A-Za-z0-9]*gb|[A-Za-z0-9]*Gb)/', $caracteristicas, $vram);
      echo isset($vram[0][0]);
      if(!isset($vram[0][0]) || !isset($vram)){
      $vram[0][0] = $vrams[rand(0,count($vrams) - 1)];
      }
      //echo $key . ' VRAM: '. $vram[0][0] . '<br>';
    $grafica->setVram($vram[0][0]);
    $grafica->registrar();
}
