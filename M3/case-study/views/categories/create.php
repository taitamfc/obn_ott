<div class="col-12">
    <form method="post" action="index.php?controller=categorie&action=store" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" name="category_name" class="form-control">
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
