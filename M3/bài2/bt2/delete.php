<?php
include 'employee.php';
include 'employeemanager.php';

use Manager\employee;
use Manager\employeemanager;

// Lấy id của nhân viên cần xóa
$id = $_GET['id'];

// Lấy danh sách nhân viên hiện tại
$employees = EmployeeManager::getAllEmployees();

// Xóa nhân viên có id trùng với tham số truyền vào
foreach ($employees as $key => $employee) {
    if ($employee->getId() == $id) {
        unset($employees[$key]);
    }
}

// Cập nhật danh sách nhân viên trong lớp EmployeeManager
EmployeeManager::setAllEmployees($employees);

// Chuyển hướng về trang danh sách nhân viên
header('Location: qlns.php');
exit();
?>
