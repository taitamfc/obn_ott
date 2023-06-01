<?php
require_once 'models/Lop.php';
class LopController {
    // Hien thi danh sach records => table
    public function index(){
        $return = Lop::paginate();

        $items = $return['rows'];
        $total_pages = $return['total_pages'];
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Truyen data xuong view
        require_once 'views/lops/index.php';
       
    }
    // Hien thi form them moi
    public function create(){
        require_once 'views/lops/create.php';
    }
    // Xu ly them moi
    public function store() {
        $error = array();
        // Goi model
        $data = $_POST;
        if (Lop::store($data, $error)) {
            // Chuyen huong ve trang danh sach
            header("Location: index.php?controller=lop&action=index");
        } else {
            // Truyen loi xuong view
            require_once 'views/lops/create.php';
        }
    }
    
    // Hien thi form chinh sua
    public function edit(){
        $id = $_GET['id'];
        $row = Lop::find($id);
        // Truyen xuong view
        require_once 'views/lops/edit.php';
    }
        // Xu ly chinh sua
        public function update(){
            $id = $_GET['id'];
            $data = $_POST;
            $error = array();
            
            if (Lop::update($id, $data, $error)) {
                // Chuyen huong ve trang danh sach
                header("Location: index.php?controller=lop&action=index");
            } else {
                // Truyen loi xuong view
                $row = Lop::find($id);
                require_once 'views/lops/edit.php';
            }
        }
    // Xoa
    public function destroy(){
        $id = $_GET['id'];
        Lop::delete($id);
        // Chuyen huong ve trang danh sach
        header("Location: index.php?controller=lop&action=index");
    }
    // Xem chi tiet
    public function show(){
        $id = $_GET['id'];
        $row = Lop::find($id);

        // Truyen xuong view
        require_once 'views/lops/show.php';
    }
}