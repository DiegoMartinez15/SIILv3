import Vue from 'vue'
import store from '../store'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Areas from '../components/Areas.vue'
import Usuarios from '../components/Usuarios.vue'
import Empresas from '../components/Empresas.vue'
import Login from '../components/Login.vue'
import FormAccept from '../components/FormAccept.vue'
import FormPerfil from '../components/FormularioPerfil.vue'

Vue.use(VueRouter)


const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    children: [
      {
        path: '/usuarios',
        name: 'usuarios',
        component: Usuarios,
        meta: { requiresAuth: true }
      },
      {
        path: '/empresas',
        name: 'empresas',
        component: Empresas,
        meta: { requiresAuth: true }
      },
      {
        path: '/areas',
        name: 'areas',
        component: Areas,
        meta: { requiresAuth: true }
      } ,
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
    component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
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

router.beforeEach((to, from, next) => {
  if (to.matched.some(route => route.meta.requiresAuth)){
    if(store.state.role == 1 && sessionStorage.getItem('tokenS') != null){
      next()
    }else{
      next('/')
    }
  }else{
    next()
  }
});



export default router
