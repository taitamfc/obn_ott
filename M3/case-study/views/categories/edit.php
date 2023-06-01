<form action="index.php?controller=categorie&action=update&id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
    <label class="form-label">Tên</label>
    <input type="text" name="category_name" value="<?= $row['category_name']; ?>" class="form-control"> <br>

   
    <div class="mb-3">
        <label class="form-label">Ảnh</label>
        <?php if ($row['image']): ?>
            <img src="<?= ROOT_URL . $row['image']; ?>" alt="<?= ROOT_URL . $row['category_name']; ?>" style="max-width: 100px;">
        <?php endif; ?>
        <input type="file" class="form-control" name="image">
        <?php if (isset($errors['image'])): ?>
            <div class="text-danger"><?= $errors['image']; ?></div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
</form>
