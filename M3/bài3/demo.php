<?php
class Student extends Person{
    public $name = 'aaaa';
    protected $email = 'hi@gmail.com';
    private $address = 'linhchieu';
    
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getAddress(){
        return $this->address;
    }
    public function getAge(){
        parent::getAge();
        return __METHOD__;
    }
}
class Person {
    public $phone = '0987654123';
    public function getAge(){
        echo __METHOD__;
    }

}
$std = new Student;

echo $std ->getAge();
echo "<br>";
echo $std ->phone;
// echo $std->name;
// echo '<br/>';
// echo $std->getEmail();
// echo '<br/>';
// echo $std->getAddress();

// // $std->setName('bbb');
// // echo $std->getName();
// $std->setEmail('dfdf');
// echo $std->getEmail();

// ghi đè là khi lớp con và lớp cha có  tt hoặc pt giống tên nhau
// làm mất cái chức năng hay dữ liệu của lớp cha,dẫn đến các hệ lụy sảy ra lỗi hệ thống mà chúng ta không thể kiểm soát được
