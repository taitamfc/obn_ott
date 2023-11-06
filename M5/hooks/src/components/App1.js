import React, { useState, useEffect } from 'react';

function App1() {
  const totalNumbers = 100;
  const [score, setScore] = useState(0);
  const [numbers, setNumbers] = useState(Array.from({ length: totalNumbers }, (_, index) => index + 1));
  const [currentNumber, setCurrentNumber] = useState(1);
  const [gameOver, setGameOver] = useState(false);
  const [clickedNumbers, setClickedNumbers] = useState([]);
  const [gameOverByClick, setGameOverByClick] = useState(false);

  useEffect(() => {
    shuffleArray(numbers);
  }, [numbers]);

  useEffect(() => {
    if (gameOverByClick) {
      alert(`Game over! Your score: ${score}`);
      setGameOverByClick(false);
    }
  }, [gameOverByClick, score]);

  const handleClick = (number) => {
    if (clickedNumbers.includes(number)) {
      return;
    }

    if (number === currentNumber) {
      setScore(score + 1);
      setCurrentNumber(currentNumber + 1);
      setClickedNumbers([...clickedNumbers, number]);
    } else {
      setGameOver(true);
      setGameOverByClick(true); // Thêm xử lý khi click sai
    }

    if (number === totalNumbers) {
      setGameOver(true);
    }
  };

  return (
    <div>
      <p>{(gameOver || gameOverByClick) ? `Game over! Your score: ${score}` : `Score: ${score}`}</p>
      <div>
        {numbers.map((number) => (
          <button
            key={number}
            style={{ backgroundColor: clickedNumbers.includes(number) ? 'green' : 'white' }}
            onClick={() => handleClick(number)}
            disabled={gameOver || clickedNumbers.includes(number) || gameOverByClick || number !== currentNumber}
          >
            {number}
          </button>
        ))}
      </div>
    </div>
  );
}

function shuffleArray(array) {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
}

export default App1;
