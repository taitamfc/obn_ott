<?php
function isPalindrome($string) {
    $string = strtolower($string); // Chuyển đổi chuỗi về chữ thường
    $string = str_replace(' ', '', $string); // Loại bỏ khoảng trắng trong chuỗi

    $length = strlen($string);
    $stack = new SplStack();
    $queue = new SplQueue();

    // Đưa ký tự vào cả Stack và Queue
    for ($i = 0; $i < $length; $i++) {
        $char = $string[$i];
        $stack->push($char);
        $queue->enqueue($char);
    }

    // So sánh các ký tự lấy từ Stack và Queue
    while (!$stack->isEmpty() && !$queue->isEmpty()) {
        $stackChar = $stack->pop();
        $queueChar = $queue->dequeue();

        if ($stackChar !== $queueChar) {
            return false; // Không đối xứng
        }
    }

    return true; // Đối xứng
}

// Chuỗi cần kiểm tra
$string = "able was I ere I saw elba";

// Kiểm tra chuỗi có đối xứng hay không
if (isPalindrome($string)) {
    echo "Chuỗi là đối xứng.";
} else {
    echo "Chuỗi không đối xứng.";
}
