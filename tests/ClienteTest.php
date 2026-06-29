<?php

use PHPUnit\Framework\TestCase;
use App\Cliente;

class ClienteTest extends TestCase
{
    public function testNombreVacio()
    {
        $this->expectException(InvalidArgumentException::class);

        new Cliente("", "correo@gmail.com", "999999999");
    }

    public function testEmailInvalido()
    {
        $this->expectException(InvalidArgumentException::class);

        new Cliente("Juan", "correo_invalido", "999999999");
    }

    public function testClienteCorrecto()
    {
        $cliente = new Cliente(
            "Juan Perez",
            "juan@gmail.com",
            "999999999"
        );

        $this->assertEquals("Juan Perez", $cliente->getNombre());
        $this->assertEquals("juan@gmail.com", $cliente->getEmail());
        $this->assertEquals("999999999", $cliente->getTelefono());
    }
}