<table>
    <tr>
        <td><h3>Player 1:</h3></td>
        <?php

        while(count($cardsPlayer1->getCards())>0){
            $selectedCard = $cardsPlayer1->play();
            ?><td><?php $handPlayer1->writer($selectedCard); ?></td><?php
        }
        ?>
    </tr>

    <td><h3>Player 2:</h3></td>
    <?php

    while(count($cardsPlayer2->getCards())>0){
        $selectedCard = $cardsPlayer2->play();
        ?><td><?php $handPlayer2->writer($selectedCard); ?></td><?php
    }
    ?>
    </tr>
        <tr>
            <td></td>
            <?php

            $puntos = compareCards($handPlayer1,$handPlayer2, $puntos);
            ?>
        </tr>
    </table>

<?php
    $empate = comparePoints($puntos);

    if($empate){
        $cardsPlayer1->add($deck->deal(1));
        $cardsPlayer2->add($deck->deal(1));
        $cardsPlayer1CS = clone $cardsPlayer1;
        $cardsPlayer2CS = clone $cardsPlayer2;
        ?>
        <table>
            <tr>
                <td><h3>Player 1:</h3></td>
                <?php

                while(count($cardsPlayer1->getCards())>0){
                    $selectedCard = $cardsPlayer1->play();
                    ?><td><?php $handPlayer1->writer($selectedCard); ?></td><?php
                }
                ?>
            </tr>

            <td><h3>Player 2:</h3></td>
            <?php

            while(count($cardsPlayer2->getCards())>0){
                $selectedCard = $cardsPlayer2->play();
                ?><td><?php $handPlayer2->writer($selectedCard); ?></td><?php
            }
            ?>
            </tr>
            <tr>
                <td></td>
                <?php

                $puntos = compareCards($cardsPlayer1CS,$cardsPlayer2CS, $puntos);
                ?>
            </tr>
        </table>
        <?php

        comparePointsFinalRound($puntos);
    }
?>