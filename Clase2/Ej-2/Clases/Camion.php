<?php

require_once 'Vehiculo.php';

class Camion extends Vehiculo
{
    public function __construct(int $cant_ruedas)
    {
        parent::__construct($cant_ruedas, 2);
    }

    public function presentarse(): void
    {
        echo "Soy un Camion y tengo " . $this->getPuertas() . " puertas y " . $this->getRuedas() . " ruedas";
    }
}

