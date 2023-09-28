<?php
    $pieces = array("Rook", "Knight", "Bishop", "Queen", "King", "Pawn");
    foreach($pieces as $piece) {
        include_once "./pieces/$piece.php";
    }

    function getX($piece) {
        return $piece->getX();
    }

    function getY($piece) {
        return $piece->getY();
    }

    function getColor($piece) {
        return $piece->getColor();
    }

    function move($piece, $newX, $newY) {
        $piece->move($newX, $newY);
    }

    function getImage($piece) {
        return $piece->getImage();
    }
?>