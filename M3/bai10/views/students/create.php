<div class="col-12">
    <form method="post" action="index.php?action=store" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="name" class="form-control">
            <?php if (isset($error['name'])): ?>
                            <div class="text-danger"><?php echo $error['name']; ?></div>
                        <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
            <?php if (isset($error['email'])): ?>
                            <div class="text-danger"><?php echo $error['email']; ?></div>
                        <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address">
            <?php if (isset($error['address'])): ?>
                            <div class="text-danger"><?php echo $error['address']; ?></div>
                        <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Tên Lớp</label>
            <select name="class_id" class="form-control">
                <?php foreach ($classes as $class) : ?>
                    <option value="<?php echo $class['id']; ?>"><?php echo $class['class_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <div class="text-danger"><?php echo isset($errors['class_id']) ? $errors['class_id'] : ''; ?></div>
        </div>
        <div class="mb-3">
            <label class="form-label">Tên Khoa</label>
            <select name="department_id" class="form-control">
                <?php foreach ($khoas as $khoa) : ?>
                    <option value="<?php echo $khoa['id']; ?>"><?php echo $khoa['name1']; ?></option>
                <?php endforeach; ?>
            </select>
            <div class="text-danger"><?php echo isset($errors['department_id']) ? $errors['department_id'] : ''; ?></div>
        </div>
        <label class="form-label">Ảnh</label>
        <input type="file" class="form-control" name="image">
        <?php if (isset($error['image'])): ?>
                            <div class="text-danger"><?php echo $error['image']; ?></div>
                        <?php endif; ?>
        <br>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
