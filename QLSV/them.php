<?php
require_once 'ketnoi.php';

// nhận dữ liệu từ form 
$ht = $_POST['hoten'];
$masv = $_POST['masv'];
$lop = $_POST['lop'];

// kết nối csdl

// viết lệnh sql để thêm dử liệu
$themsql = "INSERT INTO sinhvien (masv,hoten,lop) VALUES
('$masv','$ht','$lop')";
// echo $themsql;exit;

// thực thi câu lệnh thêm 
 if (mysqli_query($conn,$themsql)){
// in thông báo thành công 
 // trở về trang liệt kê
 header("location: lietke.php");
 }
 else{
    echo 'lỗi';
 }




