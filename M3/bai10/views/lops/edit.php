
<form action="index.php?controller=lop&action=update&id=<?= $row['id'];?>" method="post">
    <label class="form-label">Tên Lớp</label>
    <input type="text" name="class_name" value="<?= $row['class_name'];?>" class="form-control">
    <?php if(isset($error['class_name'])): ?>
        <div class="text-danger"><?= $error['class_name']; ?></div>
    <?php endif; ?>
    <br>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a type="button" href="index.php?controller=lop" class="btn btn-secondary">Quay lại</a>
</form>
