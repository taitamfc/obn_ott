<?php include_once '../db.php'; ?>
<?php
$sql = "SELECT * FROM `sinhvien`";
$msg = isset( $_GET['msg'] ) ? $_GET['msg'] : '';


$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array 
$sinhvien = $stmt->fetchAll();
?>

<div class="container-fluid px-4">
<a href="add.php"> Thêm mới </a>
<p>
    <?= $msg ?>
</p>
<table border="1" class="table">
    <thead>
        <tr>
            <th>MASINHVIEN</th>
            <th>TENSINHVIEN</th>
            <th>DIA CHI</th>
            <th>EMAIL</th>
            <th>SĐT</th>
            <th>Sửa, Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $sinhvien as $key => $row ): 
            // echo '<pre>';
            // print_r($row);
            // die();
            ?>
            <tr>
                <td> <?php echo $key+1;?> </td>
                <td><?php echo $row['tenSV'];?></td>
                <td><?php echo $row['diachi'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['sdt'];?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ;?>">Edit</a> <br>
                    <a href="delete.php?id=<?= $row['id'] ;?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
