<?php

use PHPUnit\Framework\TestCase;
use App\Validador;

class ValidadorTest extends TestCase
{
    public function testValidarEmailInvalido()
    {
        $validador = new Validador();

        $this->expectException(Exception::class);

        $validador->validarEmail("correo");
    }

    public function testValidarPasswordNormal()
    {
        $validador = new Validador();

        $this->assertTrue(
            $validador->validarPassword("clave123")
        );
    }

    public function testValidarPasswordCorta()
    {
        $validador = new Validador();

        $this->expectException(Exception::class);

        $validador->validarPassword("abc");
    }

    public function testValidarPasswordSinNumero()
    {
        $validador = new Validador();

        $this->expectException(Exception::class);

        $validador->validarPassword("abcdefgh");
    }
}