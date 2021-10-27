<?php

class Employee
{
    private string $nom;
    private string $cognoms;
    private int $sou;
    private Array $numTels = [];
    const MAX_SALARY = 3333;

    public function __construct(string $nom, string $cognos, int $sou = 1000){
        $this->nom = $nom;
        $this->cognoms = $cognos;
        $this->sou = $sou;
    }

    public function getNom(){
        return $this->nom;
    }

    public function setNom(string $nom){
        $this->nom = $nom;
    }

    public function getCognoms(){
        return $this->cognoms;
    }

    public function setCognoms(string $cognoms){
        $this->cognoms = $cognoms;
    }

    public function getSou(){
        return $this->sou;
    }

    public function setSou(int $sou){
        $this->sou = $sou;
    }

    public function getFullName():string{
        return $this->getNom() ." ".$this->getCognoms();
    }

    public function mustPayTaxes():bool{
        if($this->getSou() > self::MAX_SALARY){
            return true;
        }else{
            return false;
        }
    }

    public function addPhone(string $phone){
        array_push($this->numTels, $phone);
}

public function listPhones(): string{
        return implode(", ",$this->numTels);
}

public function emptyPhones(){
    $this->numTels = array();
}

public static function toHtml (Employee $emp): string{
        $cobrar = $emp->mustPayTaxes() ? "más" :"menos";
        $cobrar ="cobro ".$cobrar." del salario máximo";
        $p = "Hola, me llamo".$emp->getFullName().", tengo un salario de ".$emp->getSou().", lo que significa que ".$cobrar.". Mi lista de telefonos es: ".$emp->listPhones().".";
        return $p;
}

}