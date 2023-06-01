<?php
require_once 'models/Categorie.php';
require_once 'controllers/Controller.php';

class CategorieController extends Controller {
    // Hien thi danh sach records => table
    public function index(){
    $return = Categorie::paginate();   
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
    require_once 'views/categories/index.php';
   
}
    // Hien thi form them moi
    public function create(){
        require_once 'views/categories/create.php';
    }
    public function store() {
        $error = array();
        // Goi model
        $data = $_POST;
        if (Categorie::store($data, $error)) {
            // Chuyen huong ve trang danh sach
            $this->redirect("index.php?controller=categorie&action=index&success=1");
        } else {
            // Truyen loi xuong view
            require_once 'views/categories/create.php';
        }
    }
    
    
    // Hien thi form chinh sua
    public function edit(){
        $id = $_GET['id'];
        $row = Categorie::find($id);
        // Truyen xuong view
        require_once 'views/categories/edit.php';
    }
 
     // Xu ly chinh sua
     public function update(){
        $id = $_GET['id'];
        $data = $_POST;
        $error = array();
        
        if (Categorie::update($id, $data, $error)) {
            // Chuyen huong ve trang danh sach
            $redirectUrl = "index.php?controller=categorie&action=index&success=2";
            echo "<script>window.location.href='$redirectUrl';</script>";
            exit();
        } else {
            // Truyen loi xuong view
            $row = Categorie::find($id);
            require_once 'views/categories/edit.php';
        }
    }




    // Xoa
    public function destroy(){
        $id = $_GET['id'];
        Categorie::delete($id);
        // Chuyen huong ve trang danh sach
        $this->redirect("index.php?controller=categorie&action=index&delete_success=1");
    }
    // Xem chi tiet
    public function show(){
        $id = $_GET['id'];
        $row = Categorie::find($id);

        // Truyen xuong view
        require_once 'views/categories/show.php';
    }
}