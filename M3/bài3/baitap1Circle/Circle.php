<?php
const PI = 3.14;
class Circle{
    private $radius;
    private $coler;

    public function __construct($radius,$color){
           $this->radius = $radius;
           $this->color = $color;
    }
   public function getRadius(){
    return $this->radius;
   }
   public function setRadius($radius){
    $this->radius = $radius;
   }
   public function getColor(){
    return $this->color;
   }
   public function setColor($color){
    $this->color = $color;
   }
   public function getArea(){
    return  (PI * $this->radius * $this->radius);
   }
   public function __toString(){
    return "Circle[radius=" . $this->radius . ",color=" . $this->color . "]";
   }

}

