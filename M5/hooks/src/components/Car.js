import React, { useState } from 'react';

function Car() {
  const carList = ['Mercedes', 'BMW', 'Toyota'];
  const colorList = ['Red', 'Blue', 'Green'];

  const [selectedCar, setSelectedCar] = useState({
    car: carList[0],
    color: colorList[0]
  });

  const handleCarChange = (e) => {
    setSelectedCar((prevState) => ({
      ...prevState,
      car: e.target.value
    }));
  };

  const handleColorChange = (e) => {
    setSelectedCar((prevState) => ({
      ...prevState,
      color: e.target.value
    }));
  };

  return (
    <div className="App">
      <h1>Car Selection</h1>
      <div>
        <label>Car: </label>
        <select onChange={handleCarChange} value={selectedCar.car}>
          {carList.map((car, index) => (
            <option key={index} value={car}>
              {car}
            </option>
          ))}
        </select>
      </div>
      <div>
        <label>Color: </label>
        <select onChange={handleColorChange} value={selectedCar.color}>
          {colorList.map((color, index) => (
            <option key={index} value={color}>
              {color}
            </option>
          ))}
        </select>
      </div>
      <h2>You selected a {selectedCar.color} - {selectedCar.car}</h2>
    </div>
  );
}

export default Car;
