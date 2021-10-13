<?php

class Card
{
    private string $suit;
    private string $symbol;
    private int $value;
    public function __construct(string $suit, string $symbol, int $value){
        $this->suit = $suit;
        $this->symbol = $symbol;
        $this->value = $value;
    }

    public function __get($property){
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        }

        return $this;
    }
}