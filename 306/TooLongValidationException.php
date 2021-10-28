<?php

class TooLongValidationException extends ValidationException
{
    public function __construct($campo, $longitud, $message = " es demasiado largo, ha de tener una longitud máxima de ")
    {
        parent::__construct($campo.$message.$longitud.".");
    }
}