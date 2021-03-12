<?php

require_once 'BBDD_Entidades/Componente.php';
require_once 'BBDD_Entidades/Procesador.php';

/* $jsonCont = file_get_contents('Procesadores___Google_Shopping.json');
  $content = json_decode($jsonCont, true); */

/* foreach ($content as $value) {
  $nombre = $value['nombre'];
  $proveedor = $value['Vendidopor'];
  $precio_articulo = floatval($value['Preciodelartículo']);
  $precio_total = floatval($value['Preciototal']);
  $url_imagen = $value['Image_URL'];
  $url_articulo = $value['internallink_URL'];


  } */


$componente = new Componente();
$componente->setNombre("AS");
$componente->setProveedor("as");
$componente->setPrecio_articulo(6);
$componente->setPrecio_total(7);
$componente->setUrl_imagen("asasasasas");
$componente->setUrl_articulo("asasasas");
$componente->setTipo('procesador');

$componente->registrar();

$procesador = new Procesador();
$procesador->setId_componente($componente->getId());
$procesador->setFrecuencia(3.79);
$procesador->setSocket('LGA 1151');
$procesador->setNucleos(4);

$procesador->registrar();


