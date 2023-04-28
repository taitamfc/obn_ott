<?php
include_once 'db.php';
$sql = "SELECT * FROM c10_mat_hang";

// truy vấn
$stmt = $conn->query($sql);

// thiết lập kiểu dử liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);//array []
 
// trả về dử liệu
$rows = $stmt->fetchAll();//[]

// echo '<pre>';
// print_r($rows);
// die();
?>
<a href="create.php"> Thêm mới </a>

<table border = "1">
    <tr>
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>mã công ty</th>
        <th>mã loại hàng</th>
        <th>số lượng</th>
        <th>đơn vị tính</th>
        <th>giá hàng</th>
        <th>Hành động</th>
    </tr>

    <?php
    foreach ($rows as $r) :
        ?>

        <tr>
            <td><?php echo $r['MAHANG'];?></td>
            <td><?php echo $r['TENHANG'];?></td>
            <td><?php echo $r['MACONGTY'];?></td>
            <td><?php echo $r['MALOAIHANG'];?></td>
            <td><?php echo $r['SOLUONG'];?></td>
            <td><?php echo $r['DONVITINH'];?></td>
            <td><?php echo $r['GIAHANG'];?></td>
            <td>
            <a href="edit.php?id=<?= $row['MAHANG'] ;?>">Edit</a> <br>
                    <a href="delete.php?id=<?= $row['MAHANG'] ;?>">Delete</a>
            </td>
        </tr>
        <?php endforeach;?>
</table> 
