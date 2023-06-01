<form action="index.php?controller=product&action=update&id=<?= $row['id']; ?>" method="post" enctype="multipart/form-data">
<label class="form-label">Tên Sản Phẩm</label>
    <input type="text" name="product_name" value="<?= $row['product_name']; ?>" class="form-control"> <br>

<label class="form-label">Thuộc Loại </label>
    <select name="category_id" class="form-control">
        <?php foreach ($categories as $categorie): ?>
            <option <?= $categorie['id'] == $row['category_id'] ? "selected" : "" ?> value="<?= $categorie['id']; ?>">
                <?= $categorie['category_name']; ?></option>
        <?php endforeach; ?>
    </select>
    <br>

    <label class="form-label">Giá</label>
    <input type="text" name="price" value="<?= $row['price']; ?>" class="form-control"> <br>

    <div class="mb-3">
        <label class="form-label">Ảnh</label>
        <?php if ($row['image']): ?>
            <img src="<?= ROOT_URL . $row['image']; ?>" alt="<?= ROOT_URL . $row['product_name']; ?>" style="max-width: 100px;">
        <?php endif; ?>
        <input type="file" class="form-control" name="image">
        <?php if (isset($errors['image'])): ?>
            <div class="text-danger"><?= $errors['image']; ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
    <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
</form>
