<?php

use PHPUnit\Framework\TestCase;
use App\Cliente;
use App\Habitacion;
use App\Reserva;

class ReservaTest extends TestCase
{
    private Cliente $cliente;
    private Habitacion $habitacion;

    protected function setUp(): void
    {
        $this->cliente = new Cliente(
            "Juan",
            "juan@gmail.com",
            "999999999"
        );

        $this->habitacion = new Habitacion(
            101,
            "Simple",
            150
        );
    }

    public function testFechaIngresoInvalida()
    {
        $this->expectException(InvalidArgumentException::class);

        new Reserva(
            $this->cliente,
            $this->habitacion,
            "fecha",
            "2027-01-05"
        );
    }

    public function testFechaIngresoPasada()
    {
        $this->expectException(InvalidArgumentException::class);

        new Reserva(
            $this->cliente,
            $this->habitacion,
            "2020-01-01",
            "2020-01-03"
        );
    }

    public function testFechaSalidaAnterior()
    {
        $this->expectException(InvalidArgumentException::class);

        new Reserva(
            $this->cliente,
            $this->habitacion,
            "2027-01-10",
            "2027-01-05"
        );
    }

    public function testCalcularTotal()
    {
        $habitacion = new Habitacion(
            101,
            "Simple",
            100
        );

        $reserva = new Reserva(
            $this->cliente,
            $habitacion,
            "2027-01-01",
            "2027-01-04"
        );

        $this->assertEquals(
            300,
            $reserva->calcularTotal()
        );
    }
}