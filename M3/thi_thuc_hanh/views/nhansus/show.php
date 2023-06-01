<table class="table" enctype="multipart/form-data">
    <tr>
        <th>STT</th>
        <td><?= $row['id']; ?></td>
    </tr>
    <tr>
        <th>Tên</th>
        <td><?= $row['ten']; ?></td>
    </tr>
    <tr>
        <th>Vị Trí</th>
        <td><?= $row['vitri']; ?></td>
    </tr>

    <tr>
        <th>Chi Nhánh</th>
        <td><?= $row['chinhanh']; ?></td>
    </tr>
    <tr>
        <th>Tuổi</th>
        <td><?= $row['tuoi']; ?></td>
    </tr>
    <tr>
        <th>Ngày Làm Việc</th>
        <td><?= $row['ngaylamviec']; ?></td>
    </tr>
    <tr>
        <th>Lương</th>
        <td><?= $row['luong']; ?></td>
    </tr>
</table>
<a type="button" href="index.php?controller=nhansu&action=index" class="btn btn-secondary">Quay lại</a>

