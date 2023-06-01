<?php
    include_once 'Circle.php';

class Cylinder extends Circle {
      private $height;
    public function __construct($radius,$color,$height){
        parent::__construct($radius,$color);
        $this->height = $height;
    }
    public function getHeight(){
        return $this->height;
    }
    public function setHeight($height){
        $this->height = $height;
    }
    public function getVolume(){
        return $this->getArea() * $this->height;
    }
    public function __toString(){
        return   "Cylinder[radius=" . $this->getRadius() . ",height=" . $this->height . ",color=" . $this->getColor() . "]";
    }

}
