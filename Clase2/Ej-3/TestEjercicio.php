<?php

require_once 'Ejercicio3.php';


// ----------------------
// TESTING---------------

$superman = new Personaje("Superman", 10, 20);
$batman = new Personaje("Batman", 15, 5);


for ($i = 0; $i < 3; $i++) {

    Personaje::simularPelea($superman, $batman);
    echo "<br>";
    echo "<br>";
}
;






// ----------------------------

echo "<br>";
echo "FIN DE LA PELEA";
echo "<br>";
echo "---------------";
echo "<br>";

if ($superman->getVidas() > $batman->getVidas()) {
    echo "Vidas " . $superman->getNombre() . ": " . $superman->getVidas();
    echo "<br>";
    echo "Vidas " . $batman->getNombre() . ": " . $batman->getVidas();
    echo "<br>";
    echo "<br>";
    echo 'Ganó Superman';
} else if ($superman->getVidas() < $batman->getVidas()) {
    echo "Vidas " . $superman->getNombre() . ": " . $superman->getVidas();
    echo "<br>";
    echo "Vidas " . $batman->getNombre() . ": " . $batman->getVidas();
    echo "<br>";
    echo "<br>";
    echo 'Ganó Batman';
} else {
    echo "Vidas " . $superman->getNombre() . ": " . $superman->getVidas();
    echo "<br>";
    echo "Vidas " . $batman->getNombre() . ": " . $batman->getVidas();
    echo "<br>";
    echo "<br>";
    echo 'Empate';
}


// simularPelea($superman, $batman);