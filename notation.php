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
        $colLetter = chr($x + ord('a'));

        // convert y to number
        $rowNumber = $y + 1; // 1-based indexing

        return $colLetter . $rowNumber;
    }
?>