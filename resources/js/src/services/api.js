import axios from 'axios';
import { store } from "../store/vuejx";
import router from "../router";

const instance = axios.create({
    baseURL: window.location.origin,
});

// Before each ajax request add header
instance.interceptors.request.use((configAxios) => {
    configAxios.headers.common.Authorization = `Bearer ${store.state.token}`;

    return configAxios;
});

instance.interceptors.response.use((configAxios) => {
    return configAxios;
}, (error) => {
    if (error.response.status === 401) {
        router.push('login')
    }

    return Promise.reject(error);
});

export default instance;
