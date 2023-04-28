<?php include_once '../db.php'; ?>
<?php
$sql = "SELECT * FROM `phieumuon`";
$msg = isset( $_GET['msg'] ) ? $_GET['msg'] : '';


$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
$phieumuon = $stmt->fetchAll();
?>

<div class="container-fluid px-4">
<a href="add.php"> Thêm mới </a>
<p>
    <?= $msg ?>
</p>
<table border="1" class="table">
    <thead>
        <tr>
            <th>MAPHIEUMUON</th>
            <th>NGAYMUONSACH</th>
            <th>NGAYDUKIENTRA</th>
            <th>MASlACH</th>
            <th>MASINHVIEN</th>
            <th>Sửa, Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $phieumuon as $key => $row ): 
            // echo '<pre>';
            // print_r($row);
            // die();
            ?>
            <tr>
                <td> <?php echo $key+1;?> </td>
                <td><?php echo $row['ngaymuonsach'];?></td>
                <td><?php echo $row['ngaydukientra'];?></td>
                <td><?php echo $row['sach_id'];?></td>
                <td><?php echo $row['sinhvien_id'];?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ;?>">Edit</a> <br>
                    <a href="delete.php?id=<?= $row['id'] ;?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
