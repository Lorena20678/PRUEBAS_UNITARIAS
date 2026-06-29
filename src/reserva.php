<?php

namespace App;

class Reserva
{
    private Cliente $cliente;
    private Habitacion $habitacion;
    private string $fechaIngreso;
    private string $fechaSalida;

    public function __construct(
        Cliente $cliente,
        Habitacion $habitacion,
        string $fechaIngreso,
        string $fechaSalida
    ) {
        $ingreso = \DateTime::createFromFormat('Y-m-d', $fechaIngreso);
        $salida = \DateTime::createFromFormat('Y-m-d', $fechaSalida);

        if (!$ingreso) {
            throw new \InvalidArgumentException("Fecha de ingreso inválida.");
        }

        if (!$salida) {
            throw new \InvalidArgumentException("Fecha de salida inválida.");
        }

        $hoy = new \DateTime();

        if ($ingreso < $hoy->setTime(0, 0, 0)) {
            throw new \InvalidArgumentException("La fecha de ingreso no puede estar en el pasado.");
        }

        if ($salida <= $ingreso) {
            throw new \InvalidArgumentException("La fecha de salida debe ser posterior a la fecha de ingreso.");
        }

        $this->cliente = $cliente;
        $this->habitacion = $habitacion;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaSalida = $fechaSalida;
    }

    public function calcularTotal(): float
    {
        $ingreso = new \DateTime($this->fechaIngreso);
        $salida = new \DateTime($this->fechaSalida);

        $dias = $ingreso->diff($salida)->days;

        return $dias * $this->habitacion->getPrecio();
    }
}