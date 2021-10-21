<?php
include 'Card.php';

class CardCollection
{
    private Array $cards;

    public function __construct(array $cards=[]){
        $this->cards = $cards;
        $this->barajar();
    }

    public function add(array $arrayCard){
        $this->cards=$arrayCard;
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

    public function showCard(){
        for($id=0; $id <count($this->getCards()); $id++){
            $suit = $this->getCards()[$id]->getSuit();
            $symbol = $this->getCards()[$id]->getSymbol();
            $nameOfCard = $suit."_of_".$symbol.".svg";
            $url = "./imgs_cards/".$nameOfCard;

            echo "<spam><img width=100px height=200 src=".$url." /> </spam>";
        }
    }

    public function deal(int $amount): array{
        $this->barajar();
        $playerCards = [];
        $cards = $this->getCards();

        for($i=0; $i < $amount; $i++){
            $selectedCard = array_pop($cards);
            array_push($playerCards, $selectedCard);
        }

        return $playerCards;
    }

    public function play(): Card{
        $cards = $this->getCards();
        $selectedCard = array_pop($cards);
        $this->add($cards);
        return $selectedCard;
    }
}