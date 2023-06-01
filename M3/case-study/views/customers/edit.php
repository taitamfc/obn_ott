<div class="col-12">
    <form action="index.php?action=update&id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data" style="border: 1px solid #ccc; padding: 20px;">
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="customer_name" value="<?= $row['customer_name']; ?>" class="form-control">
            <?php if (isset($errors['customer_name'])): ?>
                <div class="text-danger"><?= $errors['customer_name']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" value="<?= $row['email']; ?>" class="form-control">
            <?php if (isset($errors['email'])): ?>
                <div class="text-danger"><?= $errors['email']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Địa Chỉ</label>
            <input type="text" name="address" value="<?= $row['address']; ?>" class="form-control">
            <?php if (isset($errors['address'])): ?>
                <div class="text-danger"><?= $errors['address']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">SDT</label>
            <input type="text" name="sdt" value="<?= $row['sdt']; ?>" class="form-control">
            <?php if (isset($errors['sdt'])): ?>
                <div class="text-danger"><?= $errors['sdt']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Ảnh</label>
            <?php if ($row['image']): ?>
                <img src="<?= ROOT_URL . $row['image']; ?>" alt="<?= ROOT_URL . $row['customer_name']; ?>" style="max-width: 100px;">
            <?php endif; ?>
            <input type="file" class="form-control" name="image">
            <?php if (isset($errors['image'])): ?>
                <div class="text-danger"><?= $errors['image']; ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
