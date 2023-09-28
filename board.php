<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='style.css' />
    <title>Document</title>
</head>
<body>
    <div class="chessboard-container">
        <div class="chessboard">
            <table class="boardTable">
                <?php
                include_once("./classFunctions.php");
                include_once("./notationTranslation.php");

                /*
                Files = Columns = X
                Ranks = Rows = Y
                */

                $board = [];

                for($row = 0; $row < 8; $row++){
                    echo "<tr>";

                    for($col = 0; $col < 8; $col++){
                        // calculate board coordinates
                        $chessRow = 7 - $row;
                        $chessCol = chr(ord('A') + $col);

                        $squareClass = ($chessRow + ord($chessCol)) % 2 == 0 ? "white" : "black";

                        echo "<td class='$squareClass'>";

                        foreach($board as $piece){
                            if($piece->getX() == $chessCol && $piece->getY() == $chessRow){
                                echo "<img src='" . getImage($piece) . "' alt='" . getColor($piece) . " " . getIdentifier($piece) . "'>";
                            }
                        }

                        echo "</td>";
                    }

                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>