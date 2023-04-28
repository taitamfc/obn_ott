<?php
    include_once '../db.php';//$conn
    // echo '<pre>';
    // print_r($_GET);
    // die();

     
    //Lay gia tri ID tren URL
    $id = $_GET['id'];
    //lay du lieu theo ID
    $sql = "SELECT * FROM `phieumuon` WHERE id = $id";
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
        $ngaymuonsach = $_REQUEST['ngaymuonsach'];
        $ngaydukientra = $_REQUEST['ngaydukientra'];
        $sach_id = $_REQUEST['sach_id'];
        $sinhvien_id = $_REQUEST['sinhvien_id'];

        //Viet cau truy van
        $sql = "UPDATE `phieumuon` SET 
        ngaymuonsach = '$ngaymuonsach',
        ngaydukientra = '$ngaydukientra',
        sach_id = '$sach_id',
        sinhvien_id = '$sinhvien_id'
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
ngày mượn sách :<input type="text" name="ngaymuonsach" value ="<?= $row['ngaymuonsach'];?>"> <br>
ngày dự kiến trả :<input type="text" name="ngaydukientra" value ="<?= $row['ngaydukientra'];?>"> <br>
sách_id :<input type="text" name="sach_id" value ="<?= $row['sach_id'];?>"> <br>
sinh_viên_id :<input type="text" name="sinhvien_id" value ="<?= $row['sinhvien_id'];?>"> <br>
    <input type="submit" value="Thêm">
</form>
</div>