<?php
require_once 'models/Khoa.php';
require_once 'controllers/Controller.php';

class KhoaController extends Controller {
    // Hien thi danh sach records => table
    public function index(){
        // $items = Khoa::all();
        $return = Khoa::paginate();

        $items = $return['rows'];
        $total_pages = $return['total_pages'];
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Truyen data xuong view
        require_once 'views/khoas/index.php';
       
    }
    // Hien thi form them moi
    public function create(){
        require_once 'views/khoas/create.php';
    }
    public function store() {
        $error = array();
        // Goi model
        $data = $_POST;
        if (Khoa::store($data, $error)) {
            // Chuyen huong ve trang danh sach
            $this->redirect("index.php?controller=khoa&action=index");
        } else {
            // Truyen loi xuong view
            require_once 'views/khoas/create.php';
        }
    }
    
    
    // Hien thi form chinh sua
    public function edit(){
        $id = $_GET['id'];
        $row = Khoa::find($id);
        // Truyen xuong view
        require_once 'views/khoas/edit.php';
    }
 
     // Xu ly chinh sua
     public function update(){
        $id = $_GET['id'];
        $data = $_POST;
        $error = array();
        
        if (Khoa::update($id, $data, $error)) {
            // Chuyen huong ve trang danh sach
            header("Location: index.php?controller=khoa&action=index");
        } else {
            // Truyen loi xuong view
            $row = Khoa::find($id);
            require_once 'views/khoas/edit.php';
        }
    }

    // Xoa
    public function destroy(){
        $id = $_GET['id'];
        Khoa::delete($id);
        // Chuyen huong ve trang danh sach
        $this->redirect("index.php?controller=khoa&action=index");
    }
    // Xem chi tiet
    public function show(){
        $id = $_GET['id'];
        $row = Khoa::find($id);

        // Truyen xuong view
        require_once 'views/khoas/show.php';
    }
}