import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Areas from '../components/Areas.vue'
import Usuarios from '../components/Usuarios.vue'
import Login from '../components/Login.vue'
import FormAccept from '../components/FormAccept.vue'
import FormPerfil from '../components/FormularioPerfil.vue'

Vue.use(VueRouter)

const routes = [{
        path: '/',
        name: 'Home',
        component: Home,
        children: [{
                path: '/usuarios',
                name: 'home1',
                component: Usuarios,
            },
            {
                path: '/areas',
                name: 'home2',
                component: Areas,
            },
            {
                path: '/formulario_perfil',
                name: 'formulario',
                component: FormPerfil,
            }
        ]
    },
    {
        path: '/login',
        name: 'login',
        component: Login
    },
    {
        path: '/about',
        name: 'About',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import ( /* webpackChunkName: "about" */ '../views/About.vue')
    },
    {
        path: '/accept',
        name: 'FormAccept',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: FormAccept,
    }
]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router