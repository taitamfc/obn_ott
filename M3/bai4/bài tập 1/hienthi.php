<?php

require_once('Shape.php');
require_once('Circle.php');
require_once('Rectangle.php');
require_once('Square.php');

// Tạo mảng các hình học ngẫu nhiên
$shapes = array();
$shapes[] = new Circle('hinh tron',5);
$shapes[] = new Rectangle('hinh chu nhat',4, 6);
$shapes[] = new Square('hinh vuong',3);

foreach ($shapes as $shape) {
    $percent = rand(1, 100);
  
    // Lưu trữ giá trị chu vi và diện tích trước khi thay đổi kích thước
    $oldArea = $shape->getArea();
    $oldPerimeter = $shape->getPerimeter();
  
    echo "Diện tích " . $shape->name . " trước khi tăng kích thước: " . $oldArea . "<br>";
    $shape->resize($percent);
    echo "Diện tích " . $shape->name . " sau khi tăng kích thước: " . $shape->getArea() . "<br><br>";
  
    echo "chu vi " . $shape->name . " trước khi tăng kích thước: " . $oldPerimeter . "<br>";
    $shape->resize($percent);
    echo "chu vi " . $shape->name . " sau khi tăng kích thước: " . $shape->getPerimeter() . "<br><br>";
    if ($shape instanceof Colorable) {
      echo $shape->howToColor() . "<br>";
  }
    
  }
  