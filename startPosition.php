<?php
    include_once "./includes.php";

    function startPosition() {
        $pieces = [];
    
        // Create pieces for white and black
        $colors = ["white", "black"];
        $pieceNames = ["Rook1", "Knight1", "Bishop1", "Queen", "King", "Bishop2", "Knight2", "Rook2"];
        $pawnNames = ["Pawn1", "Pawn2", "Pawn3", "Pawn4", "Pawn5", "Pawn6", "Pawn7", "Pawn8"];
    
        foreach ($colors as $color) {
            foreach ($pieceNames as $name) {
                $pieces[$color . "_" . $name] = new $name($color, strtolower($name));
            }
    
            foreach ($pawnNames as $name) {
                $pieces[$color . "_" . $name] = new Pawn($color, strtolower($name));
            }
        }
    
        return $pieces;
    }    
?>