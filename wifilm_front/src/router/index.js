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
      path: '/rank',
      name: 'Top 10',
      component: () => import('../views/RankView.vue'),
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
  const authStore = useAuthStore()
  if (to.meta.requiresAuth && !authStore.token) {
    next('/login')
  } else if (to.meta.requiresAdmin) {
    async function checkAdmin() {
      await authStore.getUser()
      if (authStore.role === 'admin') {
        next()
      } else {
        next('/')
      }
    }
    checkAdmin()
  } else {
    next()
  }
})
router.afterEach((to, from, next) => {
  document.title = 'WiFilm'
})
export default router
