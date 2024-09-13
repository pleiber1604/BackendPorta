import { createRouter, createWebHistory } from "vue-router";

import register from '../components/register/index.vue'
import login  from '../components/login/index.vue'
import dashboard  from '../components/dashboard/index.vue'
import notFound from '../components/NotFound.vue'


const routes = [
    {
        path: '/',
        component: register
    },
    {
        path: '/login',
        component: login
    },
    {
        path: '/dashboard',
        component: dashboard
    },
    {
        path: '/:pathMatch(.*)*', //para rutas que no coincidan con las definidas anteriormente
        component: notFound
    },
  

]
const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router