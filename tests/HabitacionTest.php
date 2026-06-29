<?php

use PHPUnit\Framework\TestCase;
use App\Habitacion;

class HabitacionTest extends TestCase
{
    public function testNumeroCero()
    {
        $this->expectException(InvalidArgumentException::class);

        new Habitacion(0, "Simple", 120);
    }

    public function testPrecioCero()
    {
        $this->expectException(InvalidArgumentException::class);

        new Habitacion(101, "Simple", 0);
    }

    public function testReservarHabitacionDisponible()
    {
        $habitacion = new Habitacion(101, "Simple", 120);

        $habitacion->reservar();

        $this->assertFalse($habitacion->isDisponible());
    }

    public function testReservarHabitacionNoDisponible()
    {
        $this->expectException(Exception::class);

        $habitacion = new Habitacion(101, "Simple", 120);

        $habitacion->reservar();
        $habitacion->reservar();
    }
}