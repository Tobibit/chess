<?php
    require_once("./movements.php");
    class Rook {
        private $x;
        private $y;
        private $color;

        public function __construct($x, $y, $color) {
            $this->x = $x;
            $this->y = $y;
            $this->color = $color;
        }

        public function getX() {
            return $this->x;
        }

        public function getY() {
            return $this->y;
        }

        public function getColor() {
            return $this->color;
        }

        public function move($newX, $newY) {
            if(isValid("rook", $this->x, $this->y, $newX, $newY)){
                $this->x = $newX;
                $this->y = $newY;
            }
        }
    }
?>