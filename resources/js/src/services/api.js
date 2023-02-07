import axios from 'axios';
import {store} from "../store/vuejx";

const instance = axios.create({
    baseURL: window.location.origin,
});

// Before each ajax request activate preloader screen
instance.interceptors.request.use((configAxios) => {
    configAxios.headers.common.Authorization = `Bearer ${store.state.token}`;

    return configAxios;
});

// After each ajax response deactivate preloader screen
// If response fail, again deactivate preloader screen too
instance.interceptors.response.use((configAxios) => {
    return configAxios;
}, (error) => {
    return Promise.reject(error);
});

export default instance;
