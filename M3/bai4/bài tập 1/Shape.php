<?php
abstract class Shape{
   public $name;
   public function __construct($name){
    $this->name = $name;
   }

    abstract function getArea();
    abstract function getPerimeter();

}
interface Resizeable{
    function resize($percent);
}
interface Colorable{
    function howToColor();
}






