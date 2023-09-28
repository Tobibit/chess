<?php
    include_once "./pieces/Rook.php";
    include_once "./pieces/Knight.php";
    include_once "./pieces/Bishop.php";
    include_once "./pieces/Queen.php";
    include_once "./pieces/King.php";
    include_once "./pieces/Pawn.php";

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