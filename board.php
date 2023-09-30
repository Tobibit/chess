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
                    include_once("./startPosition.php");

                    $pieces = array("Rook", "Knight", "Bishop", "Queen", "King", "Pawn", "Game");
                    foreach($pieces as $piece) {
                        include_once "./classes/$piece.php";
                    }
                
                    /*
                    Files = Columns = X
                    Ranks = Rows = Y
                    */
                    
                    $game = new Game();
                    $board = [];

                    $allPieces = ["white_Rook1", "white_Knight1", "white_Bishop1", "white_Queen", "white_King", "white_Bishop2", "white_Knight", "white_Rook2", 
                            "white_Pawn1", "white_Pawn2", "white_Pawn3", "white_Pawn4", "white_Pawn5", "white_Pawn6", "white_Pawn7", "white_Pawn8", 
                            "black_Rook1", "black_Knight1", "black_Bishop1", "black_Queen", "black_King", "black_Bishop2", "black_Knight", "black_Rook2", 
                            "black_Pawn1", "black_Pawn2", "black_Pawn3", "black_Pawn4", "black_Pawn5", "black_Pawn6", "black_Pawn7", "black_Pawn8"
                    ];

                    for($row = 0; $row < 8; $row++){
                        echo "<tr>";

                        for($col = 0; $col < 8; $col++){
                            $colBoard = $col;
                            $rowBoard = 7 - $row;
                            $squareClass = ($row + ord($col)) % 2 == 0 ? "black" : "white";

                            echo "<td class='$squareClass'>";
                            
                            foreach($allPieces as $pieceName){
                                $color = substr($pieceName, 0, 5) == "white" ? 0 : 1;
                                $piece = getPieces($game)[$color][$pieceName];

                                if($piece->getX() == $colBoard && $piece->getY() == $rowBoard){
                                    $image = getImage($piece);
                                    $altText = getColor($piece) . " " . getIdentifier($piece);
                                    echo "<img src='../images/white_bishop.png' alt='$altText'>";
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