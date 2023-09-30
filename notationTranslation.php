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
        // convert x to letter
        $x = strtoupper($x);
        $colLetter = ord($x) - ord('A') + 1;

        /*
        $letterNumberMap = [
            'A' => 0,
            'B' => 1,
            'C' => 2,
            'D' => 3,
            'E' => 4,
            'F' => 5,
            'G' => 6,
            'H' => 7
        ];
        $colLetter = $letterNumberMap[$x];
        */
        
        // convert y to number
        $rowNumber = $y + 1; // 1-based indexing

        return $colLetter . $rowNumber;
    }
?>