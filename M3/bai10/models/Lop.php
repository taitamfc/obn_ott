<?php
    // Ket noi voi database
    class Lop {

        public static function paginate(){
            global $conn;
            $sql = "SELECT * FROM `classes`";

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
        // lay ta ca du lieu
        public static function all(){
            global $conn;
            $sql = "SELECT * FROM `classes`";

            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll(); 

            // Tra ve cho Model
            return $rows;
        }
        // lay chi tiet 1 du lieu
        public static function find($id){
            global $conn;
            $sql = "SELECT * FROM `classes` WHERE id = $id";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            return $row;
        }

        public static function store($data, &$error){
            global $conn;
            $name = $data['class_name'];
        
            // Kiểm tra tên lớp hợp lệ
            if (empty($name)) {
                $error['class_name'] = 'Vui lòng nhập tên Lớp!';
                return false;
            }
        
            $sql = "INSERT INTO `classes` (`class_name`) VALUES ('$name')";
            $conn->exec($sql);
            return true;
        }
        
          // Cap nhat du lieu
          public static function update($id, $data, &$error){
            global $conn;
            $name = $data['class_name'];
      
            // Kiểm tra tên lớp hợp lệ
            if (empty($name)) {
                $error['class_name'] = 'Vui lòng nhập tên Lớp!';
                return false;
            }

            $sql = "UPDATE `classes` SET `class_name` = '$name'WHERE `id` = $id";
            $conn->exec($sql);
            return true;
        }

        //Xoa du lieu
        public static function delete($id){
            global $conn;
            $sql = "DELETE FROM classes WHERE id = $id";
            // Thuc thi SQL
            $conn->exec($sql);
            return true;
        }
    }