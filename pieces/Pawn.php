<?php
    require_once("./movements.php");
    class Pawn {
        private $x;
        private $y;
        private $color;
        private $identifier;
        private $image;

        public function __construct($color, $identifier, $x = null, $y = null) {
            $this->color = $color;
            $this->identifier = $identifier;
            $this->x = $x ? $x : substr($identifier, -1) - 1;

            if($color == "white"){
                $this->y = $y ? $y : 1;
                $this->image = "../images/white_pawn.png";
            }
            else{
                $this->y = $y ? $y : 6;
                $this->image = "../images/black_pawn.png";
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

        public function getIdentifier() {
            return $this->identifier;
        }

        public function move($newX, $newY) {
            if(isValid("pawn", $this->x, $this->y, $newX, $newY)){
                $this->x = $newX;
                $this->y = $newY;
            }
        }
    }
?>