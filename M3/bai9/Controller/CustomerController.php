<?php

namespace Controller;

use Model\Customer;
use Model\CustomerDB;
use Model\DBConnection;

class CustomerController
{

    public CustomerDB $customerDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=quanlikhachhang1", "root", "");
        $this->customerDB = new CustomerDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            include 'view/add.php';
        } else {

            // Validate dữ liệu
            $errors = [];
            $fields = ['name', 'email', 'address'];

            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $errors[$field] = 'Không được để trống';
                }
            }

            if (empty($errors)) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $customer = new Customer($name, $email, $address);
                $this->customerDB->create($customer);
                header('Location: index.php');
            } else {
                include 'view/add.php';
            }
        }
    }
    public function index()
    {
    $customers = $this->customerDB->getAll();
    include 'view/list.php';
    }
    public function delete()
    {
    $id = $_GET['id'];
    $this->customerDB->delete($id);
    header('Location: index.php');
    }
    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $customer = $this->customerDB->get($id);
            include 'view/edit.php';
        } else {

            // Validate dữ liệu
            $errors = [];
            $fields = ['name', 'email', 'address'];

            foreach ($fields as $field) {
                if (empty($_POST[$field])) {
                    $errors[$field] = 'Không được để trống';
                }
            }

            $id = $_POST['id'];
            if (empty($errors)) {
                $customer = new Customer($_POST['name'], $_POST['email'], $_POST['address']);
                $this->customerDB->update($id, $customer);
                header('Location: index.php');
            } else {
                $customer = $this->customerDB->get($id);
                include 'view/edit.php';
            }
        }
    }
}