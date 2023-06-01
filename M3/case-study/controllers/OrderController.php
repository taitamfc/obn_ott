<?php
require_once 'models/Order.php';
require_once 'models/Customer.php';
require_once 'models/Orderdetail.php';
require_once 'models/Product.php';
require_once 'controllers/Controller.php';

class OrderController extends Controller {
    // Hien thi danh sach records => table
    public function index()
    {
        $return = Order::paginate();   
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
        require_once 'views/orders/index.php';
    }


  

    // Hien thi form them moi
    public function create(){
        $customers = Customer::all();
        $products = Product::all();

        require_once 'views/orders/create.php';
    }
    // xu ly them moi 
    public function store() {
        $errors = array();
        $data = $_POST;
    
        // Lấy danh sách khách hàng
    
        // Validate dữ liệu
      
        
        $order_date = isset($data['order_date']) ? $data['order_date'] : '';
        if (empty($order_date)) {
            $errors['order_date'] = 'Bạn chưa nhập ngày';
        }
    
        // Kiểm tra và lưu dữ liệu
        if (count($errors) == 0) {
            // Luu vao bang orders
            /*
            customer_id => _POST
            order_date  => _POST
            */
            $orderData = array(
                'customer_id' => $data['customer_id'],
                'order_date' => $data['order_date']
            );
            $order_id = Order::store($orderData);
          
            if ($order_id) {
                // Lưu vào bảng orderdetails
                $orderDetailData = array(
                    'order_id' => $order_id,
                    'product_id' => $data['product_id'],
                    'quantity' => $data['quantity'],
                    'price' => $data['price']
                );
                Orderdetail::store($orderDetailData);

                // Chuyển hướng về trang danh sách
                $this->redirect("index.php?controller=order&action=index&success=1");
            } else {
                // Truyền lỗi xuống view
                require_once 'views/orders/create.php';
            }
        }
    }

    // Hien thi form chinh sua
    public function edit(){
        $id = $_GET['id'];
        $customers = Customer::all();
       $row = Order::find($id);
        // Truyen xuong view
        require_once 'views/orders/edit.php';
    }
 
     // Xu ly chinh sua
    public function update(){
        $id = $_GET['id'];
        $data = $_POST;
        if (Order::update($id, $data)) {
            // Chuyen huong ve trang danh sach
            $redirectUrl = "index.php?controller=order&action=index&success=2";
            echo "<script>window.location.href='$redirectUrl';</script>";
            exit();
        } else {
            // Truyen loi xuong view
            $row = Order::find($id);
            require_once 'views/orders/edit.php';
        }
    }

    // Xoa
    public function destroy(){
        $id = $_GET['id'];
        Order::delete($id);
        // Chuyen huong ve trang danh sach
        $this->redirect("index.php?controller=order&action=index&delete_success=1");
    }
    // Xem chi tiet
    public function show(){
        $id = $_GET['id'];
        $items = Orderdetail::find($id);
        // Truyen xuong view
        require_once 'views/orders/show.php';
    }
}