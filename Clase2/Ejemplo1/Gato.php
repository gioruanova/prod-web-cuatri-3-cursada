<?php

class Gato extends Mascota
{
    public function maullar(): void
    {
        echo $this->nombre . " Miau";
    }
}
