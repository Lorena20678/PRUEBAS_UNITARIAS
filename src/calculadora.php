<?php

namespace App;

use InvalidArgumentException;

class Calculadora
{
    public function dividir($a, $b)
    {
        if ($b == 0) {
            throw new InvalidArgumentException("No se puede dividir entre cero");
        }

        return $a / $b;
    }

    public function factorial($n)
    {
        if ($n < 0) {
            throw new InvalidArgumentException("Número negativo");
        }

        if ($n == 0) {
            return 1;
        }

        $resultado = 1;

        for ($i = 1; $i <= $n; $i++) {
            $resultado *= $i;
        }

        return $resultado;
    }
}