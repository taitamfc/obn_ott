<?php


class Node
{
    public $data;
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    function readNode()
    {
        return $this->data;
    }
}




class LinkList
{
    private $firstNode;
    private $lastNode;
    private $count;

    function __construct()
    {
        $this->firstNode = null;
        $this->lastNode = null;
        $this->count = 0;
    }

//Tạo phương thức thêm node vào đầu Danh sách
    public function insertFirst($data): void
    {
        $node = new Node($data);
        $node->next = $this->firstNode;
        $this->firstNode = $node;

        if (is_null($this->lastNode)){
            $this->lastNode = $node;
        }

        $this->count++;
    }
//Tạo phương thức thêm node vào phía sau Danh sách
    public function insertLast($data): void
{
    if (!is_null($this->firstNode)) {
        $node = new Node($data);
        $this->lastNode->next = $node;
        $node->next = null;
        $this->lastNode = $node;
        $this->count++;
    } else {
        $this->insertFirst($data);
    }
}

//Tạo phương thức lấy ra số lượng node
public function totalNodes(): int
{
    return $this->count;
}

//tạo phương thức đọc ra Danh sách
public function readList(): array
{
    $listData = [];
    $current = $this->firstNode;

    while (!is_null($current)) {
        array_push($listData, $current->readNode());
        $current = $current->next;
    }
    return $listData;
}

// xóa phần tử theo chỉ số 
public function deleteAtPosition($position)
{
    if ($position <= 0 || $position > $this->count) {
        echo "Vị trí không hợp lệ";
        return;
    }

    if ($position === 1) {
        $this->deleteFirst();
        return;
    }

    $current = $this->firstNode;
    $previous = null;

    for ($i = 1; $i < $position; $i++) {
        $previous = $current;
        $current = $current->next;
    }

    $previous->next = $current->next;
    $this->count--;
}

// thêm pt theo chỉ số
public function insertAtPosition($data, $position)
{
    if ($position <=0 || $position > $this->count + 1) {
        echo "Vị trí không hợp lệ";
        return;
    }

    if ($position === 1) {
        $this->insertFirst($data);
        return;
    }

    $node = new Node($data);
    $current = $this->firstNode;
    $previous = null;
    $count = 1;

    while ($count < $position) {
        $previous = $current;
        $current = $current->next;
        $count++;
    }

    $previous->next = $node;
    $node->next = $current;
    $this->count++;
}


}
$linkedList = new LinkList();
//thêm node vào đầu
$linkedList->insertFirst(11);
$linkedList->insertFirst(22);
//thêm node vào cuối
$linkedList->insertLast(33);
$linkedList->insertLast(44);

// xóa phần tử theo chỉ số 
// $linkedList->deleteAtPosition(2);
$linkedList->insertAtPosition(55, 1);

// tổng pt
$totalNodes = $linkedList->totalNodes();
echo 'số lượng node '. $totalNodes;

//hiển thị danh sách
$linkData = $linkedList->readList();
echo "<br>";
echo implode('-', $linkData);

echo '<br>';
var_dump($linkData);

