<?php

require_once 'Vehiculo.php';

class Moto extends Vehiculo
{
    public function __construct()
    {
        parent::__construct(2, 0);
    }

    public function presentarse(): void
    {
        echo "Soy una moto solo tengo 2 ruedas";
    }
}

