<?php

namespace App;

use Exception;

class Validador
{
    public function validarEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Email inválido");
        }

        return true;
    }

    public function validarPassword($password)
    {
        if (strlen($password) < 8) {
            throw new Exception("Contraseña demasiado corta");
        }

        if (!preg_match('/[0-9]/', $password)) {
            throw new Exception("Debe contener al menos un número");
        }

        return true;
    }
}