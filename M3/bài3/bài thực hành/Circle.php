<?php
    include_once 'Shape.php';
    const PI = 3.14;
    class Circle extends Shape{
        public int | float $radius;
        public int | float $height;

        public function __construct($ts_name,$ts_radius,$ts_height){
        parent::__construct($ts_name); 
         $this->radius = $ts_radius;
         $this->height = $ts_height;

        }
        public function getName(){
            return $this->name;
        }
        public function getRadius(){
            return $this->radius;
        }
        public function getArea(){
            return ($this->radius * $this->radius * PI);
        }
        public function getPerimeter(){
            return (PI * 2 * $this->radius);
        }
        public function getVColume(){
            return $this->getArea() *$this->height;
        }
        public function showInfo(){
            return $this->name .'<br> Bán Kính :'. $this->radius.'<br> Chu Vi :'.$this->getPerimeter().'<br> Diện Tích :'.$this->getArea().'<br> Thể Tích :'.$this->getVColume();
        }
    }