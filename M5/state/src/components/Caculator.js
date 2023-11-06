import React, { Component } from 'react';

class Caculator extends Component {
    constructor (props){
        super(props);
        this.state = {
            soA: 0,
            soB: 0,
            operator: '+',
            result:''
        }
    }
    caculator = () => {
        let soA = this.state.soA;
        soA = parseInt(soA)
        let soB = this.state.soB;
        soB = parseInt(soB)
        let operator= this.state.operator;
        let kq;
        switch (operator){
            case '+':
                kq = soA + soB;
                break;
            case '-':
                kq = soA - soB;
                break;
            case '*':
                kq = soA * soB;
                break;
            case '/':
                kq = soA / soB;
                break;
                default:
                    // code to execute when none of the above cases match
                    break;
        }
        this.setState ({ result: kq });
    }
    handleChange = (e) => {
        console.log(e.target.name);
        console.log(e.target.value)
this.setState({
    [e.target.name]: e.target.value
})
    }
    render() {
        return (
            <div>
                <p>{this.state.soA}</p>
                <p>{this.state.soB}</p>
                <input type="number" name="soA" onChange={this.handleChange}/>
                <input type="number" name="soB" onChange={this.handleChange}/>
                <select name="operator" onChange={this.handleChange}>
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
                    <button onClick={this.caculator}>Tính</button>
                    <h1>{this.state.result}</h1>
            </div>
        );
    }
}

export default Caculator;