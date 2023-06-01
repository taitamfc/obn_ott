<?php
    // Ket noi voi database
    class Nhansu {
        // lay ta ca du lieu
        public static function paginate(){
            global $conn;
            $sql = "SELECT * FROM `nhan_su`";
            // xử lí tìm kiếm
if( isset( $_GET["s"] )  ){
    $s1= $_GET["s"];
    $sql .= " WHERE nhan_su.ten LIKE '%$s1%' OR nhan_su.vitri LIKE '%$s1%' OR nhan_su.chinhanh LIKE '%$s1%' OR nhan_su.tuoi LIKE '%$s1%' OR nhan_su.ngaylamviec LIKE '%$s1%' OR nhan_su.luong LIKE '%$s1%'";
}
$sql .= " ORDER BY nhan_su.id DESC";

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
            $sql = "SELECT * FROM `nhan_su`";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $rows = $stmt->fetchAll(); 
            // Tra ve cho Model
            return $rows;
        }


        // lay chi tiet 1 du lieu
        public static function find($id){
            global $conn;
            $sql = "SELECT * FROM `nhan_su` WHERE id = $id";
            $stmt = $conn->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch();
            return $row;
        }

        // Them moi du lieu
        public static function store($data){
            global $conn;
            $name = $data['ten'];
            $vitri = $data['vitri'];
            $chinhanh = $data['chinhanh'];
            $tuoi = $data['tuoi'];
            $ngaylamviec = $data['ngaylamviec'];
            $luong = $data['luong'];
           
            $sql = "INSERT INTO `nhan_su` 
            ( `ten`, `vitri`, `chinhanh`, `tuoi`, `ngaylamviec`, `luong`) 
            VALUES 
            ('$name','$vitri','$chinhanh','$tuoi','$ngaylamviec','$luong')";
            //Thuc hien truy van
            $conn->exec($sql);
            return true;
        }
        
        // Cap nhat du lieu
        public static function update( $id, $data ){
            global $conn;
            $name = $data['ten'];
            $vitri = $data['vitri'];
            $chinhanh = $data['chinhanh'];
            $tuoi = $data['tuoi'];
            $ngaylamviec = $data['ngaylamviec'];
            $luong = $data['luong'];
     

            $sql = "UPDATE `nhan_su` SET `ten` = '$name', `vitri` = '$vitri', `chinhanh` = '$chinhanh', `tuoi` = '$tuoi', `ngaylamviec` = '$ngaylamviec', `luong` = '$luong' WHERE `id` = $id";
            //Thuc hien truy van
            $conn->exec($sql);
            return true;

        }

        //Xoa du lieu
        public static function delete($id){
            global $conn;
            $sql = "DELETE FROM nhan_su WHERE id = $id";
            // Thuc thi SQL
            $conn->exec($sql);
            return true;
        }
    }