<?php
    include_once "./includes.php";

    function startPosition() {
        $pieces = [];
    
        // Create pieces for white and black
        $colors = ["white", "black"];
        $pieceTypes = ["Rook", "Knight", "Bishop", "Queen", "King"];
        $pawnNames = ["Pawn1", "Pawn2", "Pawn3", "Pawn4", "Pawn5", "Pawn6", "Pawn7", "Pawn8"];
    
        foreach ($colors as $color) {
            foreach ($pieceTypes as $type) {
                if($type === "King" || $type === "Queen"){
                    // one
                    $name = $type;
                    $pieceInstance = new $name($color, strtolower($name));
                    $pieces[$color . "_" . $name] = $pieceInstance;
                } else {
                    // two
                    for($i = 1; $i <= 2; $i++){
                        $name = $type . $i;
                        $pieceInstance = new $type($color, strtolower($name));
                        $pieces[$color . "_" . $name] = $pieceInstance;
                    }
                }
            }
    
            foreach ($pawnNames as $name) {
                $pieceInstance = new Pawn($color, strtolower($name));
                $pieces[$color . "_" . $name] = $pieceInstance;
            }
        }
        //var_dump($pieces);
        return $pieces;
    }    
?>