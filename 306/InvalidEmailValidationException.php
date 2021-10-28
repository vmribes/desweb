<?php

class InvalidEmailValidationException extends ValidationException
{
    public function __construct($message = "Correo electrónico no valido.")
    {
        parent::__construct($message);
    }
}