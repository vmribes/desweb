<?php


require 'helpers.php';

include 'CardCollection.php';
include 'Card.php';

include 'Deck.php';
include 'Hand.php';

$cards = [];
$deck = new Deck();

$deck->add($cards);

$symbols = ["spades", "diamonds", "clubs", "hearts"];
$values = [1=>"A",2=>"2",3=>"3",4=>"4",5=>"5",6=>"6",7=>"7",8=>8,9=>"9",10=>"10",11=>"J",12=>"Q",13=>"K"];

for($i=0; $i< count($symbols); $i++){
    for($j=1; $j<=13; $j++){
        $newCard = new Card($values[$j],$symbols[$i],$j);
        $deck->addCard($newCard);
    }
}

$deck->shuffle();

$handPlayer1 = new Hand();
$handPlayer2 = new Hand();

$handPlayer1->add($deck->deal(5));
$handPlayer2->add($deck->deal(5));
$puntos = ["player1"=>0,"player2"=>0];




$cardsPlayer1 = clone $handPlayer1;
$cardsPlayer2 = clone $handPlayer2;

$empate = false;

require '305.vista.php';
?>