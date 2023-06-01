<?php
function decimalToBinary($decimal) {
    $stack = new SplStack();

    // Chuyển đổi số từ thập phân sang nhị phân
    while ($decimal > 0) {
        $remainder = $decimal % 2; // Lấy phần dư của phép chia cho 2
        $stack->push($remainder); // Đưa phần dư vào Stack
        $decimal = (int)($decimal / 2); // Cập nhật giá trị thập phân
    }

    // Đọc từ Stack và nối kết quả lại thành chuỗi nhị phân
    $binary = '';
    while (!$stack->isEmpty()) {
        $binary .= $stack->pop();
    }

    return $binary;
}

// Số thập phân ban đầu
$decimal = 111;

// Chuyển đổi từ hệ thập phân sang hệ nhị phân
$binary = decimalToBinary($decimal);

// In kết quả chuyển đổi
echo "Số nhị phân: " . $binary;
