<?php
include 'CardCollection.php';

$cards = [];
$symbols = ["spades", "diamonds", "clubds", "hearts"];
$values = [1=>"A",2=>"2",3=>"3",4=>"4",5=>"5",6=>"6",7=>"7",8=>8,9=>"9",10=>"10",11=>"J",12=>"Q",13=>"K"];

for($i=0; $i< count($symbols); $i++){
    for($j=1; $j<=13; $j++){
        $newCard = new Card($values[$j],$symbols[$i],$j);
        array_push($cards, $newCard);
    }
}

$cardCollection = new CardCollection($cards);

for($i=0; $i < count($cardCollection->getCards()); $i++){
    $numCarta = $i+1;
    echo "Carta $numCarta: <br>";
    echo $cardCollection->getCards()[$i]->getSuit();
    echo ", ";
    echo $cardCollection->getCards()[$i]->getSymbol();
    echo ", ";
    echo $cardCollection->getCards()[$i]->getValue();
    echo "<br><br>";
}
?>

