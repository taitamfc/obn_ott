
<table class="table">
    <tr>
        <th>STT</th>
        <td><?= $row['id']; ?></td>
    </tr>
    <tr>
        <th>Tên Lớp</th>
        <td><?= $row['name1']; ?></td>
    </tr>
    <tr>
        <th>Ảnh</th>
        <td><img width="50" height="80" src="<?php echo ROOT_URL . $row['image'];?>" alt=""> </td>

    </tr>
    </table>
    <a type="button" href="index.php?controller=khoa" class="btn btn-secondary">Quay lại</a>