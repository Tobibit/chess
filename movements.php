<?php
    function movement_rook($currentRow, $currentCol) {
        $validMoves = [];

        // horizontally
        for($row = 0; $row < 8; $row++){
            if($row == $currentRow){
                $validMoves[] = [$row, $currentCol];
            }
        }

        // vertically
        for($col = 0; $col < 8; $col++){
            if($col == $currentCol){
                $validMoves[] = [$currentRow, $col];
            }
        }

        return $validMoves;
    }

    function movement_bishop($currentRow, $currentCol) {
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
                $newRow = $currentRow + ($dir[0] * $i);
                $newCol = $currentCol + ($dir[1] * $i);

                // check if move is on the board 
                if($newRow >= 0 && $newRow < 8 && $newCol >= 0 && $newCol < 8){
                    $validMoves[] = [$newRow, $newCol];
                }
            }
        }

        return $validMoves;
    }

    function movement_knight($currentRow, $currentCol) {
        $validMoves = [];

        // knight moves
        $moves = [
            [-2, -1], [-2, 1],
            [-1, -2], [-1, 2],
            [1, -2], [1, 2],
            [2, -1], [2, 1]
        ];

        foreach($moves as $move){
            $newRow = $currentRow + $move[0];
            $newCol = $currentCol + $move[1];

            // check if move is on the board
            if($newRow >= 0 && $newRow < 8 && $newCol >= 0 && $newCol < 8){
                $validMoves[] = [$newRow, $newCol];
            }
        }

        return $validMoves;
    }

    function movement_queen($currentRow, $currentCol) {
        $rookMoves = movement_rook($currentRow, $currentCol);
        $bishopMoves = movement_bishop($currentRow, $currentCol);

        return array_merge($rookMoves, $bishopMoves);
    }

    function movement_king($currentRow, $currentCol) {
        $validMoves = [];

        // one square in every direction
        $moves = [
            [-1, -1], [-1, 0], [-1, 1],
            [0, -1], [0, 1],
            [1, -1], [1, 0], [1, 1]
        ];

        foreach($moves as $move) {
            $newRow = $currentRow + $move[0];
            $newCol = $currentCol + $move[1];

            // check if move is on the board
            if($newRow >= 0 && $newRow < 8 && $newCol >= 0 && $newCol < 8){
                $validMoves[] = [$newRow, $newCol];
            }
        }

        return $validMoves;
    }

    function movement_pawn($currentRow, $currentCol, $firstMove = false) {
        $validMoves = [];

        // moves
        $moves = $firstMove ? [[-1, 0], [-2, 0]] : [[-1, 0], [-1, -1], [-1, 1]];

        foreach($moves as $move){
            $newRow = $currentRow + $move[0];
            $newCol = $currentCol + $move[1];

            // check if move is on the board
            if($newRow >= 0 && $newRow < 8 && $newCol >= 0 && $newCol < 8){
                $validMoves[] = [$newRow, $newCol];
            }
        }

        return $validMoves;
    }

    function isValid($piece, $curX, $curY, $newX, $newY) {
        $movement = "movement_" . $piece;

        if(in_array([$newX, $newY], $movement($curX, $curY))){
            return true;
        }
    }
?>