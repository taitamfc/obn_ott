import React, { useState } from 'react';

function App3(props) {
    const [name, setName] = useState('hieu');
    const [age, setAge] = useState(18)
    const HandleApp3 = function (e) {
    setName('Phi');
    setAge(age + 1);
    console.log(e);
}
const HandleApp31 = function (name,number) {
    setName(name);
    setAge(number);
}
    return (
        <div>
           <h1>{name}</h1> 
           <h1>{age}</h1> 
           <button onClick={HandleApp3}>click</button>
           <button onClick={() => HandleApp31('Long',25)}>click</button>
        </div>
    );
}

export default App3;