<?php

require_once 'Clases/Camion.php';
require_once 'Clases/Moto.php';
require_once 'Clases/Auto.php';

$auto1 = new Auto(4);
$moto1 = new Moto();
$camion1 = new Camion(17);

$auto1->presentarse();
echo "<br>";

$camion1->presentarse();

echo "<br>";
$moto1->presentarse();