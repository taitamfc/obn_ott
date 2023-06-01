<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Thêm Mới Lớp
        </div>
        <div class="card-body">
            <div class="col-12">
                <form method="post" action="index.php?controller=lop&action=store" >
                    <div class="mb-3">
                        <label class="form-label">Tên</label>
                        <input type="text" name="class_name" class="form-control">
                        <?php if (isset($error['class_name'])): ?>
                            <div class="text-danger"><?php echo $error['class_name']; ?></div>
                        <?php endif; ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <a type="button" href="index.php?controller=lop" class="btn btn-secondary">Quay lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
