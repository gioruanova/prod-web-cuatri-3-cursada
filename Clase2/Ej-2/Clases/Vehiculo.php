<?php

abstract class Vehiculo
{
    private int $cant_ruedas;
    private int $cant_puertas;

    public function __construct(int $cant_ruedas, int $cant_puertas)
    {
        $this->cant_ruedas = $cant_ruedas;
        $this->cant_puertas = $cant_puertas;
    }

    public function getRuedas(): int
    {
        return $this->cant_ruedas;
    }

    public function getPuertas(): int
    {
        return $this->cant_puertas;
    }


    public function presentarse(): void
    {
        echo "Soy un vehiculo y tengo " . $this->cant_puertas . " puertas y " . $this->cant_ruedas . " ruedas.";
    }

}

