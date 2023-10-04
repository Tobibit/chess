<?php
    include_once "./movements.php";

    $data = json_decode(file_get_contents('php://input'), true);
    $pieceIdentifier = $data['pieceIdentifier'];
    $pieceName = $data['pieceName'];
    $pieceX = $data['pieceX'];
    $pieceY = $data['pieceY'];

    if(strpos($pieceIdentifier, "pawn") !== false)
        $validMoves = getValidMovesPawn($pieceIdentifier, $pieceX, $pieceY);
    else
        $validMoves = getValidMoves(strtolower($pieceName), $pieceX, $pieceY);

    echo json_encode($validMoves);
?>
