import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router/index.jsx'
import axios from 'axios'


axios.defaults.withCredentials = true;
axios.defaults.baseURL='http://localhost:8000/api/'
axios.defaults.headers.post['Accept']='application/json'
axios.defaults.headers.post['Content-Type']='application/json'

axios.interceptors.request.use(function(config){
    const token=localStorage.getItem('token')
    config.headers.authorization=token?`Bearer ${token}`:'';
    return config
})

axios.defaults.headers.post['Content-Type']='multipart/form-data'



createApp(App).use(router).mount('#app')
