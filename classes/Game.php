<?php
    require_once("./movements.php");
    class Game {
        private $firstMove;
        private $isCheck;
        private $isCheckmate;
        private $isDraw;
        private $whoseTurn;
        private $pieces; // array of pieces ([0] => white pieces, [1] => black pieces)
        
        public function __construct() {
            $this->pieces = startPosition();
            $this->firstMove = true;
            $this->isCheck = false;
            $this->isCheckmate = false;
            $this->isDraw = false;
            $this->whoseTurn = "white";
        }

        public function check() {
            // check if king is in check
            $pieces = array("Rook", "Knight", "Bishop", "Queen", "King", "Pawn");
            foreach($pieces as $piece) {
                if(isValid($piece, $piece->getX(), $piece->getY(), King->getX(), King->getY())) {
                    $this->isCheck = true;
                }
            }
        }

        public function checkmate() {
            // check if king is in checkmate
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

        public function getFirstMove() {
            return $this->firstMove;
        }

        public function getPieces() {
            return $this->pieces;
        }
    }
?>