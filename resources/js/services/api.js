import axios from 'axios'

const token = window.localStorage.getItem('api_token')

export const headers = { headers: { Authorization: `Bearer ${token}` } }

export default axios.create({ baseURL: 'localhost:8000/api/' })
