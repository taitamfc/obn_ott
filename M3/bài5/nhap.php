<?php
class MyClass
{
    public function __construct() { }

    public function MyPublic() { 
         echo 'MyPublic';
    }

    protected function MyProtected() { 
         echo 'MyProtected';
     }

    private function MyPrivate() { 
         echo 'MyPrivate';
     }

    function Foo()
    {
        $this->MyPublic();
        $this->MyProtected();
        $this->MyPrivate();
    }
}

$myclass = new MyClass;
$myclass->MyPublic();