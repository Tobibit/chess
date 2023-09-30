<?php
    $pieces = array("Rook", "Knight", "Bishop", "Queen", "King", "Pawn", "Game");
    foreach($pieces as $piece) {
        include_once "./classes/$piece.php";
    }

    include_once("./classFunctions.php");
    include_once("./notationTranslation.php");
    include_once("./startPosition.php");
?>