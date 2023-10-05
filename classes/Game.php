<?php
    require_once("./movements.php");
    class Game {
        private $isCheck;
        private $isCheckmate;
        private $isDraw;
        private $whoseTurn;
        private $pieces;
        
        public function __construct() {
            $this->pieces = startPosition();
            $this->isCheck = false;
            $this->isCheckmate = false;
            $this->isDraw = false;
            $this->whoseTurn = "white";
        }

        public function check() {
            // check if king is in check
            $king = $this->pieces[$this->whoseTurn . "_King"];
            $pieces = $this->pieces;
            foreach($pieces as $pieceName => $pieceInstance) {
                if(isValid($pieceInstance, $pieceInstance->getX(), $pieceInstance->getY(), $king->getX(), $king->getY(), $this->pieces)) {
                    $this->isCheck = true;
                    break;
                }
            }

            return $this->isCheck;
        }

        public function checkmate() {
            // check if king is in checkmate
            $king = $this->pieces[$this->whoseTurn . "_King"];
            $pieces = $this->pieces;

            $kingCanEscape = true;
            $kingCanTake = true;
            $pieceCanBlock = true;
            $attackerCanBeTaken = true;

            $kingX = $king->getX();
            $kingY = $king->getY();


            if(!$this->check()){
                return $this->isCheckmate;
            }

            // directions for the king to escape
            $top = 0;
            $topRight = 0;
            $right = 0;
            $bottomRight = 0;
            $bottom = 0;
            $bottomLeft = 0;
            $left = 0;
            $topLeft = 0;

            foreach($pieces as $pieceName => $pieceInstance) {
                // check if a piece or board edge is blocking kings escape squares
                $pieceX = $pieceInstance->getX();
                $pieceY = $pieceInstance->getY();

                if(($pieceX == $kingX && $pieceY == $kingY + 1) || $kingY == 7) {
                    $top = 1;
                }

                if(($pieceX == $kingX + 1 && $pieceY == $kingY + 1) || ($kingX == 7 && $kingY == 7)) {
                    $topRight = 1;
                }

                if(($pieceX == $kingX + 1 && $pieceY == $pieceY) || $kingX == 7) {
                    $right = 1;
                }

                if(($pieceX == $kingX + 1 && $pieceY == $kingY - 1) || ($kingX == 7 && $kingY == 0)) {
                    $bottomRight = 1;
                }

                if(($pieceX == $kingX && $pieceY == $kingY - 1) || $kingY == 0) {
                    $bottom = 1;
                }

                if(($pieceX == $kingX - 1 && $pieceY == $kingY - 1) || ($kingX == 0 && $kingY == 0)) {
                    $bottomLeft = 1;
                }

                if(($pieceX == $kingX - 1 && $pieceY == $kingY) || $kingX == 0) {
                    $left = 1;
                }

                if(($pieceX == $kingX - 1 && $pieceY == $kingY + 1) || ($kingX == 0 && $kingY == 7)) {
                    $topLeft = 1;
                }

                // check if opponent pieces are unprotected

                // check if same colored pieces can block the attack

                // check if same colored pieces can take the attacker
            }

            if($top && $topRight && $right && $bottomRight && $bottom && $bottomLeft && $left && $topLeft) {
                $kingCanEscape = false;
            }

            if(!$kingCanEscape && !$kingCanTake && !$pieceCanBlock && !$attackerCanBeTaken) {
                $this->isCheckmate = true;
            }

            return $this->isCheckmate;
        }

        public function draw() {
            // check if game is a draw
        }

        public function getWhoseTurn() {
            return $this->whoseTurn;
        }

        public function getIsCheck() {
            return $this->isCheck;
        }

        public function getIsCheckmate() {
            return $this->isCheckmate;
        }

        public function getIsDraw() {
            return $this->isDraw;
        }

        public function getPieces() {
            return $this->pieces;
        }
    }
?>