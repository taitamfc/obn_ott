<?php
include 'employee.php';
include 'employeemanager.php';

use Manager\employee;
use Manager\employeemanager;
// Tạo đối tượng Employee mới
  $employee1 = new Employee(1,"John", "Doe", "1985-05-10", "123 Main St, Anytown USA", "Manager");
  $employee2 = new Employee(2,"Trần Đình", "Hiếu", "2002-01-19", "123 Main St, Anytown USA", "Manager");
  $employee3 = new Employee(3,"ádas", "ádasd", "1985-05-10", "123 Main St, Anytown USA", "Manager");
  // Thêm nhân viên vào danh sách
  EmployeeManager::addEmployee($employee1);
  EmployeeManager::addEmployee($employee1);
  EmployeeManager::addEmployee($employee1);
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Quản lí nhân sự</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

    <div class="container">
        <h2>Quản lí nhân sự</h2>
        <p>Danh sách nhân sự:</p>            
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Ngày sinh</th>
                    <th>Địa chỉ</th>
                    <th>Vị trí công việc</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Lặp qua danh sách nhân sự và hiển thị trên bảng
                foreach (EmployeeManager::getAllEmployees() as $employee) {
                    echo "<tr>";
                    echo "<td>" . $employee->getLastName() . "</td>";
                    echo "<td>" . $employee->getFirstName() . "</td>";
                    echo "<td>" . $employee->getDateOfBirth() . "</td>";
                    echo "<td>" . $employee->getAddress() . "</td>";
                    echo "<td>" . $employee->getPosition() . "</td>";
                    echo "<td><a href='view.php?id=" . $employee->getId() . "'>Xem</a> | 
                              <a href='edit.php?id=" . $employee->getId() . "'>Sửa</a> | 
                              <a href='delete.php?id=" . $employee->getId() . "' onclick='return confirm(\"Bạn có chắc muốn xoá?\")'>Xoá</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add.php" class="btn btn-success">Thêm mới nhân sự</a>
    </div>

    </body>
    </html>
