<?php
    include_once "movements.php";

    session_start();
    $pieces = $_SESSION["game"];

    $data = json_decode(file_get_contents('php://input'), true);
    $pieceName = $data['pieceName'];
    $pieceX = $data['pieceX'];
    $pieceY = $data['pieceY'];

    // set x and y to piece
    $pieces[$pieceName]->setX($pieceX);
    $pieces[$pieceName]->setY($pieceY);
?>