<?php
    $pieces = array("Rook", "Knight", "Bishop", "Queen", "King", "Pawn");
    foreach($pieces as $piece) {
        include_once "./pieces/$piece.php";
    }

    function startPosition() {
        $pieces = array([
            // white
            new Rook ("white", "rook1"),
            new Knight ("white", "knight1"),
            new Bishop ("white", "bishop1"),
            new Queen ("white", "queen"),
            new King ("white", "king"),
            new Bishop ("white", "bishop2"),
            new Knight ("white", "knight2"),
            new Rook ("white", "rook2"),
            new Pawn ("white", "pawn1"),
            new Pawn ("white", "pawn2"),
            new Pawn ("white", "pawn3"),
            new Pawn ("white", "pawn4"),
            new Pawn ("white", "pawn5"),
            new Pawn ("white", "pawn6"),
            new Pawn ("white", "pawn7"),
            new Pawn ("white", "pawn8")
            ],
            // black
            [
            new Rook ("black", "rook1"),
            new Knight ("black", "knight1"),
            new Bishop ("black", "bishop1"),
            new Queen ("black", "queen"),
            new King ("black", "king"),
            new Bishop ("black", "bishop2"),
            new Knight ("black", "knight2"),
            new Rook ("black", "rook2"),
            new Pawn ("black", "pawn1"),
            new Pawn ("black", "pawn2"),
            new Pawn ("black", "pawn3"),
            new Pawn ("black", "pawn4"),
            new Pawn ("black", "pawn5"),
            new Pawn ("black", "pawn6"),
            new Pawn ("black", "pawn7"),
            new Pawn ("black", "pawn8")
            ]);

        return $pieces;
    }
?>