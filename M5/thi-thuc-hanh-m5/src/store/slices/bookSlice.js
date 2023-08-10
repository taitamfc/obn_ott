import { createSlice } from "@reduxjs/toolkit";


export const initialState = {
    books: [],
};
const bookSlice = createSlice({
    name: 'books',
    initialState,
    reducers: {
        addBook: (state, action) => {
            state.books = [...state.books,
            action.payload
            ]
        },
        deletebook: (state, action) => {}
        
    }
})
export const { addBook } = bookSlice.actions;
export default bookSlice.reducers;