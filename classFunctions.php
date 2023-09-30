<?php
    include_once "./includes.php";

    // pieces
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

    function getIdentifier($piece) {
        return $piece->getIdentifier();
    }

    // game
    function check($game){
        return $game->check();
    }

    function checkmate($game){
        return $game->checkmate();
    }

    function draw($game){
        return $game->draw();
    }

    function getWhoseTurn($game){
        return $game->getWhoseTurn();
    }

    function getIsCheck($game){
        return $game->getIsCheck();
    }

    function getIsCheckmate($game){
        return $game->getIsCheckmate();
    }

    function getIsDraw($game){
        return $game->getIsDraw();
    }   

    function getFirstMove($game){
        return $game->getFirstMove();
    }

    function getPieces($game){
        return $game->getPieces();
    }
?>