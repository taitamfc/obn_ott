// Trang chứa component sử dụng SSR
import React from 'react';

const MyPage = ({ serverData }) => {
  return (
    <div>
      <h1>Server-side Rendering Example</h1>
      <ul>
        {serverData.map((item) => (
          <li key={item.id}>
            <h2>{item.name}</h2>
            <p>{item.decscription}</p>
          </li>
        ))}
      </ul>
    </div>
  );
};

export async function getServerSideProps(context) {
  // Fetch dữ liệu từ API hoặc cơ sở dữ liệu
  const res = await fetch('https://64bf41e95ee688b6250d3536.mockapi.io/hiiii/user');
  const data = await res.json();

  return {
    props: {
      serverData: data, // Truyền dữ liệu từ API vào trong props để sử dụng trong component
    },
  };
}

export default MyPage;
