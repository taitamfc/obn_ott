<table class="table" enctype="multipart/form-data">
    <tr>
        <th>STT</th>
        <td><?= $row['id']; ?></td>
    </tr>
    <tr>
        <th>Tên</th>
        <td><?= $row['category_name']; ?></td>
    </tr>
    <tr>
        <th>Ảnh</th>
        <td><img width="50" height="80" src="<?php echo ROOT_URL . $row['image'];?>" alt=""> </td>

    </tr>
</table>
<a type="button" href="index.php?controller=categorie&action=index" class="btn btn-secondary">Quay lại</a>