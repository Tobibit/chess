<?php
    require_once("./movements.php");
    class Queen {
        private $x;
        private $y;
        private $color;
        private $identifier;
        private $image;

        public function __construct($color, $identifier, $x = null, $y = null) {
            $this->color = $color;
            $this->identifier = $identifier;
            $this->x = $x ? $x : 4;
            $this->color = $color;

            if($color == "white"){
                $this->y = $y ? $y : 1;
                $this->image = "../images/white_queen.png";
            }
            else {
                $this->y = $y ? $y : 8;
                $this->image = "../images/black_queen.png";
            }
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

        public function getImage() {
            return $this->image;
        }

        public function move($newX, $newY) {
            if(isValid("queen", $this->x, $this->y, $newX, $newY)){
                $this->x = $newX;
                $this->y = $newY;
            }
        }
    }
?>