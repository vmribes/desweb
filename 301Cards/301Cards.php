<?php
include 'Card.php';
$card1 = new Card("J","spades",10);
$card2 = new Card("Q","diamonds",11);
$card3 = new Card("5","clubs",5);
$card4 = new Card("A","hearts",1);
$card5 = new Card("2","spades",2);

$cards = [];

array_push($cards, $card1, $card2, $card3, $card4, $card5);
shuffle($cards);

for($i=0; $i < count($cards); $i++){
    echo "Carta $i <br>";
    echo $cards[$i]->__get("suit");
    echo ", ";
    echo $cards[$i]->__get("symbol");
    echo ", ";
    echo $cards[$i]->__get("value");
    echo "<br>";
}


?>