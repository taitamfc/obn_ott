import React, { useState } from 'react';

function Counter() {
  // Sử dụng State Hook để tạo một biến state với giá trị ban đầu là 0
  const [count, setCount] = useState(0);

  // Tạo hàm tăng giá trị count lên 1
  const handleIncrement = () => {
    setCount(count + 1);
  };

  // Tạo hàm giảm giá trị count xuống 1
  const handleDecrement = () => {
    setCount(count - 1);
  };

  return (
    <div>
      <p>Giá trị hiện tại: {count}</p>
      <button onClick={handleIncrement}>Tăng</button>
      <button onClick={handleDecrement}>Giảm</button>
    </div>
  );
}

export default Counter;
