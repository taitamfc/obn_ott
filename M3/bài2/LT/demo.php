<?php
class Animal{
    private $name = 'Animal';
    private $age = 0;
    public $color = 'black';
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
}
$dog = new Animal();
echo $dog->color;

echo '<pre/>';
print_r($dog);
echo '</pre>';