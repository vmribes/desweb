        <table>
            <tr>
        <td><h3>Player 1:</h3></td>
        <?php
        $HandPlayer1CS = clone $HandPlayer1;
        while (count($HandPlayer1->getCards())>0){
            $selectedCard = $HandPlayer1->play();
            $suit = $selectedCard->getSuit();
            $symbol = $selectedCard->getSymbol();
            $nameOfCard = $suit."_of_".$symbol.".svg";
            $url = "./imgs_cards/".$nameOfCard;

            ?><td><img id="p1-<?php echo count($HandPlayer1->getCards()); ?>" width=150px height=300px src="<?php echo $url ?>"/> </td><?php
        }
        ?>
            </tr>
        <td><h3>Player 2:</h3></td>
        <?php
        $HandPlayer2CS = clone $HandPlayer2;
        while (count($HandPlayer2->getCards())>0){
            $selectedCard = $HandPlayer2->play();
            $suit = $selectedCard->getSuit();
            $symbol = $selectedCard->getSymbol();
            $nameOfCard = $suit."_of_".$symbol.".svg";
            $url = "./imgs_cards/".$nameOfCard;

            ?><td><img id="p2-<?php echo count($HandPlayer2->getCards()); ?>" width=150px height=300px src="<?php echo $url ?>"/> </td><?php
        }

        ?>
            <tr>
                <td></td>
                <?php
                $puntosP1 = 0;
                $puntosP2 = 0;
                for($i=4; $i >= 0; $i--){

                    ?><td><?php if($HandPlayer1CS->getCards()[$i]->getValue() > $HandPlayer2CS->getCards()[$i]->getValue()){echo "Gana Player 1"; $puntosP1++;}
                    elseif($HandPlayer1CS->getCards()[$i]->getValue() < $HandPlayer2CS->getCards()[$i]->getValue()){echo"Gana Player 2"; $puntosP2++;}
                    else{echo "Empate";}?></td><?php
                }

                ?>
            </tr>
        </table>

        <?php
        if($puntosP1 > $puntosP2){
            echo "<h5>Gana el Jugador1</h5>";
        }elseif($puntosP2 > $puntosP1){
            echo "<h5>Gana el Juagdor2</h5>";}
        else{
            echo "<h5>Empate</h5>";
            echo "<h3>¡Una ronda más!</h3>";

            $cardsPlayer1 = $cardCollection->deal(1);
            $HandPlayer1 = new CardCollection($cardsPlayer1);

            $cardsPlayer2 = $cardCollection->deal(1);
            $HandPlayer2 = new CardCollection($cardsPlayer2);

            ?>
            <table>
                <tr>
                    <td><h3>Player 1:</h3></td>
                    <?php
                    $HandPlayer1CS = clone $HandPlayer1;
                    while (count($HandPlayer1->getCards())>0){
                        $selectedCard = $HandPlayer1->play();
                        $suit = $selectedCard->getSuit();
                        $symbol = $selectedCard->getSymbol();
                        $nameOfCard = $suit."_of_".$symbol.".svg";
                        $url = "./imgs_cards/".$nameOfCard;

                        ?><td><img id="p1-<?php echo count($HandPlayer1->getCards()); ?>" width=150px height=300px src="<?php echo $url ?>"/> </td><?php
                    }
                    ?>
                </tr>
                <td><h3>Player 2:</h3></td>
                <?php
                $HandPlayer2CS = clone $HandPlayer2;
                while (count($HandPlayer2->getCards())>0){
                    $selectedCard = $HandPlayer2->play();
                    $suit = $selectedCard->getSuit();
                    $symbol = $selectedCard->getSymbol();
                    $nameOfCard = $suit."_of_".$symbol.".svg";
                    $url = "./imgs_cards/".$nameOfCard;

                    ?><td><img id="p2-<?php echo count($HandPlayer2->getCards()); ?>" width=150px height=300px src="<?php echo $url ?>"/> </td><?php
                }

                ?>
                <tr>
                    <td></td>
                    <?php

                    ?><td><?php if($HandPlayer1CS->getCards()[0]->getValue() > $HandPlayer2CS->getCards()[0]->getValue()){$puntosP1++; echo "<h1>Gana Player 1 con $puntosP1 puntos</h1>";}
                        elseif($HandPlayer1CS->getCards()[0]->getValue() < $HandPlayer2CS->getCards()[0]->getValue()){$puntosP2++; echo"<h1>Gana Player 2 con $puntosP2 puntos</h1>"; }
                        else{echo "<h1>Empate, esto no hay forma de que alguien gane</h1>";}?></td><?php
                    ?>
                </tr>
            </table>
        <?php
        }
        ?>


