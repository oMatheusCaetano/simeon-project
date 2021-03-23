import { createRouter, createWebHistory } from 'vue-router'

import routes from './routes'

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
})

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth) {
    if (!window.localStorage.getItem('api_token')) {
      if (from.name === 'Register') next({ name: 'Register' })
      else next({ name: 'Login' })
    } else next()
  } else next()
})

router.beforeEach((to, from, next) => {
  if (to.meta.onlyNotAuth) {
    if (!window.localStorage.getItem('api_token')) next()
    else next(from.fullPath)
  } else next()
})

export default router
