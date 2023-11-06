import React, { Component } from 'react';

class TodoApp extends Component {
    constructor(props) {
        super(props);
        this.state = {
          list: [],
          item: '',
        };
      }
    
      handleChange = (event) => {
        this.setState({ item: event.target.value });
      };
    
      handleAddItem = () => {
        if (this.state.item.trim() !== '') {
          this.setState((state) => ({
            list: [...state.list, state.item],
            item: '',
          }));
        }
      };
    
      render() {
        return (
          <div>
            <h1>Todo List</h1>
            <div>
              <input
                type="text"
                value={this.state.item}
                onChange={this.handleChange}
              />
              <button onClick={this.handleAddItem}>Add</button>
            </div>
            <ul>
              {this.state.list.map((item, index) => (
                <li key={index}>{item}</li>
              ))}
            </ul>
          </div>
        );
      }
    }
    

export default TodoApp;