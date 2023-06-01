<?php

class Node {
    public $value;
    public $left;
    public $right;

    public function __construct($value) {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BinaryTree {
    private $root;

    public function __construct() {
        $this->root = null;
    }

    // Phương thức kiểm tra cây có rỗng hay không
    public function isEmpty() {
        return $this->root === null;
    }

    // Phương thức thêm một phần tử vào cây
    public function insert($value) {
        $this->root = $this->insertNode($this->root, $value);
    }

    private function insertNode($root, $value) {
        if ($root === null) {
            // Nếu cây rỗng, tạo một nút mới với giá trị được chèn
            return new Node($value);
        }

        if ($value < $root->value) {
            // Nếu giá trị cần chèn nhỏ hơn giá trị của nút hiện tại, tiếp tục chèn vào cây con trái
            $root->left = $this->insertNode($root->left, $value);
        } else if ($value > $root->value) {
            // Nếu giá trị cần chèn lớn hơn giá trị của nút hiện tại, tiếp tục chèn vào cây con phải
            $root->right = $this->insertNode($root->right, $value);
        }

        return $root;
    }

    // Phương thức xoá một phần tử khỏi cây
    public function delete($value) {
        $this->root = $this->deleteNode($this->root, $value);
    }

    private function deleteNode($root, $value) {
        if ($root === null) {
            // Trường hợp cơ bản: cây rỗng hoặc đã duyệt hết cây mà không tìm thấy giá trị cần xoá
            return $root;
        }

        if ($value < $root->value) {
            // Giá trị cần xoá nhỏ hơn giá trị của nút hiện tại, tiếp tục tìm kiếm và xoá ở cây con trái
            $root->left = $this->deleteNode($root->left, $value);
        } else if ($value > $root->value) {
            // Giá trị cần xoá lớn hơn giá trị của nút hiện tại, tiếp tục tìm kiếm và xoá ở cây con phải
            $root->right = $this->deleteNode($root->right, $value);
        } else {
          
            // Trường hợp đã tìm thấy giá trị cần xoá

            // Trường hợp 1: Nút có ít nhất một cây con bị thiếu
            if ($root->left === null) {
                return $root->right;
            } else if ($root->right === null) {
                return $root->left;
            }

            // Trường hợp 2: Nút có cả hai cây con
            // Tìm phần tử nhỏ nhất trong cây con phải (cây con nhỏ hơn)
            $minValue = $this->findMinValue($root->right);
            // Gán giá trị nhỏ nhất vào nút hiện tại
            $root->value = $minValue;
            // Xoá nút có giá trị nhỏ nhất từ cây con phải
            $root->right = $this->deleteNode($root->right, $minValue);
        }

        return $root;
    }

    // Phương thức tìm giá trị nhỏ nhất trong một cây
    private function findMinValue($root) {
        $minValue = $root->value;
        while ($root->left !== null) {
            $minValue = $root->left->value;
            $root = $root->left;
        }
        return $minValue;
    }

    // Phương thức lấy về một phần tử từ cây
    public function retrieve($value) {
        return $this->retrieveNode($this->root, $value);
    }

    private function retrieveNode($root, $value) {
        if ($root === null) {
            // Trường hợp cơ bản: cây rỗng hoặc đã duyệt hết cây mà không tìm thấy giá trị cần lấy
            return null;
        }

        if ($value === $root->value) {
            // Trường hợp đã tìm thấy giá trị cần lấy
            return $root;
        } else if ($value < $root->value) {
            // Giá trị cần lấy nhỏ hơn giá trị của nút hiện tại, tiếp tục tìm kiếm ở cây con trái
            return $this->retrieveNode($root->left, $value);
        } else {
            // Giá trị cần lấy lớn hơn giá trị của nút hiện tại, tiếp tục tìm kiếm ở cây con phải
            return $this->retrieveNode($root->right, $value);
        }
    }
}
// Tạo một đối tượng BinaryTree
$tree = new BinaryTree();


// Thêm các phần tử vào cây
$tree->insert(5);
$tree->insert(3);
$tree->insert(7);
$tree->insert(2);
$tree->insert(4);
$tree->insert(6);
$tree->insert(8);

// Xoá một phần tử khỏi cây
$tree->delete(4);

// Kiểm tra cây có rỗng hay không
$isTreeEmpty = $tree->isEmpty();

// Lấy về một phần tử từ cây
$node = $tree->retrieve(7);
if ($node !== null) {
    $retrievedValue = $node->value;
} else {
    // Giá trị không tồn tại trong cây
    $retrievedValue = "Not found";
}


echo '<pre>';
print_r($tree );
echo '</pre>';

