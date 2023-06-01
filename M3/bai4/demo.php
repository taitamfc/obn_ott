<?php
 abstract class Model{
protected $msg;
const _DB_INFO = ["localhost","root","unicode"];

    // pt bình thường
 public function getMessage(){
    return 'this is my message';
 }
 // pt trừu tượng(hiển thị) 
 abstract public function show();

 // pt trừu tượng(thêm) 
 abstract public function add();

 // pt trừu tượng(cập nhật) 
 abstract public function update();

 // pt trừu tượng(xóa) 
 abstract public function delete();

}
class ProductModel extends Model{
    public function show(){

    }
    public function add(){

    }
    public function update(){

    }
    public function delete(){}
}
$productModel = new productModel();
var_dump($productModel->show());