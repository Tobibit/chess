<?php
    class Game {
        private $firstMove;
        private $isCheck;
        private $isCheckmate;
        private $isDraw;
        private $whoseTurn;
        
        public function __construct() {
            $this->firstMove = true;
            $this->isCheck = false;
            $this->isCheckmate = false;
            $this->isDraw = false;
            $this->whoseTurn = "white";
        }

        public function check() {
            // check if king is in check
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
    }
?>