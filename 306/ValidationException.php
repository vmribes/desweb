<?php

class ValidationException extends Exception
{
    public function __construct($message = "Hay una excepción de validación")
    {
        parent::__construct($message);
    }

}

?>