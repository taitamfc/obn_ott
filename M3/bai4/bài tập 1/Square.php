<?php
require_once('Shape.php');
class Square extends Shape implements Resizeable,Colorable{
  public $width;
  public function __construct($name,$width){
      parent::__construct($name);
      $this->width = $width;
  }
  public function getArea(){
      return $this->width * $this->width;
  }
  public function getPerimeter(){
      return $this->width * 4;
  }
  public function resize($percent){
  $this->width += $this->width * $percent / 100;
  }
  public function howToColor(){
    echo "Color all four sides.";
}
}