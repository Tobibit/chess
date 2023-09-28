<?php
    $pieces = array("Rook", "Knight", "Bishop", "Queen", "King", "Pawn");
    foreach($pieces as $piece) {
        include_once "./pieces/$piece.php";
    }

    function startPosition() {
        $pieces = array([
            // white
            "white_Rook1" => new Rook ("white", "rook1"),
            "white_Knight1" => new Knight ("white", "knight1"),
            "white_Bishop1" => new Bishop ("white", "bishop1"),
            "white_Queen" => new Queen ("white", "queen"),
            "white_King" => new King ("white", "king"),
            "white_Bishop2" => new Bishop ("white", "bishop2"),
            "white_Knight" => new Knight ("white", "knight2"),
            "white_Rook2" => new Rook ("white", "rook2"),
            "white_Pawn1" => new Pawn ("white", "pawn1"),
            "white_Pawn2" => new Pawn ("white", "pawn2"),
            "white_Pawn3" => new Pawn ("white", "pawn3"),
            "white_Pawn4" => new Pawn ("white", "pawn4"),
            "white_Pawn5" => new Pawn ("white", "pawn5"),
            "white_Pawn6" => new Pawn ("white", "pawn6"),
            "white_Pawn7" => new Pawn ("white", "pawn7"),
            "white_Pawn8" => new Pawn ("white", "pawn8")
            ],
            // black
            [
            "black_Rook1" => new Rook ("black", "rook1"),
            "black_Knight1" => new Knight ("black", "knight1"),
            "black_Bishop1" => new Bishop ("black", "bishop1"),
            "black_Queen" => new Queen ("black", "queen"),
            "black_King" => new King ("black", "king"),
            "black_Bishop2" => new Bishop ("black", "bishop2"),
            "black_Knight" => new Knight ("black", "knight2"),
            "black_Rook2" => new Rook ("black", "rook2"),
            "black_Pawn1" => new Pawn ("black", "pawn1"),
            "black_Pawn2" => new Pawn ("black", "pawn2"),
            "black_Pawn3" => new Pawn ("black", "pawn3"),
            "black_Pawn4" => new Pawn ("black", "pawn4"),
            "black_Pawn5" => new Pawn ("black", "pawn5"),
            "black_Pawn6" => new Pawn ("black", "pawn6"),
            "black_Pawn7" => new Pawn ("black", "pawn7"),
            "black_Pawn8" => new Pawn ("black", "pawn8")
            ]);

        return $pieces;
    }
?>