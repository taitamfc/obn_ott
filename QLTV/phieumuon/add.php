<?php
    include_once '../db.php';

    //Xu ly form
    if( $_SERVER['REQUEST_METHOD'] == 'POST' ){
        // echo '<pre>';
        // print_r( $_REQUEST );
        // die();
        // $MASACH = $_REQUEST['id'];
        
        $ngaymuonsach = $_REQUEST['ngaymuonsach'];
        $ngaydukientra = $_REQUEST['ngaydukientra'];
        $sach_id = $_REQUEST['sach_id'];
        $sinhvien_id = $_REQUEST['sinhvien_id'];



        


        //Viet cau truy van
        $sql = "INSERT INTO phieumuon(ngaymuonsach,ngaydukientra,sach_id,sinhvien_id) VALUES('$ngaymuonsach','$ngaydukientra','$sach_id','$sinhvien_id')";
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
<h2>Thêm mới </h2>
<form action="" method="post">
  <div class="mb-3">
    <label  class="form-label">ngày mượn sách</label>
    <input type="text" class="form-control" name="ngaymuonsach"><br><br>

    <label  class="form-label">ngày dự kiến trả</label>
    <input type="text" class="form-control" name="ngaydukientra"><br><br>


    <label  class="form-label">sách_id</label>
    <input type="text" class="form-control" name="sach_id"><br><br>


    <label  class="form-label">sinh_viên_id</label>
    <input type="text" class="form-control" name="sinhvien_id"><br><br>

    
  </div>

  <input type="submit" value="Thêm">
</form>

</div>