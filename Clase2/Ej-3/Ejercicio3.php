<?php

class Personaje
{
    // Atributos
    private string $nombre;
    private int $ataque;
    private int $defensa;
    private int $vidas;


    // Constructor
    public function __construct(string $nombre, int $ataque, int $defensa)
    {
        $this->nombre = $nombre;
        $this->ataque = $ataque;
        $this->defensa = $defensa;
        $this->vidas = 3;
    }


    // Getter y setters
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getVidas(): int
    {
        return $this->vidas;
    }


    // ------------------------------------------------------------
    // Metodos

    public function getAtaqueRand(): int
    {
        return rand(0, $this->ataque);
    }

    public function getDefensaRand(): int
    {
        return rand(0, $this->defensa);
    }


    // Metodo para curar
    public function curar(): void
    {
        $this->vidas = 3;
    }

    // Metodo para restar vida
    public function restarVida(): void
    {
        $this->vidas--;
    }



    // -----------------
    // Metodo para atacar
    private function atacar(Personaje $enemigo): bool
    {
        $valorAtaque = $this->getAtaqueRand();
        $valorDefensa = $enemigo->getDefensaRand();
        if ($valorAtaque > $valorDefensa) {
            echo "Atque " . $this->getNombre() . ": " . $valorAtaque;
            echo "<br>";
            echo "Defensa " . $enemigo->getNombre() . ": " . $valorDefensa;
            echo "<br>";
            echo "<br>";
            echo "<b>ATAQUE EFECTIVO!!!</b> - " . $this->getNombre() . " dañó a " . $enemigo->getNombre();
            echo "<br>";
            echo "<br>";
            echo "Vidas pre-ataque " . $enemigo->getNombre() . ": " . $enemigo->getVidas();
            $enemigo->restarVida();
            echo "<br>";
            echo "Vidas post-ataque " . $enemigo->getNombre() . ": " . $enemigo->getVidas();
            echo "<br>";
            echo "<br>";
            echo "---------";
            return true;
        } else {
            echo "Atque " . $this->getNombre() . ": " . $valorAtaque;
            echo "<br>";
            echo "Defensa " . $enemigo->getNombre() . ": " . $valorDefensa;
            echo "<br>";
            echo "<br>";
            echo "<b>ATAQUE FALLIDO!!!</b> - " . $this->getNombre() . " atacó a " . $enemigo->getNombre() . " pero <u>falló</u>.";
            echo "<br>";
            echo "Vidas: " . $this->getNombre() . ": " . $this->getVidas();
            echo "<br>";
            echo "Vidas: " . $enemigo->getNombre() . ": " . $enemigo->getVidas();
            echo "<br>";
            echo "<br>";
            echo "---------";
            return false;
        }

    }

    // -----------------
    // Metodo para defender
    private function defender(Personaje $enemigo): bool
    {
        $valorDefensa = $this->getDefensaRand();
        $valorAtaque = $enemigo->getAtaqueRand();
        if ($valorDefensa > $valorAtaque) {
            echo "Vidas: " . $this->getVidas();
            echo "<br>";
            echo "Atque " . $enemigo->getNombre() . ": " . $valorAtaque;
            echo "<br>";
            echo "Defensa " . $this->getNombre() . ": " . $valorDefensa;
            echo "<br>";
            echo "<br>";
            echo "<b>ATAQUE FALLIDO!!!</b> - " . $enemigo->getNombre() . " atacó a " . $this->getNombre() . " pero <u>falló</u>.";
            echo "<br>";
            echo "Vidas: " . $this->getNombre() . ": " . $this->getVidas();
            echo "<br>";
            echo "Vidas: " . $enemigo->getNombre() . ": " . $enemigo->getVidas();
            echo "<br>";
            echo "<br>";
            echo "---------";
            return true;
        } else {
            echo "Atque " . $enemigo->getNombre() . ": " . $valorAtaque;
            echo "<br>";
            echo "Defensa " . $this->getNombre() . ": " . $valorDefensa;
            echo "<br>";
            echo "<br>";
            echo "<b>ATAQUE EFECTIVO!!!</b> - " . $enemigo->getNombre() . " dañó a " . $this->getNombre();
            echo "<br>";
            echo "<br>";
            echo "Vidas pre-ataque " . $this->getNombre() . ": " . $this->getVidas();
            $this->restarVida();
            echo "<br>";
            echo "Vidas restantes " . $this->getNombre() . ": " . $this->getVidas();
            echo "<br>";
            echo "<br>";
            echo "---------";
            return false;
        }
    }

    public function pelear(Personaje $enemigo): void
    {
        $tipoDePelea = rand(1, 2);

        if ($tipoDePelea == 1) {
            echo $this->getNombre() . " <i>ATACA</i>";
            echo "<br>";
            $this->atacar($enemigo);
        } else {
            echo $this->getNombre() . " <i>DEFIENDE</i>";
            echo "<br>";
            $this->defender($enemigo);
        }

    }
    public static function simularPelea($personaje1, $personaje2): void
    {

        $tipoDePelea = rand(1, 2);

        if ($tipoDePelea == 1) {
            echo $personaje1->getNombre() . " <i>ATACA</i>";
            echo "<br>";
            $personaje1->atacar($personaje2);
        } else {
            echo $personaje1->getNombre() . " <i>DEFIENDE</i>";
            echo "<br>";
            $personaje1->defender($personaje2);
        }

    }

    public static function simularMultPelea($personaje1, $personaje2, $cantRondas): void
    {
        for ($i = 0; $i < $cantRondas; $i++) {
            Personaje::simularPelea($personaje1, $personaje2);
            echo "<br>";
            echo "<br>";
        }
    }
}


