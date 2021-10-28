<?php

class InvalidPhoneValidationException extends ValidationException
{
    public function __construct($message = "Número de teléfono no valido.")
    {
        parent::__construct($message);
    }
}