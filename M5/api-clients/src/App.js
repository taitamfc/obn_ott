import './App.css';
import PersonList from "./components/PersonList";
import PersonList1 from "./components/PersonList1";
import PersonList2 from "./components/PersonList2";
function App() {
  return (
    <div className="App">
      <h1>My App</h1>
      {/* <PersonList />
      <PersonList1 />
      <PersonList2 /> */}
    </div>
  );
}
export default App;


// setTimeout(function(){
//   console.log(1);
// },1000)
// console.log(2);

// setTimeout(function () {
//   console.log(1);
//   setTimeout(function () {
//     console.log(2);
//     setTimeout(function () {
//       console.log(3);
//       setTimeout(function () {
//         console.log(4);
//         setTimeout(function () {
//           console.log(5);
//           setTimeout(function () {
//             console.log(6);
//           }, 1000)
//         }, 1000)
//       }, 1000)
//     }, 1000)
//   }, 1000)
// }, 1000)


//taopm gqvdtqtlt bdb
// var promise = new Promise(
//   //Executor
//   function (resolve, reject) {
//     reject();
//   }
// );

//nhanpm t3pt
// promise
//   .then(function () {
//     console.log('Success1');
//   })
//   .catch(function () {
//     console.log('Failure!');
//   })
//   .finally(function () {
//     console.log('Done!');
//   })


// function delay(ms) {
//   return new Promise((resolve) => setTimeout(resolve, ms));
// }

// async function fetchData() {
//   console.log("Bắt đầu lấy dữ liệu...");

//   try {
//     // Sử dụng await để đợi tới khi delay hoàn thành
//     await delay(2000);
//     console.log("Dữ liệu đã được lấy!");

//     // Thêm một đoạn mã giả lập thêm 1s đợi
//     await delay(1000);
//     console.log("Đã đợi thêm 1 giây!");

//     console.log("Tiếp tục thực hiện các tác vụ khác sau khi delay hoàn thành");
//     // ...
//   } catch (error) {
//     console.error("Đã xảy ra lỗi: ", error);
//   }
// }


// fetchData();

// function getRandomNumber() {
//   return new Promise((resolve, reject) => {
//     const randomNum = Math.random();
//     if (randomNum < 0.5) {
//       resolve(randomNum);
//     } else {
//       reject(new Error("không lấy được số ngẫu nhiên!"));
//     }
//   });
// }

// async function fetchData() {
//   try {
//     const result = await getRandomNumber();
//     console.log("Kết quả: ", result);
//   } catch (error) {
//     console.error("Đã xảy ra lỗi: ", error.message);
//   }
// }

// fetchData();
