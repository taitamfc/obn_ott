    <?php
    require_once 'models/Customer.php';
    require_once 'controllers/Controller.php';

    class CustomerController extends Controller {
        // Hien thi danh sach records => table
        public function index(){
        
            $return = Customer::paginate();
            
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
            require_once 'views/customers/index.php';
        
        }
        // Hien thi form them moi
        public function create(){
            require_once 'views/customers/create.php';
        }
        public function store() {
            $errors = array();
            $data = $_POST;
        
            // Validate dữ liệu
            $customer_name = isset($data['customer_name']) ? $data['customer_name'] : '';
            if (empty($customer_name)) {
                $errors['customer_name'] = 'Bạn chưa nhập tên khách hàng';
            }
        
            $email = isset($data['email']) ? $data['email'] : '';
            if (empty($email)) {
                $errors['email'] = 'Bạn chưa nhập email';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ';
            }
        
            $address = isset($data['address']) ? $data['address'] : '';
            if (empty($address)) {
                $errors['address'] = 'Bạn chưa nhập địa chỉ';
            }
        
            $sdt = isset($data['sdt']) ? $data['sdt'] : '';
            if (empty($sdt)) {
                $errors['sdt'] = 'Bạn chưa nhập số điện thoại';
            } elseif (!preg_match('/^\d{10,11}$/', $sdt)) {
                $errors['sdt'] = 'Số điện thoại không hợp lệ';
            }
        
            // Kiểm tra và lưu dữ liệu
            if (count($errors) == 0) {
                if (Customer::store($data)) {
                    // Chuyển hướng về trang danh sách
                    $this->redirect("index.php?controller=customer&action=index&success=1");
                } else {
                    // Truyền lỗi xuống view
                    require_once 'views/customers/create.php';
                }
            } else {
                // Truyền lỗi và dữ liệu xuống view
                require_once 'views/customers/create.php';
            }
        }
        
        
        
        // Hien thi form chinh sua
        public function edit(){
            $id = $_GET['id'];
            $row = Customer::find($id);
            // Truyen xuong view
            require_once 'views/customers/edit.php';
        }
    
        // Xu ly chinh sua
     // Xu ly chinh sua
public function update()
{
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $data = $_POST;

    $errors = array();
    
    // Validate dữ liệu tương tự như trong hàm store()
    $customer_name = isset($data['customer_name']) ? $data['customer_name'] : '';
    if (empty($customer_name)) {
        $errors['customer_name'] = 'Bạn chưa nhập tên khách hàng';
    }

    $email = isset($data['email']) ? $data['email'] : '';
    if (empty($email)) {
        $errors['email'] = 'Bạn chưa nhập email';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email không hợp lệ';
    }

    $address = isset($data['address']) ? $data['address'] : '';
    if (empty($address)) {
        $errors['address'] = 'Bạn chưa nhập địa chỉ';
    }

    $sdt = isset($data['sdt']) ? $data['sdt'] : '';
    if (empty($sdt)) {
        $errors['sdt'] = 'Bạn chưa nhập số điện thoại';
    } elseif (!preg_match('/^\d{10,11}$/', $sdt)) {
        $errors['sdt'] = 'Số điện thoại không hợp lệ';
    }

    // Kiểm tra và cập nhật dữ liệu
    if (count($errors) == 0) {
        if (Customer::update($id, $data)) {
            // Chuyển hướng về trang danh sách
            $this->redirect("index.php?controller=customer&action=index&success=2");
        } else {
            // Truyền lỗi xử lí cập nhật xuống view
            $row = Customer::find($id);
            require_once 'views/customers/edit.php';
        }
    } else {
        // Truyền lỗi và dữ liệu xuống view
        $row = Customer::find($id);
        require_once 'views/customers/edit.php';
    }
}


        // Xoa
        public function destroy(){
            $id = $_GET['id'];
            Customer::delete($id);
            // Chuyen huong ve trang danh sach
            $this->redirect("index.php?controller=customer&action=index&delete_success=1");
        }
        // Xem chi tiet
        public function show(){
            $id = $_GET['id'];
            $row = Customer::find($id);

            // Truyen xuong view
            require_once 'views/customers/show.php';
        }
    }