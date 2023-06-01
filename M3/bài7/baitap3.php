<?php   
class Patient {
    public $name;
    public $code;

    public function __construct($name, $code) {
        $this->name = $name;
        $this->code = $code;
    }

}

class MyQueue {
    private $items = [];
    private $limit;

    public function __construct($limit) {
        $this->limit = $limit;
    }

    public function enqueue($item){
        $insertIndex = 0;
        foreach ($this->items as $index => $existingItem) {
            if ($item->code > $existingItem->code) {
                $insertIndex = $index + 1;
            }
        }

        array_splice($this->items, $insertIndex, 0, [$item]);

        if (count($this->items) > $this->limit) {
            array_pop($this->items);
        }
    }

    public function dequeue(){
        return array_shift($this->items);
    }

    public function isEmpty(){
        return count($this->items) == 0;
    }

    public function __toString() {
        return implode(', ', array_map(function($item) {
            return $item->name;
        }, $this->items));
    }
}

// Mô phỏng kịch bản khám bệnh

$myQueue = new MyQueue(5);

$myQueue->enqueue(new Patient('Smith', 5));
$myQueue->enqueue(new Patient('Jones', 4));
$myQueue->enqueue(new Patient('Fehrenbach', 6));
$myQueue->enqueue(new Patient('Brown', 1));
$myQueue->enqueue(new Patient('Ingram', 1));

echo "Danh sách bệnh nhân: " . $myQueue . '<br>';

$nextPatient = $myQueue->dequeue();

if ($nextPatient != null) {
    echo "Đã khám bệnh cho bệnh nhân: " . $nextPatient->name . '<br>';
}

echo "Danh sách bệnh nhân còn lại: " . $myQueue . '<br>';

$nextPatient = $myQueue->dequeue();

if ($nextPatient != null) {
    echo "Đã khám bệnh cho bệnh nhân: " . $nextPatient->name . '<br>';
}

echo "Danh sách bệnh nhân còn lại: " . $myQueue . '<br>';
echo "<pre>";
print_r($myQueue);
echo "</pre>";
