<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Danh Sách Sinh Viên
        </div>
        <div class="card-body">
            <div class="col-12">
                <a class="btn btn-success mb-2" href="index.php?controller=student&action=create">Thêm mới</a>
                <table class="table table-bordered">
                    <thead>
                        
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Email</th>
        <th>địa chỉ</th>
        <th>Tên Lớp</th>
        <th>Tên Khoa</th>
        <th>Ảnh</th>
        <th>hành động</th>
    
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
        <td><?php echo $r['name'];?> </td>
        <td><?php echo $r['email'];?> </td>
        <td><?php echo $r['address'];?> </td>
        <td><?php echo $r['tenlop'];?> </td>
        <td><?php echo $r['name1'];?> </td>
        <td><img width="50" height="80" src="<?php echo ROOT_URL . $r['image'];?>" alt=""> </td>
        <td><a href="index.php?controller=student&action=destroy&id=<?php echo $r['id'];?>"
                               class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xoá?')">Xóa</a>
                            <a href="index.php?controller=student&action=show&id=<?php echo $r['id'];?>" class="btn btn-info btn-sm">Xem</a> 
                            <a href="index.php?controller=student&action=edit&id=<?php echo $r['id'];?>"
                               class="btn btn-primary btn-sm">Sửa</a></td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
  
                <div class="pagination justify-content-center">
                  
                    <?php if ($current_page > 1) : ?>
                        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Trang trước">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <?php if ($i == $current_page) : ?>
                            <a class="page-link active" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php else : ?>
                            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($current_page < $total_pages) : ?>
                        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>" aria-label="Trang sau">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
