<table class="table" enctype="multipart/form-data">
    <tr>
        <th>STT</th>
        <td><?= $row['id']; ?></td>
    </tr>
    <tr>
        <th>Tên Thực Phẩm</th>
        <td><?= $row['product_name']; ?></td>
    </tr>
    <tr>
        <th>Thuộc Loại</th>
        <td><?= $row['tendm']; ?></td>
    </tr>
    <tr>
        <th>Giá</th>
        <td><?= $row['price']; ?></td>
    </tr>
    <tr>
        <th>Ảnh</th>
        <td><img width="50" height="80" src="<?php echo ROOT_URL . $row['image'];?>" alt=""> </td>

    </tr>
</table>
<a type="button" href="index.php?controller=product&action=index" class="btn btn-secondary">Quay lại</a>

