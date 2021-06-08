<?php

require_once './BBDD_Entidades/Componente.php';
require_once './BBDD_Entidades/Memoria_ram.php';

$jsonCont = file_get_contents('./NUEVOS_JSON/MemoriasRAMSPECTS___Google_Shopping.json');
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
    $tipo = 'memoria_ram';

    $componente = new Componente();
    $componente->setNombre($nombre);
    $componente->setProveedor($proveedor);
    $componente->setPrecio_articulo($precio_articulo);
    $componente->setPrecio_total($precio_total);
    $componente->setUrl_imagen($url_imagen);
    $componente->setUrl_articulo($url_articulo);
    $componente->setTipo($tipo);
    
    $memoria_ram = new Memoria_ram();
    $memoria_ram->setId_componente($componente->registrar());
    $ddrMemoria = ['DDR4', 'DDR3'];
    $almacenamientoMemoria = ['8GB', '16GB'];
    $frecuenciaMemoria = ['3733 MhZ', '3200 MHz', '3000 MHz'];
    preg_match_all('/(DDR4|ddr4|DDR3|ddr3|DDR2|ddr2)/', $caracteristicas, $ddr);
    preg_match_all('/([A-Za-z0-9]*\sGB|[A-Za-z0-9]*GB|[A-Za-z0-9]*gb|[A-Za-z0-9]*Gb|[A-Za-z0-9]*\sTB|[A-Za-z0-9]*TB|[A-Za-z0-9]*tb|[A-Za-z0-9]*tb)/', $caracteristicas, $almacenamientoRAM);
    preg_match_all('/([A-Za-z0-9]*\sMhZ|[A-Za-z0-9.]*MHZ|[A-Za-z0-9.]*Mhz|[A-Za-z0-9.]*mhz|[A-Za-z0-9.]*\sMHz)/', $caracteristicas, $frecuenciaRAM);

    /*if (!isset($ddr[0][0])) {
        preg_match_all('/(DDR4|ddr4|DDR3|ddr3|DDR2|ddr2)/', $caracteristicas2, $ddr);
    }*/

    if (!isset($ddr[0][0])) {
        $ddr[0][0] = $ddrMemoria[rand(0, count($ddrMemoria) - 1)];
    }

    /*if (!isset($almacenamientoRAM[0][0])) {
        preg_match_all('/([A-Za-z0-9]*\sGB|[A-Za-z0-9]*GB|[A-Za-z0-9]*gb|[A-Za-z0-9]*Gb|[A-Za-z0-9]*\sTB|[A-Za-z0-9]*TB|[A-Za-z0-9]*tb|[A-Za-z0-9]*tb)/', $caracteristicas2, $almacenamientoRAM);
    }*/

    if (!isset($almacenamientoRAM[0][0])) {
        $almacenamientoRAM[0][0] = $almacenamientoMemoria[rand(0, count($almacenamientoMemoria) - 1)];
    }

    if (!isset($frecuenciaRAM[0][0])) {
        preg_match_all('/([A-Za-z0-9]*\sMhZ|[A-Za-z0-9.]*MHZ|[A-Za-z0-9.]*Mhz|[A-Za-z0-9.]*mhz|[A-Za-z0-9.]*\sMHz)/', $caracteristicas2, $frecuenciaRAM);
    }
    
    if (!isset($frecuenciaRAM[0][0])) {
        $frecuenciaRAM[0][0] = $frecuenciaMemoria[rand(0, count($frecuenciaMemoria) - 1)];
    }

    //echo $key . ' Tipo de DDR: ' . $ddr[0][0] . '<br>';
    //echo $key . ' Almacenamiento: ' . $almacenamientoRAM[0][0] . '<br>';
    //echo $key . ' Frecuencia: ' . $frecuenciaRAM[0][0] . '<br>';
    $memoria_ram->setTipo_memoria_interna($ddr[0][0]);
    $memoria_ram->setMemoria_interna($almacenamientoRAM[0][0]);
    $memoria_ram->setVelocidad_reloj($frecuenciaRAM[0][0]);
    $memoria_ram->registrar();
    
}