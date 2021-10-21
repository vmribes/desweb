<?php
include 'CardCollection.php';

$cards = [];
$cardCollection = new CardCollection($cards);

$symbols = ["spades", "diamonds", "clubs", "hearts"];
$values = [1=>"A",2=>"2",3=>"3",4=>"4",5=>"5",6=>"6",7=>"7",8=>8,9=>"9",10=>"10",11=>"J",12=>"Q",13=>"K"];

for($i=0; $i< count($symbols); $i++){
    for($j=1; $j<=13; $j++){
        $newCard = new Card($values[$j],$symbols[$i],$j);
        $cardCollection->addCard($newCard);
    }
}
$cardsPlayer1 = $cardCollection->deal(5);
$HandPlayer1 = new CardCollection($cardsPlayer1);

$cardsPlayer2 = $cardCollection->deal(5);
$HandPlayer2 = new CardCollection($cardsPlayer2);



include '304.vista.php';

?>