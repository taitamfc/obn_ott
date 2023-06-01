<?php

// Database connection
$host = "localhost";
$dbname = "quanlikhachhang1";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}

// ...

if (isset($_GET["s"]) && !empty(trim($_GET["s"]))) {
    $s = $_GET["s"];
    $sql = "SELECT * FROM `customers` WHERE customers.name LIKE '%$s%' OR customers.email LIKE '%$s%' OR customers.address LIKE '%$s%'";
} else {
    $sql = "SELECT * FROM `customers`";
}

$stmt = $conn->query($sql);
$customers = $stmt->fetchAll(PDO::FETCH_OBJ);
$total_records = count($customers);

// ...

// Code for pagination
$records_per_page = 2;
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start_index = ($current_page - 1) * $records_per_page;
$limit = $records_per_page;

$sql_count = "SELECT COUNT(*) AS total_records FROM customers";
$stmt_count = $conn->query($sql_count);
$total_records = $stmt_count->fetch(PDO::FETCH_ASSOC)['total_records'];

$sql .= " LIMIT $start_index, $limit";
$stmt = $conn->query($sql);
$customers = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<div class="col-12 col-md-12 mt-2">
    <div class="card">
        <div class="card-header">
            Danh sách khách hàng
        </div>
        <div class="card-body">
            <div class="col-12">
                <a class="btn btn-success mb-2" href="./index.php?page=add">Thêm mới</a>
                <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="index.php" method="get">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." name="s" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form> 
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Hành Động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($customers as $key => $customer): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td><?php echo $customer->name ?></td>
                        <td><?php echo $customer->email ?></td>
                        <td><?php echo $customer->address ?></td>
                        <td><a href="./index.php?page=delete&id=<?php echo $customer->id; ?>"
                               class="btn btn-danger btn-sm" onclick="return confirm('Bạn chắc chắn muốn xoá?')">Delete</a>
                            <a href="./index.php?page=edit&id=<?php echo $customer->id; ?>"
                               class="btn btn-primary btn-sm">Update</a></td>
                        <?php endforeach; ?>
                    </tbody>
                </table>
    
 
                <?php if ($total_records > $records_per_page) : ?>
                <div class="pagination justify-content-center">
                    <?php
                    $total_pages = ceil($total_records / $records_per_page);
                    $visible_pages = min($total_pages, 3);
                    $start_page = max(1, $current_page - 1);
                    $end_page = min($start_page + $visible_pages - 1, $total_pages);
                    ?>

                    <?php if ($current_page > 1) : ?>
                        <a class="page-link" href="?page=<?php echo $current_page - 1; ?>" aria-label="Trang trước">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    <?php endif; ?>

                    <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
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
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>