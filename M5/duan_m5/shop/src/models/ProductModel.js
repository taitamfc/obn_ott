import axios from 'axios';

class ProductModel  {
    constructor(){
        this.api_url = 'http://127.0.0.1:8000/api/products';
    }

    getAllProduct = async () => {
        try{
            const res = await axios.get(this.api_url) ;
            return res.data;
        }catch (error){
            return [];
        }
    }
    
    getProductById = async (productId) => {
        try {
            const url = `${this.api_url}/${productId}`;
            const res = await axios.get(url);
            return res.data;
        } catch (error) {
            return null;
        }
    }
    async find(id) {
        const data = await axios.get(this.api_url + id);
        return data.data;
      }
    
      async store(data) {
        const res = await axios.post(this.api_url + data);
        return res;
      }
    
      async update(id, data) {
        const res = await axios.put(this.api_url + id, data);
        return res;
      }
    
      async delete(id) {
        const data = await axios.delete(this.api_url + id);
        return data;
      }
    }
    
    export default new ProductModel();
