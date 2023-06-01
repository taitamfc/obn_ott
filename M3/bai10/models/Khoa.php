<?php
    // Ket noi voi database
    class Khoa {
        // lay ta ca du lieu
        public static function all(){
            global $conn;
            $sql = "SELECT * FROM `department`";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll(); 
            // Tra ve cho Model
            return $rows;
        }

        public static function paginate($limit = 3){
            global $conn;
            $sql = "SELECT * FROM `department`";

            // BAT DAU Phan trang
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $sql_count = $sql;
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $total_records = $stmt->fetchAll();
            $total_records = count($total_records);
            $total_pages = ceil($total_records / $limit);
            $start = ($current_page - 1) * $limit;
            $sql .= " LIMIT $start, $limit";
            // KET THUC Phan trang

            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll(); 
            // Tra ve cho Model
            $return = [
                'rows' => $rows,
                'total_pages' => $total_pages,
            ];
            // Tra ve cho Model
            return $return;
        }

        // lay chi tiet 1 du lieu
        public static function find($id){
            global $conn;
            $sql = "SELECT * FROM `department` WHERE id = $id";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            return $row;
        }

        // Them moi du lieu
        public static function store($data, &$error){
            global $conn;
            $name = $data['name1'];
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

            $sql = "INSERT INTO `department` 
            (`name1`,`image`) 
            VALUES 
            ('$name','$ANH')";
            //Thuc hien truy van
            $conn->exec($sql);
            return true;
        }
        
        // Cap nhat du lieu
        public static function update( $id, $data, &$error ){
            global $conn;
            $name = $data['name1'];
            if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                // Đường dẫn thư mục tải lên
                $uploadDir = ROOT_DIR . '/public/uploads/';
                // Xóa ảnh cũ nếu có
                $sql = "SELECT `image` FROM `department` WHERE `id` = $id";
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
                $sql = "SELECT `image` FROM `department` WHERE `id` = $id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $image = $stmt->fetchColumn(0);
            }
      
        // Kiểm tra tên khoa hợp lệ
        if (empty($name)) {
            $error['name1'] = 'Vui lòng nhập tên Khoa!';
            return false;
        }

            $sql = "UPDATE `department` SET `name1` = '$name',`image` = '$image'WHERE `id` = $id";
            //Thuc hien truy van
            $conn->exec($sql);
            return true;

        }

        //Xoa du lieu
        public static function delete($id){
            global $conn;
            $sql = "DELETE FROM department WHERE id = $id";
            // Thuc thi SQL
            $conn->exec($sql);
            return true;
        }
    }