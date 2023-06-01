<?php
// Bước 1: Khai báo lớp Node
class Node {
    public $value;
    public $next;

    public function __construct($value) {
        $this->value = $value;
        $this->next = null;
    }
    class Queue {
        private $front;
        private $back;
    
        public function __construct() {
            $this->front = null;
            $this->back = null;
        }
    
        // Bước 3: Khai báo hàm isEmpty()
        public function isEmpty() {
            return ($this->front === null);
        }
    
        // Bước 4: Khai báo hàm enqueue()
        public function enqueue($value) {
            $newNode = new Node($value);
    
            if ($this->isEmpty()) {
                $this->front = $newNode;
                $this->back = $newNode;
            } else {
                $this->back->next = $newNode;
                $this->back = $newNode;
            }
        }
    
        // Bước 5: Khai báo hàm dequeue()
        public function dequeue() {
            if ($this->isEmpty()) {
                return null;
            }
    
            $removedValue = $this->front->value;
            $this->front = $this->front->next;
    
            if ($this->front === null) {
                $this->back = null;
            }
    
            return $removedValue;
        }
    }
}
