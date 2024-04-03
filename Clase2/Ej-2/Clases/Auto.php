<?php

require_once 'Vehiculo.php';

class Auto extends Vehiculo
{
    public function __construct(int $cant_puertas)
    {
        parent::__construct(4, $cant_puertas);
    }

    public function mensajeRuedasAuto(): string
    {
        return "(rodado: " . $this->getRuedas() . " ruedas).  ";
    }


    public function presentarse(): void
    {
        echo "Soy un auto y tengo " . $this->getPuertas() . " puertas y " . $this->mensajeRuedasAuto();
    }
}
