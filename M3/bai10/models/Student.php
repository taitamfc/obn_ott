<?php
    // Ket noi voi database
    $error = [];
        class Student {
            // lay ta ca du lieu
            public static function paginate(){
                global $conn;
                $sql = "SELECT students.*, classes.class_name AS tenlop, department.name1 AS name1 FROM students
                JOIN classes ON students.class_id = classes.id
                JOIN department ON students.department_id = department.id
                ORDER BY students.id DESC"; 
                // xử lí tìm kiếm
                if( isset( $_GET["s"] )  ){
                    $s1= $_GET["s"];
                    $sql .= " WHERE students.name  LIKE '%$s1%' OR students.email LIKE '%$s1%' OR students.address LIKE '%$s1%' OR classes.class_name LIKE '%$s1%'OR department.name1 LIKE '%$s1%'";
                }

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
                $sql = "SELECT students.*, classes.class_name AS tenlop, department.name1 AS name1 FROM students
                JOIN classes ON students.class_id = classes.id
                JOIN department ON students.department_id = department.id
                ORDER BY students.id DESC"; 
                // xử lí tìm kiếm
                if( isset( $_GET["s"] )  ){
                    $s1= $_GET["s"];
                    $sql .= " WHERE students.name  LIKE '%$s1%' OR students.email LIKE '%$s1%' OR students.address LIKE '%$s1%' OR classes.class_name LIKE '%$s1%'OR department.name1 LIKE '%$s1%'";
                }


                $stmt = $conn->query($sql);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $rows = $stmt->fetchAll();

                // Tra ve cho Model
                return $rows;
            }
        // lay chi tiet 1 du lieu
        public static function find($id){
            global $conn;
            $sql = "SELECT students.*, classes.class_name AS tenlop, department.name1 AS name1,students.image AS image
              FROM students
            JOIN classes ON students.class_id = classes.id
            JOIN department ON students.department_id = department.id WHERE students.id = $id";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            return $row;
        }
        // Them moi du lieu
        public static function store($data , &$error){
            global $conn;
            $name = $data['name'];
            $email = $data['email'];
            $address = $data['address'];
            $tenlop = $data['class_id'];
            $tenkhoa = $data['department_id'];
            $ANH = '';

                // Kiểm tra tên lớp hợp lệ
                if (empty($name)) {
                    $error['name'] = 'Vui lòng nhập tên !';
                return false;

                }
                // if (empty($email)) {
                //     $error['email'] = 'Vui lòng nhập email !';
                // }
                // if (empty($address)) {
                //     $error['address'] = 'Vui lòng nhập Địa Chỉ !';
                // }
                // if (empty($email)) {
                //     $error['email'] = 'Vui lòng nhập email !';  
                // }
                // if (empty($address)) {
                //     $error['address'] = 'Vui lòng nhập Địa chỉ !';  
                // }
                

            if (isset($_FILES['image']))
            {
                if (!$_FILES['image']['error'])
                {
                  move_uploaded_file($_FILES['image']['tmp_name'], ROOT_DIR.'/public/uploads/'.$_FILES['image']['name']);
                  $ANH = '/public/uploads/'.$_FILES['image']['name'];
                }
    }
            $sql = "INSERT INTO `students`
            (`name`, `email`, `address`, `class_id`,`department_id`,`image`)
            VALUES
            ('$name', '$email', '$address', '$tenlop', '$tenkhoa', '$ANH')";
           
            //Thuc hien truy van
            $conn->exec($sql);
            return true;
        }
        // Cap nhat du lieu
        public static function update($id, $data) {
            global $conn;
            $name = $data['name'];
            $email = $data['email'];
            $address = $data['address'];
            $tenlop = $data['class_id'];
            $tenkhoa = $data['department_id'];
            if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
                // Đường dẫn thư mục tải lên
                $uploadDir = ROOT_DIR . '/public/uploads/';
                // Xóa ảnh cũ nếu có
                $sql = "SELECT `image` FROM `students` WHERE `id` = $id";
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
                $sql = "SELECT `image` FROM `students` WHERE `id` = $id";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $image = $stmt->fetchColumn(0);
            }
            $sql = "UPDATE `students` SET `name` = '$name', `address` = '$address', `email` = '$email', `class_id` = '$tenlop', `department_id` = '$tenkhoa', `image` = '$image' WHERE `id` = $id";
            // Thực hiện truy vấn
            $conn->exec($sql);
            return true;
        }
        //Xoa du lieu
        public static function delete($id){
            global $conn;
            $sql = "DELETE FROM students WHERE id = $id";
            // Thuc thi SQL
            $conn->exec($sql);
            return true;
        }
    }