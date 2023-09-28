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

            if($color == "white"){
                $this->x = $x ? $x : substr($identifier, -1);
                $this->y = $y ? $y : 2;
                $this->image = "./images/white_pawn.png";
            }   
            else{
                $this->x = $x ? $x : substr($identifier, -1);
                $this->y = $y ? $y : 7;
                $this->image = "./images/black_pawn.png";
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

        public function move($newX, $newY) {
            if(isValid("pawn", $this->x, $this->y, $newX, $newY)){
                $this->x = $newX;
                $this->y = $newY;
            }
        }
    }
?>