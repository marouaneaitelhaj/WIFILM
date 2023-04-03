import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import { useAuthStore } from '../stores/auth'
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/about',
      name: 'about',
      component: () => import('../views/AboutView.vue')

    },
    {
      path: '/Movies',
      name: 'movies',
      component: () => import('../views/MoviesView.vue'),
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/Movies/:id',
      name: 'movie',
      component: () => import('../views/detailMovie.vue'),
      props: route => ({ id: route.params.id }),
      meta: {
        requiresAuth: true
      }
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'not-found',
      component: () => import('../views/NotFoundView.vue')
    },
    {
      path: '/signup',
      name: 'signup',
      component: () => import('../views/SignupView.vue'),
    },
    {
      path: '/adminlogin',
      name: 'adminLogin',
      component: () => import('../views/adminlogin.vue'),
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/admin.vue'),
      meta: {
        requiresAuth: true,
        requiresAdmin: true
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue'),
    },
    {
      path: '/actors',
      name: 'actors',
      component: () => import('../views/ActorsView.vue'),
      meta: {
        requiresAuth: true
      }
    },
  ]
})
router.beforeEach((to, from, next) => {
  const requiresAuth = to.matched.some(record => record.meta.requiresAuth)
  const currentUser = localStorage.getItem('token')
  if (requiresAuth && !currentUser) {
    next('/login')
  } else if (to.path === '/login' && currentUser) {
    next('/')
  }
  else if (to.path === '/signup' && currentUser) {
    next('/')
  }
  else {
    requiresAuth
    next()
  }
})
// router.beforeEach(async (to, from, next) => {
//   const requiresAdmin = to.matched.some(record => record.meta.requiresAdmin)
//   const user = await useAuthStore().getUser()
//   const role = user.role || 'user'
//   console.log(role)
//   console.log(requiresAdmin)
//   if (requiresAdmin && role !== 'admin') {
//     next('/login')
//   } else {
//     next()
//   }
// })
router.afterEach((to, from, next) => {
  document.title = to.meta.name || 'WiFilm'
})
export default router
