<style>
.success-message {
    background-color: #ccc;
    color: #006100;
    padding: 10px;
    margin-bottom: 10px;
    opacity: 1;
    transition: opacity 1s ease-in-out;
}

.success-message.hidden {
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.pagination {
    list-style: none;
    display: flex;
    justify-content: center;
    align-items: center;
}

.pagination .page-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin: 0 5px;
    background-color: #f7a260; /* Thay đổi màu thành màu cam nhạt */
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s ease;
}

.pagination .page-link.active {
    background-color: #333;
}

.pagination .page-link:hover {
    background-color: #999;
}
</style>

<script>
// Ẩn thông báo sau 1 giây
setTimeout(function() {
    var successMessage = document.querySelector('.success-message');
    if (successMessage) {
        successMessage.classList.add('hidden');
    }
}, 2000);
</script>

<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <?php if ($successMessage !== ''): ?>
        <div class="success-message"><?php echo $successMessage; ?></div>
        <?php endif; ?>
        <div class="col-12 col-md-12 mt-2">
            <div class="card">
                <div class="card-header">
                 <h3>Thể Loại</h3>
                </div>
                <div class="card-body">
                    <div class="col-12">
                        <a class="btn btn-success mb-2" href="index.php?controller=categorie&action=create">Thêm Mới</a>
                        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"
                            action="index.php" method="get">
                            <input type="hidden" name="controller" value="categorie">
                            <input type="hidden" name="action" value="index">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search for..." name="s" />

                                <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i
                                        class="fas fa-search"></i></button>
                            </div>

                        </form>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên </th>
                                    <th>Ảnh</th>
                                    <th>Hành Động</th>


                                </tr>

                                <!-- Bắt đầu lặp -->
                                <?php
        foreach($items as $r) :
                // echo '<pre>';
                // print_r($r);
                // die();
        ?>
                                <tr>
                                    <td><?php echo $r['id'];?> </td>
                                    <td><?php echo $r['category_name'];?> </td>
                                    <td><img width="50" height="80" src="<?php echo ROOT_URL . $r['image'];?>" alt="">
                                    </td>


                                    <td>
                                        <a href="index.php?controller=categorie&action=destroy&id=<?php echo $r['id'];?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn chắc chắn muốn xoá?')">Xóa</a>
                                        <a href="index.php?controller=categorie&action=show&id=<?php echo $r['id'];?>"
                                            class="btn btn-info btn-sm">Xem</a>
                                        <a href="index.php?controller=categorie&action=edit&id=<?php echo $r['id'];?>"
                                            class="btn btn-primary btn-sm">Sửa</a>
                                    </td>
                                    </td>
                                </tr>

                                <!-- Kết thúc vòng lặp -->
                                <?php endforeach; ?>
                        </table>
                        <div class="pagination justify-content-center">
                            <?php if ($current_page > 1) : ?>
                            <a class="page-link" href="?controller=categorie&page=<?php echo $current_page - 1; ?>" aria-label="Trang trước">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            <?php endif; ?>

                            <?php
    $start_page = max(1, $current_page - 1);
    $end_page = min($start_page + 2, $total_pages);

    for ($i = $start_page; $i <= $end_page; $i++) :
        if ($i == $current_page) : ?>
                            <a class="page-link active" href="?controller=categorie&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            <?php else : ?>
                            <a class="page-link" href="?controller=categorie&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            <?php endif;
    endfor; ?>

                            <?php if ($current_page < $total_pages) : ?>
                            <a class="page-link" href="?controller=categorie&page=<?php echo $current_page + 1; ?>" aria-label="Trang sau">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>