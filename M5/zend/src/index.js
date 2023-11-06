import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import App from './App';
import Hello from './components/Hello';
import 'bootstrap/dist/css/bootstrap.min.css'; // Import Bootstrap CSS
import reportWebVitals from './reportWebVitals';

ReactDOM.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>,
  document.getElementById('root')
);

reportWebVitals();
