import './bootstrap';
import Vue from 'vue';
import router from './src/router';
import { store } from './src/store/vuejx';

new Vue({
    el: '#app',
    store,
    router
});
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresLogin) && store.state.token !== '') {
        // You can use store variable here to access globalError or commit mutation
        next("login")
    } else {
        next()
    }
})
