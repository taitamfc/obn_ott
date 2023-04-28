<?php
    include_once '../db.php';//$conn
    // echo '<pre>';
    // print_r($_GET);
    // die();
    $sql = "SELECT * FROM `loaisach`";
    $stmt = $conn->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
    $loai_sachs = $stmt->fetchAll();

     
    //Lay gia tri ID tren URL
    $id = $_GET['id'];
    //lay du lieu theo ID
    $sql = "SELECT * FROM `sach` WHERE id = $id";
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
        $tensach = $_REQUEST['tensach'];
        $tentacgia = $_REQUEST['tentacgia'];
        $ngayxuatban = $_REQUEST['ngayxuatban'];
        $loaisach_id = $_REQUEST['loaisach_id'];

        //Viet cau truy van
        $sql = "UPDATE `sach` SET 
        tensach = '$tensach',
        tentacgia = '$tentacgia',
        ngayxuatban = '$ngayxuatban',
        loaisach_id = '$loaisach_id'
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
Tên Sách :<input type="text" name="tensach" value ="<?= $row['tensach'];?>"> <br>
Tên Tác Giả :<input type="text" name="tentacgia" value ="<?= $row['tentacgia'];?>"> <br>
Ngày Xuất Bản  :<input type="text" name="ngayxuatban" value ="<?= $row['ngayxuatban'];?>"> <br>
<label  class="form-label">THELOAISACH</label>
    <select name="loaisach_id" class="form-control">
    <?php foreach( $loai_sachs as $loai_sach ): ?>
      <option value="<?php echo $loai_sach['id'];?>"><?php echo $loai_sach['tenloaisach'];?></option>
      <?php endforeach; ?>
    </select>
    <input type="submit" value="Thêm">
</form>
</div>