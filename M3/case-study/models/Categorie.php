<?php
    // Ket noi voi database
    class Categorie {
        // lay ta ca du lieu
        public static function paginate(){
            global $conn;
            $sql = "SELECT * FROM `categories`";
            // xử lí tìm kiếm
if( isset( $_GET["s"] )  ){
    $s1= $_GET["s"];
    $sql .= " WHERE categories.category_name LIKE '%$s1%'";
}
$sql .= " ORDER BY categories.id DESC";

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
            $sql = "SELECT * FROM `categories`ORDER BY categories.id desc";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll(); 
            // Tra ve cho Model
            return $rows;
        }

        // lay chi tiet 1 du lieu
        public static function find($id){
            global $conn;
            $sql = "SELECT * FROM `categories` WHERE id = $id";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            return $row;
        }

        // Them moi du lieu
        public static function store($data, &$error){
            global $conn;
            $name = $data['category_name'];
            $ANH = '';
            
        
           // Kiểm tra tên khoa hợp lệ
        if (empty($name)) {
            $error['name1'] = 'Vui lòng nhập tên Khoa!';
            return false;
        }
           
        if (isset($_FILES['image']))
        {
            if (!$_FILES['image']['error'])
            {
              move_uploaded_file($_FILES['image']['tmp_name'], ROOT_DIR.'/public/uploads/'.$_FILES['image']['name']);
              $ANH = '/public/uploads/'.$_FILES['image']['name'];
            }
}

            $sql = "INSERT INTO `categories` 
            (`category_name`,`image`) 
            VALUES 
            ('$name','$ANH')";
            //Thuc hien truy van
            $conn->exec($sql);
            return true;
        }
        
        // Cap nhat du lieu
        public static function update( $id, $data, &$error ){
            global $conn;
            $name = $data['category_name'];
            if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                // Đường dẫn thư mục tải lên
                $uploadDir = ROOT_DIR . '/public/uploads/';
                // Xóa ảnh cũ nếu có
                $sql = "SELECT `image` FROM `categories` WHERE `id` = $id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $oldImage = $stmt->fetchColumn(0);
                if ($oldImage && file_exists($uploadDir . $oldImage)) {
                    unlink($uploadDir . $oldImage);
                }
                // Di chuyển ảnh mới vào thư mục đích
                $newImage = $uploadDir . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], $newImage);
                $image = '/public/uploads/' . basename($_FILES['image']['name']);
            } else {
                // Không có ảnh mới được tải lên, giữ nguyên ảnh cũ
                $sql = "SELECT `image` FROM `categories` WHERE `id` = $id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $image = $stmt->fetchColumn(0);
            }
      
        // Kiểm tra tên khoa hợp lệ
        if (empty($name)) {
            $error['category_name'] = 'Vui lòng nhập tên Khoa!';
            return false;
        }

            $sql = "UPDATE `categories` SET `category_name` = '$name',`image` = '$image'WHERE `id` = $id";
            //Thuc hien truy van
            $conn->exec($sql);
            return true;

        }

        //Xoa du lieu
        public static function delete($id){
            global $conn;
            $sql = "DELETE FROM categories WHERE id = $id";
            // Thuc thi SQL
            $conn->exec($sql);
            return true;
        }
    }