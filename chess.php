<?php
    // include style
    echo "<link rel='stylesheet' type='text/css' href='style.css' />";

    // draw the chess board
    for ($row = 1; $row <= 8; $row++) {
        for ($col = 1; $col <= 8; $col++) {
            $total = $row + $col;
            if ($total % 2 == 0) {
                echo "<div class='black'></div>";
            } else {
                echo "<div class='white'></div>";
            }
        }
    }
?>