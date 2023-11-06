import React,{useEffect, useState} from 'react';
function Count(props) {
    const [count,setCount] = useState(0);
    const [name,setName] = useState('phi')
    // khoi tao usefect
    useEffect(() => {
        console.log('component dduoc gan vao');
    }, [])
    //component cap nhat
    useEffect(() => {
        console.log('component cap nhat');
    })
    // hook cap nhat co phu thuoc
    useEffect(() => {
        console.log('component cap nhat khi name thay doi');
    }, [name])
    const handleClick = () => {
        setCount(count + 1)
    }
    return (
        <div>
            <h1>{count}</h1>
            <h1>{name}</h1>
            <button onClick={handleClick}>Click</button>
            <button onClick={() => setName('hieu')}>Click1</button>
        </div>
    );
}
export default Count;