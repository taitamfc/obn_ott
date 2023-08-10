    import axios from "axios";

    class TourModel {
        constructor() {
            this.api_url = 'https://64bf41e95ee688b6250d3536.mockapi.io/hiiii/';
        }

        all() {
            return new Promise((resolve, reject) => {
                axios.get(this.api_url + 'user')
                    .then((res) => {
                        resolve(res.data)
                    })
                    .catch((err) => {
                        reject(err)
                    })
            });
        }

        async find(id) {
            try {
                const response = await axios.get(this.api_url + 'user/' + id);
                return response.data;
            } catch (error) {
                throw new Error('Error fetching data from API: ' + error.message);
            }
        }
        

        async store(data) {
            try {
                const response = await axios.post(this.api_url + 'user', data);
                return response.data;
            } catch (error) {
                throw new Error('Error sending data to API: ' + error.message);
            }
        }

        async update(id, data) {
            try {
                const response = await axios.put(this.api_url + 'user/' + id, data);
                return response.data;
            } catch (error) {
                throw new Error('Error updating data on API: ' + error.message);
            }
        }

        async delete(id) {
            try {
                const response = await axios.delete(this.api_url + 'user/' + id);
                return response.data;
            } catch (error) {
                throw new Error('Error deleting data from API: ' + error.message);
            }
        }
    }

    export default new TourModel();
