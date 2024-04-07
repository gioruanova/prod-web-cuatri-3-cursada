<?php

class Producto
{

    private int $codigo;
    private string $nombre;
    private float $precio;
    private int $stock;


    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }

    public function getStock(): int
    {
        return $this->stock;
    }




    public function __construct(int $codigo, string $nombre, float $precio, int $stock)
    {

        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public function mostrarProducto(): void
    {
        echo "Codigo: " . $this->codigo . "<br>Nombre: " . $this->nombre . "<br>Precio: " . $this->precio . "<br>Stock: " . $this->stock . "<br>";
    }

}
