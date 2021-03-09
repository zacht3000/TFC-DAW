<?php
require_once './Componente.php';

$jsonCont = file_get_contents('Procesadores___Google_Shopping.json');
$content = json_decode($jsonCont, true);

$nombre = $content['nombre'];
$proveedor = $content['Vendidopor'];
$precio_articulo = $content['Preciodelartículo'];
$precio_total = $content['Preciototal'];
$url_imagen = $content['Image_URL'];
$url_articulo = $content['internallink_URL'];
$tipo = 'procesador';

$procesador = new Componente();
$procesador->setNombre($nombre);
$procesador->setProveedor($proveedor);
$procesador->setPrecio_articulo($precio_articulo);
$procesador->setPrecio_total($precio_total);
$procesador->setUrl_imagen($url_imagen);
$procesador->setUrl_articulo($url_articulo);
$procesador->setTipo($tipo);

$procesador->registrar();
