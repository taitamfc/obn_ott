import logo from './logo.svg';
import Content from './components/Content';
import Header from './components/Header';
import Car from './components/Car';
import Welcome from './components/Welcome';
import Addcomponent from './components/Addcomponent';
import Alert from './components/Alert';
import Calculator from './components/Calculator';
import StudentInfoComponent from './components/StudentInfoComponent';
import './App.css';

function App() {
  return (
    <div className="App">
      <Welcome name="Admin" />
      <Addcomponent firstNumber={1} secondNumber={2} />
      <Alert text="Cảnh báo! Tài nguyên bạn vừa truy cập không tồn tại." />
      <Calculator />
      <StudentInfoComponent />
      <Header />
      <Content style={{ color: "red" }} />
      <Car />
    </div>
  );
}

export default App;
