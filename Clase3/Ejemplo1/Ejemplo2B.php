<?php


require_once ('Ejemplo2.php');

try {
    $cnx1 = Cnx::getInstance();
} catch (PDOException $e) {
    echo $e->getMessage();
}