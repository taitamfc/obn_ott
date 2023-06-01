<form action="index.php?action=update&id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
    <label class="form-label">Tên</label>
    <input type="text" name="name" value="<?= $row['name']; ?>" class="form-control"> <br>
    <?php if (isset($errors['name'])): ?>
        <div class="text-danger"><?= $errors['name']; ?></div>
    <?php endif; ?>

    <label class="form-label">Email</label>
    <input type="text" name="email" value="<?= $row['email']; ?>" class="form-control"> <br>
    <?php if (isset($errors['email'])): ?>
        <div class="text-danger"><?= $errors['email']; ?></div>
    <?php endif; ?>

    <label class="form-label">Tên lớp</label>
    <select name="class_id" class="form-control">
        <?php foreach ($classes as $tenlop): ?>
            <option <?= $tenlop['id'] == $row['class_id'] ? "selected" : "" ?> value="<?= $tenlop['id']; ?>">
                <?= $tenlop['class_name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <label class="form-label">Tên Khoa</label>
    <select name="department_id" class="form-control">
        <?php foreach ($khoas as $khoa): ?>
            <option <?= $khoa['id'] == $row['department_id'] ? "selected" : "" ?> value="<?= $khoa['id']; ?>">
                <?= $khoa['name1']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <label class="form-label">Địa Chỉ</label>
    <input type="text" name="address" value="<?= $row['address']; ?>" class="form-control"> <br>
    <?php if (isset($errors['address'])): ?>
        <div class="text-danger"><?= $errors['address']; ?></div>
    <?php endif; ?>

    <div class="mb-3">
        <label class="form-label">Ảnh</label>
        <?php if ($row['image']): ?>
            <img src="<?= ROOT_URL . $row['image']; ?>" alt="<?= ROOT_URL . $row['name']; ?>" style="max-width: 100px;">
        <?php endif; ?>
        <input type="file" class="form-control" name="image">
        <?php if (isset($errors['image'])): ?>
            <div class="text-danger"><?= $errors['image']; ?></div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
</form>
