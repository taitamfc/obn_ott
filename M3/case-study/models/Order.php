<?php
    // Ket noi voi database
    class Order {
        // lay ta ca du lieu
        public static function paginate(){
            global $conn;
            $sql = "SELECT orders.*, customers.customer_name AS tenkh FROM orders
            JOIN customers ON orders.customer_id = customers.id";

            // xử lí tìm kiếm
if( isset( $_GET["s"] )  ){
    $s1= $_GET["s"];
    $sql .= " WHERE customers.customer_name LIKE '%$s1%' OR orders.order_date LIKE '%$s1%' ";
}
$sql .= " ORDER BY orders.id DESC";
        
      // BAT DAU Phan trang
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 3;
// Tong so phan tu
$sql_count = $sql;
$stmt = $conn->query($sql);
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$total_records = $stmt->fetchAll();
$total_records = count($total_records);
$total_pages = ceil($total_records / $limit);
// KET THUC Phan trang

 // start = (current_page - 1)*limit
 $start = ($current_page - 1) * $limit;
 $sql .= " LIMIT $start, $limit";

            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll(); 
            $return = [
                'rows' => $rows,
                'total_pages' => $total_pages,
            ];
            // Tra ve cho Model
            return $return;
            
        }


        public static function all(){
            global $conn;
            $sql = "SELECT orders.*, customers.customer_name AS tenkh FROM orders
            JOIN customers ON orders.customer_id = customers.id";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll(); 
            // Tra ve cho Model
            return $rows;
        }
        

        // lay chi tiet 1 du lieu
        public static function find($id){
            global $conn;
            $sql = "SELECT * FROM `orders` WHERE id = $id";

            $sql = "SELECT orders.*, customers.customer_name AS tenkh FROM orders
            JOIN customers ON orders.customer_id = customers.id  WHERE orders.id = $id";
            
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            return $row;
        }

        // Them moi du lieu
        public static function store($data){
            global $conn;
            $name = $data['customer_id'];
            $ngay = $data['order_date'];
       
            $sql = "INSERT INTO `orders`
            (`customer_id`, `order_date`)
            VALUES
            ('$name', '$ngay')";
            //Thuc hien truy van
            $conn->exec($sql);

            // Lấy ID mới nhất
            $lastInsertedId = $conn->lastInsertId();

            return $lastInsertedId;
        }
        
        // Cap nhat du lieu
        public static function update( $id, $data){
            global $conn;
            $name = $data['customer_id'];
            $ngay = $data['order_date'];
            $sql = "UPDATE `orders` SET `customer_id` = '$name', `order_date` = '$ngay' WHERE `id` = $id";
            //Thuc hien truy van
            $conn->exec($sql);
            return true;

        }

        //Xoa du lieu
        public static function delete($id){
            global $conn;
            $sql = "DELETE FROM orders WHERE id = $id";
            // Thuc thi SQL
            $conn->exec($sql);
            return true;
        }
    }