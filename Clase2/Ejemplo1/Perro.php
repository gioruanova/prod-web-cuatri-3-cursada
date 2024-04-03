<?php

class Perro extends Mascota
{
   

    public function ladrar(): void
    {
        echo $this->nombre . " Guau";
    }

    
}
