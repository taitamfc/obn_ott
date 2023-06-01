<?php
require_once('Shape.php');
class Circle extends Shape implements Resizeable{
  public $radius;
  public function __construct($name,$radius){
      parent::__construct($name);
      $this->radius = $radius;
  }
  public function getArea(){
      return ($this->radius * $this->radius * 3.14);
  }
  public function getPerimeter(){
      return ($this->radius * 2 * 3.14);
  }
  public function resize($percent){
  $this->radius += $this->radius * $percent / 100;
  }

}