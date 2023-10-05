<?php
    session_start();
    $pieces = $_SESSION["game"];
    echo json_encode($pieces);
?>