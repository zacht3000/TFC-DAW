<?php

require_once './Componente.php';

$jsonCont = file_get_contents('MemoriasRAMSPECTS___Google_Shopping.json');
$content = json_decode($jsonCont, true);

foreach ($content as $key => $value) {
    $nombre = $value['nombre'];
    $proveedor = $value['Vendidopor'];
    $precio_articulo = floatval($value['Preciodelartículo']);
    $precio_total = floatval($value['Preciototal']);
    $url_imagen = $value['Image_URL'];
    $url_articulo = $value['internallink_URL'];
    $caracteristicas = $value['caracteristicas'];

    /*
     * Procesadores
     */
    /*
      preg_match_all('/([0-9.,]*\sGHz| [0-9.,]*\sGhz| [0-9.,]*GHz | [0-9.,]*Ghz)/', $caracteristicas, $frecuencia);
      preg_match_all('/Socket ([A-Za-z]*\s[0-9]*|[A-Za-z0-9]*)/', $caracteristicas, $socket);
      preg_match_all('/([0-9]*) núcleos/', $caracteristicas, $nucleos);

      echo 'Frecuencia:'. $frecuencia[0][0] . '<br>';
      echo 'Socket: '. $socket[1][0] . '<br>';
      echo 'Núcleos: '. $nucleos[1][0] . '<br>'; */

    /*
     * Placa Base
     */
    /*
      preg_match_all('/(ATX|atx|Atx|MicroATX|micro ATX|Micro ATX)/', $caracteristicas, $factorForma);
      preg_match_all('/Socket ([A-Za-z]*\s[0-9]*|[A-Za-z0-9]*)/', $caracteristicas, $socket);

      echo 'Factor de forma: '. $factorForma[0][0] . '<br>';
      echo 'Socket: '. $socket[1][0] . '<br>'; */

    /*
     * Tarjeta grafica
     */
    /*
      $vrams = ['8GB', '4GB', '10GB'];
      preg_match_all('/([A-Za-z0-9]*\sGB|[A-Za-z0-9]*GB|[A-Za-z0-9]*gb|[A-Za-z0-9]*Gb)/', $caracteristicas, $vram);
      echo isset($vram[0][0]);
      if(!isset($vram[0][0]) || !isset($vram)){
      $vram[0][0] = $vrams[rand(0,count($vrams) - 1)];
      }
      echo $key . ' VRAM: '. $vram[0][0] . '<br>';
     */

    /*
     * Discos duros
     */
    /*
      preg_match_all('/([A-Za-z0-9]*\sGB|[A-Za-z0-9]*GB|[A-Za-z0-9]*gb|[A-Za-z0-9]*Gb|[A-Za-z0-9]*\sTB|[A-Za-z0-9]*TB|[A-Za-z0-9]*tb|[A-Za-z0-9]*tb)/', $caracteristicas, $almacenamiento);
      preg_match_all('/(Estado sólido)/', $caracteristicas, $estadoSolido);
      preg_match_all('/(SATA)/', $caracteristicas, $sata);
      preg_match_all('/(M.2)/', $caracteristicas, $m2);

      $tipo;
      if (!isset($estadoSolido[0][0]) && isset($sata[0][0])) {
      $tipo = 'HDD';
      } elseif (isset($estadoSolido[0][0]) && isset($m2[0][0])) {
      $tipo = 'M.2';
      } elseif (isset($estadoSolido[0][0]) && isset($sata[0][0])) {
      $tipo = 'SSD';
      }
      echo $key . ' Almacenamiento: ' . $tipo . '<br>';
     */
    /*
     * Fuente de alimentacio
     */
    /*
      $potenciaFuente;
      preg_match_all('/([A-Za-z0-9]*\sW|[A-Za-z0-9]*W|[A-Za-z0-9]*vatios|[A-Za-z0-9]*\svatios)/', $nombre, $potencia);

      if(!isset($potencia[0][0])){
      preg_match_all('/([A-Za-z0-9]*\sW|[A-Za-z0-9]*W|[A-Za-z0-9]*vatios|[A-Za-z0-9]*\svatios)/', $caracteristicas, $potencia);
      }
      echo $key . ' Potencia: ' . $potencia[0][0] . '<br>';
     */
    /*
     * Cajas
     */
    /*
      preg_match_all('/(ATX|atx|Atx|MicroATX|micro ATX|Micro ATX)/', $caracteristicas, $factorFormaCaja);

      if (!isset($factorFormaCaja[0][0])) {
      preg_match_all('/(ATX|atx|Atx|MicroATX|micro ATX|Micro ATX)/', $nombre, $factorFormaCaja);
      }

      if (!isset($factorFormaCaja[0][0])) {
      $factoresdeforma = ['ATX', 'MicroATX', 'Mini ITX'];
      $factorFormaCaja[0][0] = $factoresdeforma[rand(0, count($factoresdeforma) - 1)];
      }
      echo $key . ' Factor de forma: ' . $factorFormaCaja[0][0] . '<br>';
     */
    /*
     * Refrigeración
     */
    /*
      preg_match_all('/(líquida|liquida|Líquida|Liquida)/', $caracteristicas, $tipoRefrigeración);

      if (!isset($tipoRefrigeración[0][0])) {
      preg_match_all('/(líquida|liquida|Líquida|Liquida)/', $nombre, $tipoRefrigeración);
      }

      if(!isset($tipoRefrigeración[0][0])){
      $tipoRefrigeración[0][0] = 'Aire';
      }

      echo $key . ' Tipo de refrigeración: ' . $tipoRefrigeración[0][0] . '<br>';
     */

    /*
     * Memoria RAM
     */

    $ddrMemoria = ['DDR4', 'DDR3'];
    $almacenamientoMemoria = ['8GB', '16GB'];
    $frecuenciaMemoria = ['3733 MhZ', '3200 MHz', '3000 MHz'];
    $caracteristicas2 = $value['caracteristicas2'];
    preg_match_all('/(DDR4|ddr4|DDR3|ddr3|DDR2|ddr2)/', $caracteristicas, $ddr);
    preg_match_all('/([A-Za-z0-9]*\sGB|[A-Za-z0-9]*GB|[A-Za-z0-9]*gb|[A-Za-z0-9]*Gb|[A-Za-z0-9]*\sTB|[A-Za-z0-9]*TB|[A-Za-z0-9]*tb|[A-Za-z0-9]*tb)/', $caracteristicas, $almacenamientoRAM);
    preg_match_all('/([A-Za-z0-9]*\sMhZ|[A-Za-z0-9.]*MHZ|[A-Za-z0-9.]*Mhz|[A-Za-z0-9.]*mhz|[A-Za-z0-9.]*\sMHz)/', $caracteristicas, $frecuenciaRAM);

    if (!isset($ddr[0][0])) {
        preg_match_all('/(DDR4|ddr4|DDR3|ddr3|DDR2|ddr2)/', $caracteristicas2, $ddr);
    }

    if (!isset($ddr[0][0])) {
        $ddr[0][0] = $ddrMemoria[rand(0, count($ddrMemoria) - 1)];
    }

    if (!isset($almacenamientoRAM[0][0])) {
        preg_match_all('/([A-Za-z0-9]*\sGB|[A-Za-z0-9]*GB|[A-Za-z0-9]*gb|[A-Za-z0-9]*Gb|[A-Za-z0-9]*\sTB|[A-Za-z0-9]*TB|[A-Za-z0-9]*tb|[A-Za-z0-9]*tb)/', $caracteristicas2, $almacenamientoRAM);
    }

    if (!isset($almacenamientoRAM[0][0])) {
        $almacenamientoRAM[0][0] = $almacenamientoMemoria[rand(0, count($almacenamientoMemoria) - 1)];
    }

    if (!isset($frecuenciaRAM[0][0])) {
        preg_match_all('/([A-Za-z0-9]*\sMhZ|[A-Za-z0-9.]*MHZ|[A-Za-z0-9.]*Mhz|[A-Za-z0-9.]*mhz|[A-Za-z0-9.]*\sMHz)/', $caracteristicas2, $frecuenciaRAM);
    }
    
    if (!isset($frecuenciaRAM[0][0])) {
        $frecuenciaRAM[0][0] = $frecuenciaMemoria[rand(0, count($frecuenciaMemoria) - 1)];
    }

    echo $key . ' Tipo de DDR: ' . $ddr[0][0] . '<br>';
    echo $key . ' Almacenamiento: ' . $almacenamientoRAM[0][0] . '<br>';
    echo $key . ' Frecuencia: ' . $frecuenciaRAM[0][0] . '<br>';
    /*
      $tipo = 'procesador';

      $procesador = new Componente();
      $procesador->setNombre($nombre);
      $procesador->setProveedor($proveedor);
      $procesador->setPrecio_articulo($precio_articulo);
      $procesador->setPrecio_total($precio_total);
      $procesador->setUrl_imagen($url_imagen);
      $procesador->setUrl_articulo($url_articulo);
      $procesador->setTipo($tipo);

      $procesador->registrar(); */
}


