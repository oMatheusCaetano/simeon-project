export default [
  {
    path: '/',
    name: 'Home',
    component: () => import(/* webpackChunkName: "home-page" */ '@page/Home'),
    meta: { requiresAuth: true },
  },
  {
    path: '/register',
    name: 'Register',
    component: () => import(/* webpackChunkName: "register-page" */ '@page/Register'),
    meta: { onlyNotAuth: true },
  },
  {
    path: '/login',
    name: 'Login',
    component: () => import(/* webpackChunkName: "login-page" */ '@page/Login'),
    meta: { onlyNotAuth: true },
  },
  {
    path: '/post',
    name: 'Post',
    component: () => import(/* webpackChunkName: "post-page" */ '@page/Post'),
    meta: { requiresAuth: true },
  },
]
