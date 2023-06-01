<?php

class User {
  protected $name;
  protected $email;
  public $role;

  public function getInfo() {
    return "Tên: " . $this->name . ", Email: " . $this->email . ", Role: " . $this->role;
  }

  public function isAdmin() {
    if ($this->role == 1) {
      return "Là admin";
    } else {
      return "Là người dùng bình thường";
    }
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function setRole($role) {
    $this->role = $role;
  }
}

$user = new User();
$user->setName("Nguyễn Văn A");
$user->setEmail("nguyenvana@gmail.com");
$user->setRole(2);
echo $user->getInfo() . '<br/>';// Tên: Nguyễn Văn A, Email: nguyenvana@gmail.com, Role: 2
echo $user->isAdmin(); // Là người dùng bình thường
?>