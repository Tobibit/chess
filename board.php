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
                    include_once "./includes.php";
                
                    /*
                    Files = Columns = X
                    Ranks = Rows = Y
                    */
                    
                    $game = new Game();
                    $board = [];

                    $allPieces = $game->getPieces();

                    for($row = 0; $row < 8; $row++){
                        echo "<tr>";

                        for($col = 0; $col < 8; $col++){
                            $colBoard = $col;
                            $rowBoard = 7 - $row;
                            $squareClass = ($row + ord($col)) % 2 == 0 ? "white" : "black";

                            echo "<td class='$squareClass'>";
                            
                            foreach($allPieces as $pieceName => $pieceInstance){
                                $piece = $allPieces[$pieceName];

                                if($piece->getX() == $colBoard && $piece->getY() == $rowBoard){
                                    $image = getImage($piece);
                                    $altText = getColor($piece) . " " . getIdentifier($piece);
                                    echo "<img height='40px' width='40px' src='$image' alt='$altText'>";
                                    echo $colBoard . ", " . $rowBoard . "<br>";
                                    echo coordinatesToAlgebraic($colBoard, $rowBoard) . "<br>";
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
    <script src="script.js"></script>
</body>
</html>