<?php
    function algebraicToCoordinates($algebraic) {
        $colLetter = $algebraic[0];
        $rowNumber = (int)$algebraic[1];

        // convert letter to x
        $x = ord($colLetter) - ord('A');

        // convert number to y
        $y = $rowNumber - 1; // 0-based indexing

        return [$x, $y];
    }

    function coordinatesToAlgebraic($x, $y) {
        $letters = [
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'
        ];

        // convert x to letter
        $colLetter = $letters[$x];
        
        // convert y to number
        $rowNumber = $y + 1; // 1-based indexing

        $notation = $colLetter . $rowNumber;
        return $notation;
    }
?>