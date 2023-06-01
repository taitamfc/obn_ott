<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <?php
        // Kiểm tra xem có thông báo thành công hay không
        if (isset($successMessage)) {
            echo '<div class="success-message">' . $successMessage . '</div>';
            echo '<script>setTimeout(function() { $(".success-message").fadeOut("slow"); }, 1000);</script>';
        }
        ?>
        <div class="card-header">
          <h3> Chi Tiết Đơn Hàng</h3> 
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách Hàng</th>
                        <th>Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Bắt đầu lặp -->
                    <tr>
                        <td><?php echo $items['id']; ?></td>
                        <td><?php echo $items['tenkhachhang']; ?></td>
                        <td><?php echo $items['tensp']; ?></td>
                        <td><?php echo $items['quantity']; ?></td>
                        <td><?php echo $items['price']; ?></td>
                    </tr>
                    <!-- Kết thúc vòng lặp -->
                </tbody>
            </table>
        </div>
    </div>
</div>