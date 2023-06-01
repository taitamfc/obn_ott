<div class="col-12">
    <form method="post" action="index.php?controller=order&action=store" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <select name="customer_id" class="form-control">
                <?php foreach ($customers as $customer) : ?>
                    <option value="<?php echo $customer['id']; ?>"><?php echo $customer['customer_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Tên Sản Phẩm</label>
            <select name="product_id" class="form-control" onchange="updatePrice(this)">
                <?php foreach ($products as $product) : ?>
                    <option value="<?php echo $product['id']; ?>" data-price="<?php echo $product['price']; ?>"><?php echo $product['product_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Ngày Đặt</label>
            <input type="date" name="order_date" class="form-control">
            <?php if (isset($errors['order_date'])) : ?>
                <div class="text-danger"><?php echo $errors['order_date']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label class="form-label">Số Lượng</label>
            <input type="text" name="quantity" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="text" name="price" id="price" class="form-control" readonly>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a type="button" href="index.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<script>
    function updatePrice(select) {
        var priceInput = document.getElementById('price');
        var selectedOption = select.options[select.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        priceInput.value = price;
    }
</script>
