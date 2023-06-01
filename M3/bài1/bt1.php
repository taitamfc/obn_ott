<?php
    class QuadraticEquation{
        public $a;
        public $b;
        public $c;
        public function __construct($ts_a,$ts_b,$ts_c){
            $this -> a = $ts_a;
            $this -> b = $ts_b;
            $this -> c = $ts_c;
        }
        public function getA(){
            return $this->a;
        }
        public function getB(){
            return $this->b;
        }
        public function getC(){
            return $this->c;
        }
        public function setA($ts_a){
            $this->a = $ts_a;
        }
        public function setB($ts_b){
            $this->b = $ts_b;
        }
        public function setC($ts_c){
            $this->c = $ts_c;
        }
        public function getDiscriminant(){
            return ($this->b)*($this->b)-4*($this->a)*($this->c);
        }
        public function getRoot1(){
            return ((-$this->b)+sqrt(($this->b)*($this->b)-4*($this->a)*($this->c)))/(2*($this->a));
        }
        public function getRoot2(){
            return ((-$this->b)-sqrt(($this->b)*($this->b)-4*($this->a)*($this->c)))/(2*($this->a));
        }
    }
$pt = new QuadraticEquation(1,3,1);
$pt->setA(1);
$pt->setB(1);
$pt->setC(1);
if (($pt->getDiscriminant())<0){
    echo 'Phương Trình vô Nghiệm';
}else if (($pt->getDiscriminant())==0){
    echo 'Phương trình có 1 nghiệm là :'.$pt->getRoot1();
}else {
    echo 'Phương trình có nghiệm thứ 1 là :'.$pt->getRoot1().'<br> Phương trình có nghiệm thứ 2 là :'.$pt->getRoot2();
}