<?php
function compareCards(Hand $hanPlayer1, Hand $hanPlayer2, $puntos){
    for($i=count($hanPlayer1->getCards())-1; $i >= 0; $i--) {
        if ($hanPlayer1->getCards()[$i]->getValue() > $hanPlayer2->getCards()[$i]->getValue()) {
            echo "<td>Gana Player 1</td>";
            $puntos["player1"] = $puntos["player1"] + 1;
        } elseif ($hanPlayer1->getCards()[$i]->getValue() < $hanPlayer2->getCards()[$i]->getValue()) {
            echo "<td>Gana Player 2</td>";
            $puntos["player2"] = $puntos["player2"] + 1;
        } else {
            echo "<td>Empate</td>";
        }
    }

    return $puntos;
}

function comparePoints($puntos){
    if($puntos["player1"] > $puntos["player2"]){
        echo "<h1>El ganador es el Player 1</h1>";
        return false;
    }elseif($puntos["player1"] < $puntos["player2"]){
        echo "<h1>El ganador es el Player 2</h1>";
        return false;
    }else{
        echo "<h1>Empate</h1>";
        return true;
    }
}

function comparePointsFinalRound($puntos){
    if($puntos["player1"] > $puntos["player2"]){
        echo "<h1>El ganador definitivo es el Player 1</h1>";
    }elseif($puntos["player1"] < $puntos["player2"]){
        echo "<h1>El ganador definitivo es el Player 2</h1>";
    }else{
        echo "<h1>Empate definitivo, esto no hay forma de que alguien gane</h1>";
    }
}
?>