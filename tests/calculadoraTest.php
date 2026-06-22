<?php

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
    public function testFactorialNormal()
    {
        $calc = new Calculadora();

        $this->assertEquals(120, $calc->factorial(5));
    }

    public function testFactorialCero()
    {
        $calc = new Calculadora();

        $this->assertEquals(1, $calc->factorial(0));
    }

    public function testFactorialNegativo()
    {
        $calc = new Calculadora();

        $this->expectException(InvalidArgumentException::class);

        $calc->factorial(-2);
    }
}