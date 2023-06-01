<?php
function reverseArray($array) {
    $stack = new SplStack(); // Khởi tạo một Stack rỗng

    // Đưa từng phần tử của mảng vào Stack
    foreach ($array as $element) {
        $stack->push($element);
    }

    // Lấy từng phần tử từ Stack và đưa vào mảng ban đầu
    for ($i = 0; $i < count($array); $i++) {
        $array[$i] = $stack->pop();
    }

    return $array;
}


// Mảng ban đầu
$array = [1, 2, 3, 4, 5];

// Đảo ngược mảng bằng cách sử dụng Stack
$reversedArray = reverseArray($array);

// In mảng đã đảo ngược
echo "Mảng đã đảo ngược: " . implode(", ", $reversedArray);