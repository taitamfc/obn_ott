<div class="col-12">
    <form action="index.php?action=update&id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data" style="border: 1px solid #ccc; padding: 20px;">
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="ten" value="<?= $row['ten']; ?>" class="form-control">
            <?php if (isset($errors['ten'])): ?>
                <div class="text-danger"><?= $errors['ten']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Vị Trí</label>
            <input type="text" name="vitri" value="<?= $row['vitri']; ?>" class="form-control">
            <?php if (isset($errors['vitri'])): ?>
                <div class="text-danger"><?= $errors['vitri']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Chi Nhanh</label>
            <input type="text" name="chinhanh" value="<?= $row['chinhanh']; ?>" class="form-control">
            <?php if (isset($errors['chinhanh'])): ?>
                <div class="text-danger"><?= $errors['chinhanh']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Tuổi</label>
            <input type="text" name="tuoi" value="<?= $row['tuoi']; ?>" class="form-control">
            <?php if (isset($errors['tuoi'])): ?>
                <div class="text-danger"><?= $errors['tuoi']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày Làm Việc</label>
            <input type="text" name="ngaylamviec" value="<?= $row['ngaylamviec']; ?>" class="form-control">
            <?php if (isset($errors['ngaylamviec'])): ?>
                <div class="text-danger"><?= $errors['ngaylamviec']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Lương</label>
            <input type="text" name="luong" value="<?= $row['luong']; ?>" class="form-control">
            <?php if (isset($errors['luong'])): ?>
                <div class="text-danger"><?= $errors['luong']; ?></div>
            <?php endif; ?>
        </div>
       
       
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
