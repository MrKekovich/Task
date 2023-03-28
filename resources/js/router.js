import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'delivers',
            component: () => import('./components/views/DeliverComponent.vue')
        }
    ]
})

export default router
