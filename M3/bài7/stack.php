<?php
interface Stack{
    public function push($item);
    public function pop();
    public function top();
    public function isEmpty();
}

class Book implements Stack{
    public $stack;
    public $limit;
    public function __construct($limit){
        $this->stack = [];
        $this->limit = $limit;
    }
           // them
    public function push($item){
        if (count($this->stack)>$this->limit){
            throw new Exception('stack full');
        }else{
            array_push($this->stack,$item);
        }
    }
// Xoá một phần tử từ ngăn xếp
    public function pop(){
        if($this->isEmpty()){
            throw new Exception('stack empty');
        }else{
            return array_pop($this->stack);
        }
    }
// lay khong xoa
    public function top(){
        return end($this->stack);
    }
    
//Kiểm tra rỗng
    public function isEmpty(){
      return empty($this->stack);
    }
// lay ra so luong 
    public function size(){
        return count($this->stack);
    }
    // kiem tra day pt hay chua
    public function isFull(){
        return $this->size() == $this->limit;
    }
}

$books = new Book(4);

$books->push('hiune');
$books->push('phi');
$books->push('long');
echo $books->pop();
echo $books->top();
echo $books->size();


echo '<pre>';
print_r($books);
echo '</pre>';