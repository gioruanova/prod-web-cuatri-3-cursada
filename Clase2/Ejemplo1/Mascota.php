<?php

abstract class Mascota
{
    protected string $nombre;
    protected float $peso;

    public function __construct(string $nombre, float $peso)
    {
        $this->nombre = $nombre;
        $this->peso = $peso;
    }

    public function comer($cantidad): void
    {
        $this->peso += $cantidad;
    }

    public function jugar($cantidad): void
    {
        $this->peso -= $cantidad;
    }

}


