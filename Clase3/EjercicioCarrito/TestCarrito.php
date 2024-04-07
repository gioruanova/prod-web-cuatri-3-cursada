<?php

session_start();
require_once 'Producto.php';
require_once 'Cart.php';



// Crear una instancia de Usuarios y agregar usuarios
$producto1 = new Producto(1000, "Monitor HD", 800000.40, 20);
$producto2 = new Producto(1005, "Gabinete", 250000.44, 5);
$producto3 = new Producto(2120, "Memorias Ram", 80000.80, 5);


Cart::crearCarrito();
// Cart::terminarCarrito();
echo "<br>";
echo "<br>";

Cart::put($producto2,2);
echo "<br>";
echo "---------------------------------------------------------------------";
Cart::put($producto1,1);
echo "<br>";
echo "---------------------------------------------------------------------";
// Cart::put($producto3,3);
echo "<br>";
echo "---------------------------------------------------------------------";
Cart::get();








// Cart::clear();

// echo "<br>Eliminando producto id 1000 (computadora)";
// echo "<br>||||||||||||||||||||||||||||||||||||||||||||||||||<br>";
// Cart::remove(2120);
// echo "<br>||||||||||||||||||||||||||||||||||||||||||||||||||<br>";
// echo "<br>";
// Cart::get();

