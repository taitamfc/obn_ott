<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Thêm Mới Khoa
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post" action="index.php?controller=khoa&action=store" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Tên Khoa</label>
                        <input type="text" name="name1" class="form-control">
                        <?php if(isset($error['name1'])): ?>
                            <div class="text-danger"><?php echo $error['name1']; ?></div>
                        <?php endif; ?>
                    </div>
                    <label class="form-label">Ảnh</label>
        <input type="file" class="form-control" name="image">
        <?php if (isset($error['image'])): ?>
                            <div class="text-danger"><?php echo $error['image']; ?></div>
                        <?php endif; ?>
        <br>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a type="button" href="index.php?controller=khoa" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
