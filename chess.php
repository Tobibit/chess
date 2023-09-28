<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='style.css' />
    <title>Document</title>
</head>
<body>
    <table class="boardTable">
        <?php
        include_once("./classFunctions.php");
        /*
            $pieces = [
                // rank 8
                [
                ["color" => "black", "type" => "rook1", "image" => "./images/black_rook.png"],
                ["color" => "black", "type" => "knight1", "image" => "./images/black_knight.png"],
                ["color" => "black", "type" => "bishop1", "image" => "./images/black_bishop.png"],
                ["color" => "black", "type" => "queen", "image" => "./images/black_queen.png"],
                ["color" => "black", "type" => "king", "image" => "./images/black_king.png"],
                ["color" => "black", "type" => "bishop2", "image" => "./images/black_bishop.png"],
                ["color" => "black", "type" => "knight2", "image" => "./images/black_knight.png"],
                ["color" => "black", "type" => "rook2", "image" => "./images/black_rook.png"],
                ],
                // rank 7
                [
                ["color" => "black", "type" => "pawn1", "image" => "./images/black_pawn.png"],
                ["color" => "black", "type" => "pawn2", "image" => "./images/black_pawn.png"],
                ["color" => "black", "type" => "pawn3", "image" => "./images/black_pawn.png"],
                ["color" => "black", "type" => "pawn4", "image" => "./images/black_pawn.png"],
                ["color" => "black", "type" => "pawn5", "image" => "./images/black_pawn.png"],
                ["color" => "black", "type" => "pawn6", "image" => "./images/black_pawn.png"],
                ["color" => "black", "type" => "pawn7", "image" => "./images/black_pawn.png"],
                ["color" => "black", "type" => "pawn8", "image" => "./images/black_pawn.png"],
                ],
                // rank 6
                [
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ],
                // rank 5
                [
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ],
                // rank 4
                [
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ],
                // rank 3
                [
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ["color" => "", "type" => "", "image" => ""],
                ],
                // rank 2
                [
                ["color" => "white", "type" => "pawn1", "image" => "./images/white_pawn.png"],
                ["color" => "white", "type" => "pawn2", "image" => "./images/white_pawn.png"],
                ["color" => "white", "type" => "pawn3", "image" => "./images/white_pawn.png"],
                ["color" => "white", "type" => "pawn4", "image" => "./images/white_pawn.png"],
                ["color" => "white", "type" => "pawn5", "image" => "./images/white_pawn.png"],
                ["color" => "white", "type" => "pawn6", "image" => "./images/white_pawn.png"],
                ["color" => "white", "type" => "pawn7", "image" => "./images/white_pawn.png"],
                ["color" => "white", "type" => "pawn8", "image" => "./images/white_pawn.png"],
                ],
                // rank 1
                [
                ["color" => "white", "type" => "rook1", "image" => "./images/white_rook.png"],
                ["color" => "white", "type" => "knight1", "image" => "./images/white_knight.png"],
                ["color" => "white", "type" => "bishop1", "image" => "./images/white_bishop.png"],
                ["color" => "white", "type" => "queen", "image" => "./images/white_queen.png"],
                ["color" => "white", "type" => "king", "image" => "./images/white_king.png"],
                ["color" => "white", "type" => "bishop2", "image" => "./images/white_bishop.png"],
                ["color" => "white", "type" => "knight2", "image" => "./images/white_knight.png"],
                ["color" => "white", "type" => "rook2", "image" => "./images/white_rook.png"]
                ]
            ];
        */

            for($row = 0; $row < 8; $row++){
                echo "<tr>";

                for($col = 0; $col < 8; $col++){
                    $piece = $pieces[$row][$col];

                    // check if square has a piece
                    if(!empty($piece['type'])){
                        $image = $piece['image'];
                        $altText = "{$piece['color']} {$piece['type']}";

                        // square class
                        $squareClass = ($row + $col) % 2 == 0 ? "white" : "black";
                        echo "<td class='$squareClass'>";
                        echo "<img src='$image' alt='$altText' height='50' width='50'>";
                        echo "</td>";
                    } else {
                        // square is empty
                        $class = ($row + $col) % 2 == 0 ? "white" : "black";
                        echo "<td class='$class'></td>";
                    }
                }

                echo "</tr>";
            }


            /*
            $pieces = [
                ["BlackRook1", "BlackKnight1", "BlackBishop1", "BlackQueen", "BlackKing", "BlackBishop2", "BlackKnight2", "BlackRook2"],
                ["BlackPawn1", "BlackPawn2", "BlackPawn3", "BlackPawn4", "BlackPawn5", "BlackPawn6", "BlackPawn7", "BlackPawn8"],
                ["", "", "", "", "", "", "", ""],
                ["", "", "", "", "", "", "", ""],
                ["", "", "", "", "", "", "", ""],
                ["", "", "", "", "", "", "", ""],
                ["WhitePawn1", "WhitePawn2", "WhitePawn3", "WhitePawn4", "WhitePawn5", "WhitePawn6", "WhitePawn7", "WhitePawn8"],
                ["WhiteRook1", "WhiteKnight1", "WhiteBishop1", "WhiteQueen", "WhiteKing", "WhiteBishop2", "WhiteKnight2", "WhiteRook2"]
            ];

            for($row = 0; $row < 8; $row++){
                echo "<tr>";

                for($col = 0; $col < 8; $col++){
                    $piece = $pieces[$row][$col];
                    $class = ($row + $col) % 2 == 0 ? "white" : "black";

                    echo "<td class='$class'>$piece</td>";
                }
                echo "</tr>";
            }
            */
        ?>
    </table>
</body>
</html>