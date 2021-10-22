<?php

abstract class CardCollection
{
    private Array $cards;

    public function add(array $cards){
        $this->cards=$cards;
    }

    public function addCard(Card $card){
        $temp = $this->getCards();
        array_push($temp, $card);
        $this->cards =$temp;
    }

    public function getCards(): array{
        return $this->cards;
    }

    public function writer(Card $card){
        $nameOfCard = $card->getSuit()."_of_".$card->getSymbol().".svg";
        $url = "./imgs_cards/".$nameOfCard;

        echo "<img width=150px height=300px src=".$url."/> ";

    }

}