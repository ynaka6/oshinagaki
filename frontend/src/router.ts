import Vue from 'vue';
import Router from 'vue-router';
import DashbordLayout from './layouts/Dashboard.vue';
import store from './store';

Vue.use(Router);

const router =  new Router({
  mode: 'history',
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/login',
      name: 'Login',
      component: () => import(/* webpackChunkName: "login" */ './views/Login.vue'),
      meta: { requiresGuest: true },
    },
    {
      path: '/',
      component: DashbordLayout,
      children: [
        {
          path: '',
          component: () => import(/* webpackChunkName: "home" */ './views/Home.vue'),
          meta: { requiresAuth: true },
        },
        {
          path: 'wallpapers',
          component: () => import(/* webpackChunkName: "wallpaper" */ './views/Wallpaper.vue'),
          meta: { requiresAuth: true },
        },
        {
          path: 'font',
          component: () => import(/* webpackChunkName: "font" */ './views/Font.vue'),
          meta: { requiresAuth: true },
        },
        {
          path: 'menus',
          component: () => import(/* webpackChunkName: "menu" */ './views/Menu/Index.vue'),
          meta: { requiresAuth: true },
        },
        {
          path: 'menu/create',
          component: () => import(/* webpackChunkName: "menu-create" */ './views/Menu/Create.vue'),
          meta: { requiresAuth: true },
        },
        {
          path: 'menu/:id/edit',
          component: () => import(/* webpackChunkName: "menu-edit" */ './views/Menu/Edit.vue'),
          meta: { requiresAuth: true },
        },
        {
          path: 'menu/:id/copy',
          component: () => import(/* webpackChunkName: "menu-edit" */ './views/Menu/Copy.vue'),
          meta: { requiresAuth: true },
        },
      ],
    },
    {
      path: '/menu/:id/preview',
      component: () => import(/* webpackChunkName: "menu-preview" */ './views/Menu/Preview.vue'),
      meta: { requiresAuth: true },
    },
    {
      path: '*',
      name: 'notfound',
      component: () => import(/* webpackChunkName: "notfound" */ './views/NotFound.vue'),
    },
  ],
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!store.getters['auth/loggedIn']) {
      next({
        path: '/login',
      })
    } else {
      next()
    }
  } else if (to.matched.some(record => record.meta.requiresGuest)) {
    if (store.getters['auth/loggedIn']) {
      next({
        path: '/',
      })
    } else {
      next()
    }
  } else {
    next()
  }
})

export default router;
