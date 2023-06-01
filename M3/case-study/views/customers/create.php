<div class="col-12">
    <form method="post" action="index.php?action=store" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="customer_name" class="form-control">
            <?php if (isset($errors['customer_name'])): ?>
                <div class="text-danger"><?php echo $errors['customer_name']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
            <?php if (isset($errors['email'])): ?>
                <div class="text-danger"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address">
            <?php if (isset($errors['address'])): ?>
                <div class="text-danger"><?php echo $errors['address']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="sdt">
            <?php if (isset($errors['sdt'])): ?>
                <div class="text-danger"><?php echo $errors['sdt']; ?></div>
            <?php endif; ?>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image">
            <?php if (isset($errors['image'])): ?>
                <div class="text-danger"><?php echo $errors['image']; ?></div>
            <?php endif; ?>
        </div>
        
        <br>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
