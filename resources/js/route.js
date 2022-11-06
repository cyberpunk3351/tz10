import { createRouter, createWebHistory, createWebHashHistory } from 'vue-router';

import index from '@/Pages/MainPage.vue'
import login from '@/Pages/LoginPage.vue'
import admin from '@/Pages/AdminIndexPage.vue'
import dataEdit from '@/Pages/AdminDataEditPage.vue'

const routes = [
    {
        path: "/",
        component: index,
        name: "index",
        meta: { requiresAuth: true },
    },
    {
        path: "/login",
        component: login,
        name: "login",
        meta: { requiresVisitor: true }
    },
    {
        path: "/admin",
        component: admin,
        name: "admin",
        props: true,
        meta: { requiresAuth: true },
    },
    {
        path: '/admin/:id/edit',
        name: 'dataEdit',
        component: dataEdit,
        props: true,
        meta: { requiresAuth: true },
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.beforeEach((to, from) => {
    // instead of having to check every route record with
    // to.matched.some(record => record.meta.requiresAuth)
    const token = localStorage.getItem('access_token')
    if (to.meta.requiresAuth && !token) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        return {
            name: 'login',
            // save the location we were at to come back later
        }
    } else if(to.meta.requiresVisitor && token) {
        return {
            name: 'index',
            // save the location we were at to come back later
        }
    }
})

export default router;
