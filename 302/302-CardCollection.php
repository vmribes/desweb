<?php
include 'CardCollection.php';
$card1 = new Card("J","spades",10);
$card2 = new Card("Q","diamonds",11);
$card3 = new Card("5","clubs",5);
$card4 = new Card("A","hearts",1);
$card5 = new Card("2","spades",2);

$cards = [];
array_push($cards, $card1, $card2, $card3);

$cardCollection = new CardCollection($cards);


for($i=0; $i < count($cardCollection->getCards()); $i++){
    echo "Carta $i <br>";
    echo $cardCollection->getCards()[$i]->getSuit();
    echo ", ";
    echo $cardCollection->getCards()[$i]->getSymbol();
    echo ", ";
    echo $cardCollection->getCards()[$i]->getValue();
    echo "<br>";
}

echo "Añado una carta extra <br>";

$card6 = new Card("3","diamonds",3);
$cardCollection->addCard($card6);

for($i=0; $i < count($cardCollection->getCards()); $i++){
    echo "Carta $i <br>";
    echo $cardCollection->getCards()[$i]->getSuit();
    echo ", ";
    echo $cardCollection->getCards()[$i]->getSymbol();
    echo ", ";
    echo $cardCollection->getCards()[$i]->getValue();
    echo "<br>";
}

echo "Cambiamos de baraja <br>";
$cards2 = [];
array_push($cards2, $card4, $card5);
$cardCollection->add($cards2);
for($i=0; $i < count($cardCollection->getCards()); $i++){
    echo "Carta $i <br>";
    echo $cardCollection->getCards()[$i]->getSuit();
    echo ", ";
    echo $cardCollection->getCards()[$i]->getSymbol();
    echo ", ";
    echo $cardCollection->getCards()[$i]->getValue();
    echo "<br>";
}
?>
