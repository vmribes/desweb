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

    public function getSuit(){
        return $this->suit;
    }

    public function getSymbol(){
        return $this->symbol;
    }

    public function getValue(){
        return $this->value;
    }

    public function setSuit($newValue){
        $this->suit = $newValue;
    }

    public function setSymbol($newValue){
        $this->symbol = $newValue;
    }

    public function setValue($newValue){
        $this->value = $newValue;
    }
}