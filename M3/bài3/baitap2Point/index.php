<?php
include_once 'Point3D.php';

$point2D = new Point2D(1,1);
// echo $point2D->toString();
// echo '<br>';
$point3D = new Point3D(1,1,1);
// echo $point3D->toString();

//  $point3D->__construct(1,2,3);
 echo $point3D->toString();
  
 $point3D->setZ(5);
 echo  $point3D->getZ();
 echo '<pre>';
 print_r($point3D->getXYZ()) ;
 echo '</pre>';