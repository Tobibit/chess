<?php
    include_once "./movements.php";

    $data = json_decode(file_get_contents('php://input'), true);
    $pieceName = $data['pieceName'];
    $pieceX = $data['pieceX'];
    $pieceY = $data['pieceY'];

    $validMoves = getValidMoves(strtolower($pieceName), $pieceX, $pieceY);

    echo json_encode($validMoves);
?>
