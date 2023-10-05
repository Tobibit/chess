<?php
    include_once "./includes.php";

    function movement_rook($currentX, $currentY, $game) {
        $validMoves = [];
        $rookColor = getPieceAtPosition([$currentX, $currentY], $game)->getColor();

        // ranks
        for($y = 0; $y < 8; $y++){
            if($y != $currentY){
                $potentialMove = [$currentX, $y];
                $targetColor = getPieceAtPosition($potentialMove, $game)->getColor();

                if(empty($targetColor) || $targetColor !== $rookColor){
                    // square is empty or an opponent piece
                    $validMoves[] = $potentialMove;
                    break;
                }
                
                if(!empty($targetColor) && $targetColor === $rookColor){
                    // square has piece of the same color
                    break;
                }
            }
        }

        // files
        for($x = 0; $x < 8; $x++){
            if($x != $currentX){
                $potentialMove = [$x, $currentY];
                $targetColor = getPieceAtPosition($potentialMove, $game)->getColor();

                if(empty($targetColor) || $targetColor !== $rookColor){
                    // square is empty or an opponent piece
                    $validMoves[] = $potentialMove;
                    break;
                }

                if(!empty($targetColor) && $targetColor === $rookColor){
                    // square has piece of the same color
                    break;
                }
            }
        }
 
        return $validMoves;
    }

    function movement_bishop($currentX, $currentY, $game) {
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

    function movement_knight($currentX, $currentY, $game) {
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

    function movement_queen($currentX, $currentY, $game) {
        $rookMoves = movement_rook($currentX, $currentY, $game);
        $bishopMoves = movement_bishop($currentX, $currentY, $game);

        return array_merge($rookMoves, $bishopMoves);
    }

    function movement_king($currentX, $currentY, $game) {
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

    function movement_pawn($pawnIdentifier, $currentX, $currentY, $game) {
        $validMoves = [];

        // get color of pawn
        $color = substr($pawnIdentifier, 0, 5);

        // get first move
        if($color == "white"){
            $firstMove = $currentY == 1 ? true : false;
        } else {
            $firstMove = $currentY == 6 ? true : false;
        }

        // move up or down
        $direction = $color == "white" ? 1 : -1;

        // moves
        $newX = $currentX;
        $newY = $currentY + $direction * 1;
        if ($newY >= 0 && $newY < 8) {
            $validMoves[] = [$newX, $newY];
        }
        if ($firstMove) {
            $newY = $currentY + $direction * 2; 
            if ($newY >= 0 && $newY < 8) {
                $validMoves[] = [$newX, $newY];
            }
        }

        $captures = [
            //[$currentX + $direction, $currentY + $direction],
            //[$currentX + $direction, $currentY - $direction],
        ];

        foreach($captures as $move){
            $newX = $move[0];
            $newY = $move[1];
            if($newY >= 0 && $newY < 8 && $newX >= 0 && $newX < 8){
                $validMoves[] = [$newX, $newY];
            }
        }

        return $validMoves;
    }

    function getPieceAtPosition($coordinates, $game) {
        $x = $coordinates[0];
        $y = $coordinates[1];

        // $game has every piece instance in it, not game class
        foreach($game as $pieceName => $pieceInstance){
            if($pieceInstance->getX() == $x && $pieceInstance->getY() == $y){
                return $pieceInstance;
            }
        }
    }

    function isValid($piece, $curX, $curY, $newX, $newY, $game) {
        $movement = "movement_" . $piece;

        if(in_array([$newX, $newY], $movement($curX, $curY, $game))){
            return true;
        }

        return false;
    }

    function isValidPawn($pawnIdentifier, $curX, $curY, $newX, $newY, $game) {
        if(in_array([$newX, $newY], movement_pawn($pawnIdentifier, $curX, $curY, $game))){
            return true;
        }

        return false;
    }

    function getValidMoves($piece, $curX, $curY, $game) {
        $movement = "movement_" . $piece;

        return $movement($curX, $curY, $game);
    }

    function getValidMovesPawn($pawnIdentifier, $curX, $curY, $game){
        return movement_pawn($pawnIdentifier, $curX, $curY, $game);
    }
?>