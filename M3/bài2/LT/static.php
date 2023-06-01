<?php
class Person{
    private static $fullName = 'Hiếu';
    public static $age = 22;
    public static $location = 'Linh Chiểu';
    public static function getNAme(){
        return 'Tên của bạn là';
    }
    public function getAge(){
        return 'tuổi của bạn là';
    }
    // public static function getFullname(){
    //     return Person :: $fullName;
    // }
}
// $person = new Person();

// echo Person::$fullName.'<br/>';
// echo Person::$age .'<br/>';

// echo $person->getNAme().'<br/>';

// echo $person->location.'<br/>';
// echo $person->getAge().'<br/>';
 echo Person::$location;
