<?php

namespace App;

class Habitacion
{
    private int $numero;
    private string $tipo;
    private float $precio;
    private bool $disponible;

    public function __construct(int $numero, string $tipo, float $precio)
    {
        if ($numero <= 0) {
            throw new \InvalidArgumentException("El número debe ser mayor que cero.");
        }

        if ($precio <= 0) {
            throw new \InvalidArgumentException("El precio debe ser mayor que cero.");
        }

        $this->numero = $numero;
        $this->tipo = $tipo;
        $this->precio = $precio;
        $this->disponible = true;
    }

    public function reservar(): void
    {
        if (!$this->disponible) {
            throw new \Exception("La habitación ya está reservada.");
        }

        $this->disponible = false;
    }

    public function isDisponible(): bool
    {
        return $this->disponible;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function getPrecio(): float
    {
        return $this->precio;
    }
}