import { useState } from 'react';
import { addTodo, addTodoAsync, decreaseCount, deleteTodo, increaseCount } from './redux/actions'; // Import action increaseCount từ tệp actions
import { store } from './redux/store';
import { connect, useDispatch, useSelector } from 'react-redux';

function App(props) {
  const dispatch = useDispatch()
  const todos = useSelector((state) => state.todos.todos)
  const [name, setName] = useState('')
  const handleIncrease = () => {
    props.increaseCount(10)
  }

  const handleDescrease = () => {
    props.decreaseCount(10)
  }

  const handleOnchange = (e) => {
    setName(e.target.value)
  }


  const handleAddTodo = () => {

    // dispatch(addTodoAsync())
    dispatch(addTodo({
      name,
      id: Math.random()
    }))
    setName('')
  }
  const handleDeleteTodo = (id) => {
    dispatch(deleteTodo(id))
  }
  return (
    <div className="App">
      <h1>Redux turtorials</h1>
      <h4>{props.count}</h4>
      <button onClick={handleIncrease}>Increse</button>
      <button onClick={handleDescrease}>Descrease</button>
      <div>
        <input value={name} onChange={handleOnchange} />
        <button onClick={handleAddTodo}>Add todo</button>
      </div>
      {todos.map((todo, index) => {
        return (
          <div key={todo.id}>
            {index} - {todo.name}
            <span onClick={() => handleDeleteTodo(todo.id)}>X</span>
          </div>
        )
      })}
    </div>
  );
}
function mapStateToProps(state) {
  return {
    count: store.getState().count.count,
  }
}
function mapDispatchToProps(dispatch) {
  return {
    increaseCount: (data) => store.dispatch(increaseCount(data)),
    decreaseCount: (data) => store.dispatch(decreaseCount(data)),
  }

}
export default connect(mapStateToProps, mapDispatchToProps)(App);