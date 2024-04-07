<?php


try {
    $pdo = new PDO('mysql:host=localhost;dbname=lavadero;charset=utf8;port=3306', 'root', '');
    echo "Conexion exitosa";
} catch (PDOException $e) {
    echo $e->getMessage();
}


