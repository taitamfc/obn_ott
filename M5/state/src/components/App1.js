import React from 'react';

class App1 extends React.Component {
   constructor(props) {
      super(props);
		
      this.state = {
         header: "Header from state...",
         content: "Content from state...",
         name: "hieu"
      }
   }
   render() {
      return (
         <div>
            <h1>{this.state.header}</h1>
            <h2>{this.state.content}</h2>
            <h2>{this.state.name}</h2>
         </div>
      );
   }
}


// class App extends React.Component {
//   constructor(props) {
//     super(props);
//     this.state = {
//       brand: "Ford",
//       model: "Mustang",
//       color: "red",
//       year: 1964
//     };
//   }
//   changeColor = () => {
//     this.setState({color: "blue"});
//   }
//   render() {
//     return (
//       <div>
//         <h1>My {this.state.brand}</h1>
//         <p>
//           It is a {this.state.color}
//           {this.state.model}
//           from {this.state.year}.
//         </p>
//         <button
//           type="button"
//           onClick={this.changeColor}
//         >Change color</button>
//       </div>
//     );
//   }
// }
export default App1;