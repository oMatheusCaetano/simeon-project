export default [
  {
    path: '/',
    name: 'Home',
    component: () => import(/* webpackChunkName: "home-page" */ '@page/Home'),
  },
  {
    path: '/register',
    name: 'Register',
    component: () => import(/* webpackChunkName: "register-page" */ '@page/Register'),
  },
]
