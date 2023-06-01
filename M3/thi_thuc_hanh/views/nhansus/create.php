<div class="col-12">
    <form method="post" action="index.php?action=store" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="ten" class="form-control">
            <?php if (isset($errors['ten'])): ?>
                <div class="text-danger"><?php echo $errors['ten']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Vị Trí</label>
            <input type="text" class="form-control" name="vitri">
            <?php if (isset($errors['vitri'])): ?>
                <div class="text-danger"><?php echo $errors['vitri']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Chi Nhánh</label>
            <input type="text" class="form-control" name="chinhanh">
            <?php if (isset($errors['chinhanh'])): ?>
                <div class="text-danger"><?php echo $errors['chinhanh']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Tuổi</label>
            <input type="text" class="form-control" name="tuoi">
            <?php if (isset($errors['tuoi'])): ?>
                <div class="text-danger"><?php echo $errors['tuoi']; ?></div>
            <?php endif; ?>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Ngày Làm Việc</label>
            <input type="date" class="form-control" name="ngaylamviec">
            <?php if (isset($errors['ngaylamviec'])): ?>
                <div class="text-danger"><?php echo $errors['ngaylamviec']; ?></div>
            <?php endif; ?>
        </div>
         
        <div class="mb-3">
            <label class="form-label">Lương</label>
            <input type="text" class="form-control" name="luong">
            <?php if (isset($errors['luong'])): ?>
                <div class="text-danger"><?php echo $errors['luong']; ?></div>
            <?php endif; ?>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
