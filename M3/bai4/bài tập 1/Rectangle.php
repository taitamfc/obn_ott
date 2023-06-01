<?php
require_once('Shape.php');  
class Rectangle extends Shape implements Resizeable{
  public $height;
  public $width;
  public function __construct($name,$height,$width){
  
      parent::__construct($name);
      $this->height = $height;
      $this->width = $width; 
  }
  public function getArea(){
      return ($this->height * $this->width);
  }
  public function getPerimeter(){
      return ($this->height + $this->width)* 2;
  }
  public function resize($percent){
      $this->height += $this->height * $percent / 100;
      $this->width += $this->width * $percent / 100;
      }
  
}