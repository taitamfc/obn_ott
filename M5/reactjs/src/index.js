import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';

// import "bootstrap/dist/css/bootstrap.css"
// import reportWebVitals from './reportWebVitals';

 

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <App/>
  )
// const hello = React.createElement(
// 	"h1",
// 	{id: "msg", className: "title"},
// 	"Hello React Element"
// );
// const h2 = React.createElement(
//   "h2",
//   {className: "tieu-de"},
//   "Hieu"
// );
// const style = { color: 'red' }
// const className = "tieu-de";
// const h1 = <h1 className={className} id="hi" style={style}>Phi Long</h1>

// const root = ReactDOM.createRoot(document.getElementById('root'));
// root.render(
//   [hello, h2, h1]
// );

// // If you want to start measuring performance in your app, pass a function
// // to log results (for example: reportWebVitals(console.log))
// // or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
 //reportWebVitals();


// [Thực hành] Nhúng tên của bạn vào React Element tạo bởi React.createElement
// import React from "react";
// import ReactDOM from "react-dom/client";

// const name = "Your name";

// const root = ReactDOM.createRoot(document.getElementById("root"));

// root.render(
//   React.createElement("h1", { style: { textAlign: "center" } }, name)
// );


//[Thực hành] Nhúng tên của bạn vào React Element tạo bởi JSX
// import ReactDOM from "react-dom/client";

// const name = "hieu";

// const root = ReactDOM.createRoot(document.getElementById("root"));

// root.render(<h1 style={{ textAlign: "center" }}>hello {name}</h1>);

// bài thực hành 
// import ReactDOM from 'react-dom';

// const fruits = ['Apple', 'Banana', 'Orange', 'Apricot', 'Black rowan', 'Cranberry']

// ReactDOM.render(
// <div>
//     <h1>List of fruits</h1>
//     <ul>
//       { fruits.map((item) => (
//         <li>{ item }</li>
//       )) }
//     </ul>
//  </div>,
// document.getElementById("root")
// );


//[Thực hành] Hiển thị thời gian hiện tại (dd/mm/yyyy – hh/mm/ss)
//  import ReactDOM from 'react-dom/client';
//  const root = ReactDOM.createRoot(document.getElementById("root"));

//  const tick = () => {
//   root.render(
//     <div>
//       <h1>Hello, world!</h1>
//       <h2>It is {new Date().toLocaleTimeString()}.</h2>
//     </div>
//   );
// };
// setInterval(tick, 1000);


//[Bài tập] Tạo Element thể hiện thông tin của Trình duyệt bạn đang sử dụng
// import React from 'react';
// import ReactDOM from 'react-dom';

// const BrowserInfo = () => {
//   return (
//     <h4>Browser's details: {navigator.userAgent}</h4>
//   );
// };

// ReactDOM.render(<BrowserInfo />, document.getElementById('root'));


//[Bài tập] Tạo Element thể hiện bảng thông tin các sinh viên trong lớp học


//[Bài tập] Tạo Element thể hiện bảng thông tin các sinh viên trong lớp học
// const students = [
//   {
//     company: 'Alfreds Futterkiste',
//     contact: 'Maria Anders',
//     country: 'Germany'
//   },
//   {
//     company: 'Centro comercial Moctezuma',
//     contact: 'Francisco Chang',
//     country: 'Mexico'
//   },
//   {
//     company: 'Ernst Handel',
//     contact: 'Roland Mendel',
//     country: 'Austria'
//   },
//   {
//     company: 'Island Trading',
//     contact: 'Helen Bennett',
//     country: 'UK'
//   },
//   {
//     company: 'Laughing Bacchus Winecellars',
//     contact: 'Yoshi Tannamuri',
//     country: 'Canada'
//   },
//   {
//     company: 'Magazzini Alimentari Riuniti',
//     contact: 'Giovanni Rovelli',
//     country: 'Italy'
//   }
// ]

// root.render(
//    <table>
//     <tr>
//       <th>Company</th>
//       <th>Contact</th>
//       <th>Country</th>
//     </tr>
  
//      {students.map(student => (
//     <tr>
//       <td>{student.company}</td>
//       <td>{student.contact}</td>
//       <td>{student.country}</td>
//     </tr>
//   ))}
   
//   </table>
// )


//[Bài tập] Tạo Element thể hiện Profile Card (như hình minh hoạ)
// root.render(
//   <div className="container">
//     <div className="card">
//       <div className="card--header" />
//       <img
//         className="avatar"
//         src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
//         alt="avatar"
//       />
//       <div className="card--body">
//         <div>
//           <p className="text-header">Đình Hiếu</p>
//           <p className="text-sub">
//         hi
//           </p>
//           <button className="btn third">FOLLOW</button>StudentInfoComponent
//         </div>
//       </div>
//     </div>
//   </div>
// );



//[Bài tập] Tạo Element thể hiện Sign in Form sử dụng Bootstrap
// root.render(
// <div className="container d-flex align-items-center text-center">
//     <div className="form-signin">
//       <form>
//         <img className="mb-4" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/2560px-Bootstrap_logo.svg.png" alt="" width="72" height="57" />
//         <h1 className="h3 mb-3 fw-normal">Please sign in</h1>
//         <div className="form-floating">
//           <input type="email" className="form-control email" id="floatingInput" placeholder="name@example.com" />
//           <label>Email address</label>
//         </div>
//         <div className="form-floating">
//           <input type="password" className="form-control password" id="floatingPassword" placeholder="Password" />
//           <label>Password</label>
//         </div>
//         <div className="checkbox mb-3">
//           <label>
//             <input type="checkbox" /> Remember me
//           </label>
//         </div>
//         <button className="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
//         <p className="mt-5 mb-3 text-muted">© 2023–2024</p>
//       </form>
//     </div>
//   </div>
// )

