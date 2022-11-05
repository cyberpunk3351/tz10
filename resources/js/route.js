import { createRouter, createWebHistory, createWebHashHistory } from 'vue-router';

import index from '@/Pages/MainPage.vue'

const routes = [
    {
        path: "/",
        component: index,
        name: "index",
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

// router.beforeEach((to, from, next) => {
//     if (to.matched.some(record => record.meta.requiresAuth)) {
//         const token = localStorage.getItem('access_toke')
//         // console.log(token)
//         if (!token) {
//             next({
//                 name: 'login',
//             })
//         } else {
//             next()
//         }
//     } else if (to.matched.some(record => record.meta.requiresVisitor)) {
//         const token = localStorage.getItem('access_toke')
//         if (token) {
//             next({
//                 name: 'dashboard',
//             })
//         } else {
//             next()
//         }
//     } else {
//         next()
//     }
// })

// router.beforeEach((to, from) => {
//     // instead of having to check every route record with
//     // to.matched.some(record => record.meta.requiresAuth)
//     const token = localStorage.getItem('access_token')
//     if (to.meta.requiresAuth && !token) {
//       // this route requires auth, check if logged in
//       // if not, redirect to login page.
//       return {
//         name: 'login',
//         // save the location we were at to come back later
//       }
//     } else if(to.meta.requiresVisitor && token) {
//         return {
//             name: 'dashboard',
//             // save the location we were at to come back later
//           }
//     }
//   })

export default router;
