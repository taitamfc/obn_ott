<?php
require_once 'models/Student.php';
require_once 'models/Lop.php';
require_once 'models/Khoa.php';
require_once 'controllers/Controller.php';

class StudentController extends Controller {
    // Hiển thị danh sách records => table
    public function index(){
        $return = Student::paginate();
        
        $items = $return['rows'];
        $total_pages = $return['total_pages'];
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // Truyền data xuống view
        require_once 'views/students/index.php';
    }

    // Hiển thị form thêm mới
    public function create(){   
        $classes = Lop::all();
        $khoas = Khoa::all();
        require_once 'views/students/create.php';
    }


         // Xu ly them moi
    public function store() {
        $error = array();
        $classes = Lop::all();
        $khoas = Khoa::all();
        // Goi model
        $data = $_POST;
        if (Student::store($data, $error)) {
            // Chuyen huong ve trang danh sach
            header("Location: index.php?controller=student&action=index");
        } else {
            // Truyen loi xuong view
            require_once 'views/students/create.php';
        }
    }
    

    // Hiển thị form chỉnh sửa
    public function edit(){
        $id = $_GET['id'];
        $row = Student::find($id);
        $classes = Lop::all();
        $khoas = Khoa::all();

        // Truyền xuống view
        require_once 'views/students/edit.php';
    }

    // Xử lý chỉnh sửa
    public function update(){
        $id = $_GET['id'];
            // Dữ liệu hợp lệ, cập nhật dữ liệu
            Student::update($id, $_POST);
            // Chuyển hướng về trang danh sách
            header("Location:index.php?controller=student&action=index");
        }
    

    // Xóa
    public function destroy(){
        $id = $_GET['id'];
        Student::delete($id);
        // Chuyển hướng về trang danh sách
        header("Location: index.php?controller=student&action=index");
    }

    // Xem chi tiết
    public function show(){
        $id = $_GET['id'];
        $row = Student::find($id);

        // Truyền xuống view
        require_once 'views/students/show.php';
    }
}