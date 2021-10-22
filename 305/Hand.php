<?php

class Hand extends CardCollection
{

    public function play(): Card{
        $cards = $this->getCards();
        $selectedCard = array_pop($cards);
        $this->add($cards);
        return $selectedCard;
    }

}