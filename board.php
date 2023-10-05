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
                    session_start();

                    $board = [];

                    $allPieces = $game->getPieces();

                    $_SESSION["game"] = $allPieces;

                    for($row = 0; $row < 8; $row++){
                        echo "<tr>";

                        for($col = 0; $col < 8; $col++){
                            $colBoard = $col;
                            $rowBoard = 7 - $row;
                            $squareClass = ($row + ord($col)) % 2 == 0 ? "white" : "black";

                            echo "<td class='$squareClass' data-x='$colBoard' data-y='$rowBoard'>";
                            
                            foreach($allPieces as $pieceName => $pieceInstance){
                                $piece = $allPieces[$pieceName];

                                if($piece->getX() == $colBoard && $piece->getY() == $rowBoard){
                                    $image = getImage($piece);
                                    $altText = getIdentifier($piece);
                                    //echo $altText . "<br>";
                                    //echo getIdentifier($piece) . "<br>";
                                    //echo "Piece: $piece, CurrentX: $curX, CurrentY: $curY <br>";
                                    //echo "Col / X" . $colBoard . ", " . "Row / Y:" . $rowBoard . "<br>";
                                    //print_r($allPieces);
                                    echo "<img height='40px' width='40px' src='$image' alt='$altText' data-piece-identifier='$altText'>";
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