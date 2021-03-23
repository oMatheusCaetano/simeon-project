import axios from 'axios'

export const headers = { headers: { Authorization: `Bearer ${window.localStorage.getItem('api_token')}` } }

export default axios.create({ baseURL: 'http://localhost:8000/api/' })
