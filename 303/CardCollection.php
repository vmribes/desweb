<?php
include 'Card.php';

class CardCollection
{
    private Array $cards;

    public function __construct(array $cards=[]){
        $this->cards = $cards;
    }

    public function add(array $arrayCard){
        $this->cards=$arrayCard;
        shuffle($this->cards);
    }

    public function addCard(Card $card){
        $temp = $this->getCards();
        array_push($temp, $card);
        $this->cards =$temp;
        $this->barajar();
    }

    public function barajar(){
        shuffle($this->cards);
    }

    public function getCards(){
        return $this->cards;
    }

}