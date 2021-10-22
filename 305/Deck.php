<?php

class Deck extends CardCollection
{

    public function shuffle(){
        $temp = parent::getCards();
        shuffle($temp);
        $this->add($temp);

    }

    public function deal(int $amount=1){
        $playerCards = [];
        $cards = parent::getCards();

        for($i=0; $i < $amount; $i++){
            $selectedCard = array_pop($cards);
            array_push($playerCards, $selectedCard);
        }

        parent::add($cards);

        return $playerCards;
}

}