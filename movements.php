<?php
    include_once "./includes.php";

    function movement_rook($currentX, $currentY) {
        $validMoves = [];

        // horizontally
        for($y = 0; $y < 8; $y++){
            if($y == $currentY){
                $validMoves[] = [$currentX, $y];
            }
        }

        // vertically
        for($x = 0; $x < 8; $x++){
            if($x == $currentX){
                $validMoves[] = [$x, $currentY];
            }
        }

        return $validMoves;
    }

    function movement_bishop($currentX, $currentY) {
        $validMoves = [];

        // 4 directions
        $directions = [
            [-1, -1], // top left
            [-1, 1], // top right
            [1, -1], // bottom left
            [1, 1] // bottom right
        ];

        foreach($directions as $dir){
            for($i = 1; $i < 8; $i++){
                $newY = $currentY + ($dir[0] * $i);
                $newX = $currentX + ($dir[1] * $i);

                // check if move is on the board 
                if($newY >= 0 && $newY < 8 && $newX >= 0 && $newX < 8){
                    $validMoves[] = [$newX, $newY];
                }
            }
        }

        return $validMoves;
    }

    function movement_knight($currentX, $currentY) {
        $validMoves = [];

        // knight moves
        $moves = [
            [-2, -1], [-2, 1],
            [-1, -2], [-1, 2],
            [1, -2], [1, 2],
            [2, -1], [2, 1]
        ];

        foreach($moves as $move){
            $newY = $currentY + $move[0];
            $newX = $currentX + $move[1];

            // check if move is on the board
            if($newY >= 0 && $newY < 8 && $newX >= 0 && $newX < 8){
                $validMoves[] = [$newX, $newY];
            }
        }

        return $validMoves;
    }

    function movement_queen($currentX, $currentY) {
        $rookMoves = movement_rook($currentX, $currentY);
        $bishopMoves = movement_bishop($currentX, $currentY);

        return array_merge($rookMoves, $bishopMoves);
    }

    function movement_king($currentX, $currentY) {
        $validMoves = [];

        // one square in every direction
        $moves = [
            [-1, -1], [-1, 0], [-1, 1],
            [0, -1], [0, 1],
            [1, -1], [1, 0], [1, 1]
        ];

        foreach($moves as $move) {
            $newY = $currentY + $move[0];
            $newX = $currentX + $move[1];

            // check if move is on the board
            if($newY >= 0 && $newY < 8 && $newX >= 0 && $newX < 8){
                $validMoves[] = [$newX, $newY];
            }
        }

        return $validMoves;
    }

    function movement_pawn($currentX, $currentY, $firstMove = false) {
        $validMoves = [];

        // moves
        $moves = $firstMove ? [[-1, 0], [-2, 0]] : [[-1, 0], [-1, -1], [-1, 1]];

        foreach($moves as $move){
            $newY = $currentX + $move[0];
            $newX = $currentY + $move[1];

            // check if move is on the board
            if($newY >= 0 && $newY < 8 && $newX >= 0 && $newX < 8){
                $validMoves[] = [$newX, $newY];
            }
        }

        return $validMoves;
    }

    function isValid($piece, $curX, $curY, $newX, $newY) {
        $movement = "movement_" . $piece;

        if(in_array([$newX, $newY], $movement($curX, $curY))){
            return true;
        }

        return false;
    }

    function getValidMoves($piece, $curX, $curY) {
        $movement = "movement_" . $piece;

        return $movement($curX, $curY);
    }
?>