import Vue from 'vue';
import VueRouter from 'vue-router';

import Login from './components/Auth/Login.vue';
import Dashboard from './components/Dashboard.vue';
import UploadPDF from './components/PDF/UploadPDF.vue';

Vue.use(VueRouter);

const routes = [
    {
        path: '/login',
        component: Login,
        name: 'login',
        meta: { requiresLogin: false }
    },
    {
        path: '/dashboard',
        component: Dashboard,
        name: 'home',
        meta: { requiresLogin: true }
    },
    {
        path: '/upload-pdf',
        component: UploadPDF,
        name: 'upload-pdf',
        meta: { requiresLogin: true }
    },
]

const router = new VueRouter({
    scrollBehavior() {
        return { x: 0, y: 0 };
    },
    base: process.env.BASE_URL,
    linkExactActiveClass: 'active-link',
    mode: 'history',
    routes,
});

export default router;
