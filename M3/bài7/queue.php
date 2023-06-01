<?php
class MyQueue {
    private $elements = [];
    private $limit;

    public function __construct($limit){
        $this->limit = $limit;
    }

    // them phan tu vao hang doi
    public function enqueue($item){
        array_push($this->elements,$item);
    }

    // xoas phan tu tu hang doi
    public function dequeue(){
        return array_shift($this->elements);
    }

     // xem phan tu dau tien cua ngan xep
    public function peek(){
        return current($this->elements);
    }

    // kiem tra rong
    public function isEmpty(){
        if(count($this->elements)==0){
            return true;
        }
        return false;
    }
    

    // kiem tra day
    public function isFull(){
        if(count($this->elements) == $this->limit){
            return true;
        }
        return false;
    }
}
// KHoi tao doi tuong
$queue = new MyQueue(4);
// Them vao lan luot Huyen, Nho, Phong, Tam
$queue->enqueue('Huyen');
$queue->enqueue('Nho');
$queue->enqueue('Phong');
$queue->enqueue('Tam');
// Lay ra phan tu tren cung ma ko xoa
echo $queue->peek();
// Lay ra phan tu tren cung va xoa di
$queue->dequeue();
echo "<pre>";
print_r($queue);
echo "</pre>";