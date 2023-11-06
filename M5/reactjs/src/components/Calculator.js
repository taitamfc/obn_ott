import React, { useState } from 'react';

function Calculator(props) {
  const [input1, setInput1] = useState('');
  const [input2, setInput2] = useState('');
  const [operator, setOperator] = useState('');
  const [result, setResult] = useState(0);

  const handleNumberInput = (e, inputName) => {
    const inputValue = e.target.value;
    if (inputName === 'input1') {
      setInput1(inputValue);
    } else {
      setInput2(inputValue);
    }
  };

  const handleOperatorInput = (e, operatorValue) => {
    setOperator(operatorValue);
  };

  const handleCalculate = () => {
    const num1 = parseInt(input1);
    const num2 = parseInt(input2);

    if (Number.isNaN(num1) || Number.isNaN(num2)) {
        // Kiểm tra xem có thể ép kiểu thành số nguyên hay không
        setResult('Invalid input');
        return;
      }

    switch (operator) {
      case '+':
        setResult(num1 + num2);
        break;
      case '-':
        setResult(num1 - num2);
        break;
      case '*':
        setResult(num1 * num2);
        break;
      case '/':
        setResult(num1 / num2);
        break;
      default:
        setResult(0);
        break;
    }
  };

  return (
    <div>
      <input
        type="text"
        value={input1}
        onChange={(e) => handleNumberInput(e, 'input1')}
      />
      <input
        type="text"
        value={input2}
        onChange={(e) => handleNumberInput(e, 'input2')}
      />
      <button onClick={(e) => handleOperatorInput(e, '+')}>+</button>
      <button onClick={(e) => handleOperatorInput(e, '-')}>-</button>
      <button onClick={(e) => handleOperatorInput(e, '*')}>x</button>
      <button onClick={(e) => handleOperatorInput(e, '/')}>/</button>
      <button onClick={handleCalculate}>=</button>
      <div>Result: {result}</div>
    </div>
  );
}

export default Calculator;
