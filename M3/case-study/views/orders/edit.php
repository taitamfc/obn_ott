<form action="index.php?controller=order&action=update&id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
<label class="form-label">Tên </label>
    <select name="customer_id" class="form-control">
        <?php foreach ($customers as $customer): ?>
            <option <?= $customer['id'] == $row['customer_id'] ? "selected" : "" ?> value="<?= $customer['id']; ?>">
                <?= $customer['customer_name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <label class="form-label">Ngày Đặt</label>
    <input type="date" name="order_date" value="<?= $row['order_date']; ?>" class="form-control"> <br>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a type="button" href="index.php?controller=order&action=index" class="btn btn-secondary">Quay lại</a>
</form>
