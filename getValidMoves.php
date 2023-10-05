<?php
    include_once "./movements.php";
    session_start();
    $game = $_SESSION["game"];

    $data = json_decode(file_get_contents('php://input'), true);
    $pieceIdentifier = $data['pieceIdentifier'];
    $pieceName = $data['pieceName'];
    $pieceX = $data['pieceX'];
    $pieceY = $data['pieceY'];

    if(strpos($pieceIdentifier, "pawn") !== false)
        $validMoves = getValidMovesPawn($pieceIdentifier, $pieceX, $pieceY, $game);
    else
        $validMoves = getValidMoves(strtolower($pieceName), $pieceX, $pieceY, $game);

    echo json_encode($validMoves);
?>
