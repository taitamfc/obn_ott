<?php
class Point2D {
    protected float $x;
    protected float $y;

    public function __construct($x , $y){
        $this->x = $x;
        $this->y = $y;
    }
    public function getX(): float {
            return $this->x;
    }
    public function getY(): float {
        return $this->y;
    }
    public function setX($x): void{
        $this->x = $x;
    }
    public function setY($y): void{
        $this->y = $y;
    }
    public function getXY(){
        return  [$this->x,$this->y];
    }
    public function setXY($x,$y){
        $this->x = $x;
        $this->y = $y;
    }
    public function toString() :string{
        return 'x: '.$this->x .', y: '.$this->y;
    
    }
}