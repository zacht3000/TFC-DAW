<?php
	
require_once 'Componente.php';

$componente = new Componente();

$componente->setNombre('Nfortec Hydrus V2 120 Red Kit de Refrigeración Líquida');
$componente->setDescripcion('Llega la nueva versión de nuestra reconocida refrigeración líquida Hydrus. Una renovación completa de todos los materiales originales que aumentan su efectividad y funcionamiento, manteniendo la gran durabilidad que siempre ha caracterizado a nuestra refrigeración veterana. Os presentamos a Nfortec Hydrus V2.');
$componente->setPrecio_pccom(49.95);
$componente->setPrecio_amazon(55.41);
$componente->setMarca('Nfortec');
$componente->setTipo('tarjeta_grafica');
$componente->setUrl_pccom('https://www.pccomponentes.com/nfortec-hydrus-v2-120-red-kit-de-refrigeracion-liquida');
$componente->setUrl_amazon('https://www.amazon.es/Nfortec-Refrigeraci%C3%B3n-L%C3%ADquida-Ventilador-Compatible/dp/B07XDTB5KY/ref=sr_1_1?__mk_es_ES=%C3%85M%C3%85%C5%BD%C3%95%C3%91&dchild=1&keywords=nfortec+hydrus+120+red+kit&qid=1614903613&quartzVehicle=106-1339&replacementKeywords=nfortec+hydrus+red+kit&sr=8-1');
$componente->setUrl_imagen('https://img.pccomponentes.com/articles/23/230249/11.jpg');

$componente->registrar();
echo 'hola';