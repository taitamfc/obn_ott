<?php
require_once 'models/Nhansu.php';
class NhansuController {
    // Hien thi danh sach records => table
    public function index(){
        $return = Nhansu::paginate();   
        $items = $return['rows'];
        $total_pages = $return['total_pages'];
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    
        $successMessage = '';
    
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            $successMessage = 'Thêm thành công!';
        }
    
        if (isset($_GET['delete_success']) && $_GET['delete_success'] == 1) {
            $successMessage = 'Xóa thành công!';
        }
        if (isset($_GET['success']) && $_GET['success'] == 2) {
            $successMessage = 'Cập nhật thành công!';
        }
        
        // Truyen data xuong view
        require_once 'views/nhansus/index.php';
       
    }
    // Hien thi form them moi
    public function create(){
        require_once 'views/nhansus/create.php';
    }
    // Xu ly them moi
    public function store(){
    //     // Goi model
    //     Nhansu::store($_POST);
    //     // Chuyen huong ve trang danh sach
    //     header("Location: index.php?controller=nhansu&action=index&success=1");

    // }


    $errors = array();
    $data = $_POST;

    // Validate dữ liệu
    $name = isset($data['ten']) ? $data['ten'] : '';
    if (empty($name)) {
        $errors['ten'] = 'Bạn chưa nhập tên ';
    }

    $vitri = isset($data['vitri']) ? $data['vitri'] : '';
    if (empty($vitri)) {
        $errors['vitri'] = 'Bạn chưa nhập vị Trí';
    }

    $chinhanh = isset($data['chinhanh']) ? $data['chinhanh'] : '';
    if (empty($chinhanh)) {
        $errors['chinhanh'] = 'Bạn chưa nhập chi nhánh';
    }

    $tuoi = isset($data['tuoi']) ? $data['tuoi'] : '';
    if (empty($tuoi)) {
        $errors['tuoi'] = 'Bạn chưa nhập tuổi';

    }
    $ngaylamviec = isset($data['ngaylamviec']) ? $data['ngaylamviec'] : '';
    if (empty($ngaylamviec)) {
        $errors['ngaylamviec'] = 'Bạn chưa nhập ngày làm việc';
    }
    $luong = isset($data['luong']) ? $data['luong'] : '';
    if (empty($luong)) {
        $errors['luong'] = 'Bạn chưa nhập lương';
    }

    // Kiểm tra và lưu dữ liệu
    if (count($errors) == 0) {
        if (Nhansu::store($data)) {
            // Chuyển hướng về trang danh sách
            header("Location: index.php?controller=nhansu&action=index&success=1");
        } else {
            // Truyền lỗi xuống view
            require_once 'views/nhansus/create.php';
        }
    } else {
        // Truyền lỗi và dữ liệu xuống view
        require_once 'views/nhansus/create.php';
    }
}



    // Hien thi form chinh sua
    public function edit(){
        $id = $_GET['id'];
        $row = Nhansu::find($id);
        // Truyen xuong view
        require_once 'views/nhansus/edit.php';
    }

    // // Xu ly chinh sua
    // public function update(){
    //     $id = $_GET['id'];
    //     Nhansu::update( $id, $_POST );
    //     // Chuyen huong ve trang danh sach
    //     header("Location: index.php?controller=nhansu&action=index&success=2");
    // }



    public function update()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $data = $_POST;
    
        $errors = array();
        
        $name = isset($data['ten']) ? $data['ten'] : '';
        if (empty($name)) {
            $errors['ten'] = 'Bạn chưa nhập tên ';
        }
    
        $vitri = isset($data['vitri']) ? $data['vitri'] : '';
        if (empty($vitri)) {
            $errors['vitri'] = 'Bạn chưa nhập vị Trí';
        }
    
        $chinhanh = isset($data['chinhanh']) ? $data['chinhanh'] : '';
        if (empty($chinhanh)) {
            $errors['chinhanh'] = 'Bạn chưa nhập chi nhánh';
        }
    
        $tuoi = isset($data['tuoi']) ? $data['tuoi'] : '';
        if (empty($tuoi)) {
            $errors['tuoi'] = 'Bạn chưa nhập tuổi';
    
        }
        $ngaylamviec = isset($data['ngaylamviec']) ? $data['ngaylamviec'] : '';
        if (empty($ngaylamviec)) {
            $errors['ngaylamviec'] = 'Bạn chưa nhập ngày làm việc';
        }
        $luong = isset($data['luong']) ? $data['luong'] : '';
        if (empty($luong)) {
            $errors['luong'] = 'Bạn chưa nhập lương';
        }
    
    
        // Kiểm tra và cập nhật dữ liệu
        if (count($errors) == 0) {
            if (Nhansu::update($id, $data)) {
                 // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=nhansu&action=index&success=2");
            } else {
                // Truyền lỗi xử lí cập nhật xuống view
                $row = Nhansu::find($id);
                require_once 'views/nhansus/edit.php';
            }
        } else {
            // Truyền lỗi và dữ liệu xuống view
            $row = Nhansu::find($id);
            require_once 'views/nhansus/edit.php';
        }
    }


    // Xoa
    public function destroy(){
        $id = $_GET['id'];
        Nhansu::delete($id);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=nhansu&action=index&delete_success=1");
    }
    // Xem chi tiet
    public function show(){
        $id = $_GET['id'];
        $row = Nhansu::find($id);

        // Truyen xuong view
        require_once 'views/nhansus/show.php';
    }
}