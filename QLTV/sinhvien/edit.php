<?php
    include_once '../db.php';//$conn
    // echo '<pre>';
    // print_r($_GET);
    // die();

     
    //Lay gia tri ID tren URL
    $id = $_GET['id'];
    //lay du lieu theo ID
    $sql = "SELECT * FROM `sinhvien` WHERE id = $id";
    //Debug sql
    // var_dump($sql);
    $stmt = $conn->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);//array

    //Lấy về dữ liệu duy nhat
    $row = $stmt->fetch();

    //  echo '<pre>';
    // print_r($row);
    // die();
    //Xu ly form
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        // echo '<pre>';
        // print_r( $_REQUEST );
        // die();
        $tenSV = $_REQUEST['tenSV'];
        $diachi = $_REQUEST['diachi'];
        $email = $_REQUEST['email'];
        $sdt = $_REQUEST['sdt'];

        //Viet cau truy van
        $sql = "UPDATE `sinhvien` SET 
        tenSV = '$tenSV',
        diachi = '$diachi',
        email = '$email',
        sdt = '$sdt'
         WHERE id = $id
        ";
       
        //Debug sql
        // var_dump($sql);
        // die();

        //Thuc hien truy van
        $conn->exec($sql);

        //Chuyen huong
        header("Location: index.php");
    }

?>
<div class="container-fluid px-4">
<form action="" method="post">
Tên Sinh Viên :<input type="text" name="tenSV" value ="<?= $row['tenSV'];?>"> <br>
Địa Chỉ :<input type="text" name="diachi" value ="<?= $row['diachi'];?>"> <br>
Email :<input type="text" name="email" value ="<?= $row['email'];?>"> <br>
SDT :<input type="text" name="sdt" value ="<?= $row['sdt'];?>"> <br>
    <input type="submit" value="Thêm">
</form>
</div>