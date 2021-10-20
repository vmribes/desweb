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
        $this->barajar();
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

    public function writer(){
        for($i=0; $i < count($this->getCards()); $i++){
            $numCarta = $i+1;
            echo "<h3>Carta $numCarta</h3>";
            echo "<p>".$this->getCards()[$i]->getSuit() .",".
                $this->getCards()[$i]->getSymbol(). ",".
                $this->getCards()[$i]->getValue() ."</p>";
        }

    }

    public function showCards(){
        for($id=0; $id <count($this->getCards()); $id++){
            $suit = $this->getCards()[$id]->getSuit();
            $symbol = $this->getCards()[$id]->getSymbol();
            $nameOfCard = $suit."_of_".$symbol.".svg";
            $url = "./imgs_cards/".$nameOfCard;

            echo "<img src=".$url." />";
        }
    }

}