import React from 'react';

const Home = ({ posts }) => {
    // Kiểm tra tính tồn tại của posts trước khi truy cập map
    return (
        <div>
            <h1>Danh sách bài viết</h1>
            <ul>
                {posts?.map((post) => (
                    <li key={post.id}>
                      
                        <h2>{post.name}</h2>
                        <p>{post.decscription}</p>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export async function getStaticProps() {
    try {
        // Fetch dữ liệu từ API
        const res = await fetch('https://64bf41e95ee688b6250d3536.mockapi.io/hiiii/user');
        const data = await res.json();
        console.log(data); // Kiểm tra dữ liệu từ API

        return {
            props: {
                posts: data, // Truyền dữ liệu nhận được từ API vào props
            },
        };
    } catch (error) {
        console.log(error); // Xem lỗi fetch dữ liệu
        return {
            props: {
                posts: [], // Truyền mảng rỗng nếu có lỗi fetch dữ liệu
            },
        };
    }
}

export default Home;