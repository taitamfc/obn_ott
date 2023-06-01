<?php
    include_once 'Cylinder.php';
    $circle = new Circle(5,'red');
    echo $circle->__toString();
    echo '<br>';
    echo $circle->getArea();
    echo '<br>';
 
    $cylinder = new Cylinder(5, "red", 10);
    echo $cylinder->__toString();
    echo '<br>';
    echo $cylinder->getArea(); // Output: 78.539816339745
    echo '<br>';
    echo $cylinder->getVolume(); // Output: 785.39816339745
    echo '<br>';
