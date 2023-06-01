<form action="index.php?controller=khoa&action=update&id=<?= $row['id'];?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Tên Khoa</label>
        <input type="text" name="name1" value="<?= $row['name1'];?>" class="form-control">
        <?php if(isset($error['name1'])): ?>
            <div class="text-danger"><?php echo $error['name1']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label class="form-label">Ảnh</label>
        <?php if ($row['image']): ?>
            <img src="<?= ROOT_URL . $row['image']; ?>" alt="<?= ROOT_URL . $row['name1']; ?>" style="max-width: 100px;">
        <?php endif; ?>
        <input type="file" class="form-control" name="image">
        <?php if (isset($errors['image'])): ?>
            <div class="text-danger"><?= $errors['image']; ?></div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a type="button" href="index.php?controller=khoa" class="btn btn-secondary">Quay lại</a>
</form>
