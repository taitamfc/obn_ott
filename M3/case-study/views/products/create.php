<div class="col-12">
    <form method="post" action="index.php?controller=product&action=store" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tên Sản Phẩm</label>
            <input type="text" name="product_name" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Thuộc Loại </label>
            <select name="category_id" class="form-control">
                <?php foreach ($categories as $categorie) : ?>
                    <option value="<?php echo $categorie['id']; ?>"><?php echo $categorie['category_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="text" class="form-control" name="price">
        </div>
    
        <label class="form-label">Ảnh</label>
        <input type="file" class="form-control" name="image">
        <?php if (isset($error['image'])): ?>
                            <div class="text-danger"><?php echo $error['image']; ?></div>
                        <?php endif; ?>
        <br>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
