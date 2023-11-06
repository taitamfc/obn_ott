import React, { useState } from 'react';

function Select() {
  const [state, setState] = useState({
    mycar: 'Volvo'
  });

  const handleChange = (event) => {
    setState({ ...state, mycar: event.target.value });
  };

  return (
    <form>
      <select value={state.mycar} onChange={handleChange}>
        <option value="Ford">Ford</option>
        <option value="Volvo">Volvo</option>
        <option value="Fiat">Fiat</option>
      </select>
    </form>
  );
}

export default Select;
