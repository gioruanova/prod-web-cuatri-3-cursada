<?php


require_once 'Mascota.php';
require_once 'Perro.php';
require_once 'Gato.php';

$mascota = new Perro("Rufus", 10.40);
$mascotaDos = new Gato("pepe",20.50);

$mascota->ladrar();

echo "<br>";

$mascotaDos->maullar();

