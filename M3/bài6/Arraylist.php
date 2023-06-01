<?php
class Araylist{
    public array $container = [];
    public int $limit;

    public function __construct($limit){
    $this->limit = $limit; 
    } 
    // them moi 1 pt 
    public function add($item){
        if(!$this->isFull()){
            array_push($this->container,$item); 
        }else {
            echo 'Danh sách đã đầy';
        }
    }

    //chen phan tu vao mang dua vao vi tri
    public function addAtPos($item,$index){
        if( !$this->isFull() ){
            array_splice($this->container,$index,0,$item);
        }else {
            echo 'Danh sách đã đầy';
        }
    }
    // xoa
    public function remove($index){

        if( isset( $this->container[$index] ) ){
            array_splice($this->container,$index,1);
        
        }else{
            echo 'không tồn tại phần tử tại vị trí ' .$index;
        }
    }
    // cập nhật giá trị trong mãng theo chỉ số
    public function update($index,$item){
        if( isset( $this->container[$index] ) ){
            $this->container[$index] = $item;

        }else{
            echo 'không tồn tại phần tử tại vị trí ' .$index;
        }
    }
    //lay ra sl
    public function size(){
        return count($this->container);
    }
    // kiem tra day pt hay chua
    public function isFull(){
        return $this->size() == $this->limit;
    }
    // lay pt theo chi so
    public function getByindex($index){
        if( isset( $this->container[$index] ) ){
            return $this->container[$index];
        }else{
            echo 'không tồn tại phần tử tại vị trí ' .$index;
        }
}
// tìm kiếm phần tử trong mãng
public function find($item){
    $index = array_search($item, $this->container);
    if($index !== false){
        return $index;
    }else{
        return -1; // Phần tử không tồn tại trong mảng
    }
}
// kiểm tra có rổng hay không 
public function isEmpty(){
    return empty($this->container);
}





}
$araylist = new Araylist(5);

$araylist->add('Hiếu');
$araylist->add('Phi');
$araylist->add('Long');
$araylist->add('Khương');
$araylist->update(3,'Cường');


$araylist->addAtPos('Tâm',2);
$araylist->remove(2);
echo '<pre>';
var_dump($araylist->container);
echo '</pre>';

// echo $araylist->add();

// thêm pt vào mãng
// $araylist->add(5);
// $araylist->add(6);
// $araylist->add(7);
// $araylist->add(7);



// // xóa phần tử khỏi mãng
//  $araylist->remove(0);
// // Điều chỉnh chỉ số của mảng
// $araylist->container = array_values($araylist->container);
// var_dump($araylist->container);
// echo '<br>';

// // lấy phần tử theo chỉ số 
$item = $araylist->getByindex(1);
echo $item;

echo '<pre>';
print_r($araylist);
echo '</pre>';

// echo '<br>';

// // lấy ra số lượng phần tử trong mãng
// $size = $araylist->size();
// echo $size;

// echo '<br>';

// // cập nhật giá trị trong mãng theo chỉ số
// $araylist->update(2, 8);
// var_dump($araylist->container);

// echo '<br>';

// // tìm kiếm phần tử trong mãng
// $foundIndex = $araylist->find(0);
// if ($foundIndex !== -1) {
//     echo 'Phần tử tìm thấy tại vị trí ' . $foundIndex;
// } else {
//     echo 'Phần tử không tồn tại trong mảng';
// }

// echo '<br>';
// $isListEmpty = $araylist->isEmpty();
// echo 'Mảng rỗng: ' . ($isListEmpty ? 'Có' : 'Không');

// // // kiểm tra mảng đã đầy hay chưa
// $isFull = $araylist->isFull();
// echo 'Mảng đã đầy: ' . ($isFull ? 'Có' : 'Không');



// $araylist->insert(2, 9);
// var_dump($araylist->container);
// echo '<br>';

// $araylist->addAtPos(9, 2);
// var_dump($araylist->container);
