import { createRouter, createWebHistory } from 'vue-router';

import LandingPage from '../views/LandingPage.vue';
import About from '../views/AboutPage.vue';
import Activity from '../views/ActivityPage.vue';
import Projects from '../views/ProjectPage.vue';
import Teams from '../views/TeamsPage.vue';
import Login from '../views/Loginpage.vue';
import View from '../views/ViewPage.vue';

import AdminAC from '@/views/AdminAC.vue';
import AdminPJ from '@/views/AdminPJ.vue';
import AdminEditPJ from '@/views/AdminEditPJ.vue';
import AdminEditAC from '@/views/AdminEditAC.vue';

const routes = [
  {
    path: '/',
    name: 'LandingPage',
    component: LandingPage,
  },
  {
    path: '/about',
    name: 'About',
    component: About,
  },
  {
    path: '/activity',
    name: 'Activity',
    component: Activity,
  },
  {
    path: '/projects',
    name: 'Projects',
    component: Projects,
  },
  {
    path: '/teams',
    name: 'Teams',
    component: Teams,
  },
  {
    path: '/masok',
    name: 'Masok',
    component: Login,
  },
  {
    path: '/view/:type/:id',
    name: 'View',
    component: View,
  },
  {
    path: '/adminAC',
    name: 'AdminAC',
    component: AdminAC,
    meta: { requiresAuth: true, roles: ['admin'] },
  },
  {
    path: '/adminPJ',
    name: 'AdminPJ',
    component: AdminPJ,
    meta: { requiresAuth: true, roles: ['admin'] },
  },
  {
    path: '/adminEditPJ/:id',
    name: 'AdminEditPJ',
    component: AdminEditPJ,
    meta: { requiresAuth: true, roles: ['admin'] },
  },
  {
    path: '/adminEditAC/:id',
    name: 'AdminEditAC',
    component: AdminEditAC,
    meta: { requiresAuth: true, roles: ['admin'] },
  },
  // Route wildcard untuk menangani page tidak ditemukan
  {
    path: '/:pathMatch(.*)*',
    redirect: '/',
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

// Middleware auth check
router.beforeEach((to, from, next) => {
  const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
  const userRole = localStorage.getItem('role');

  if (to.meta.requiresAuth) {
    if (!isLoggedIn) {
      return next({ name: 'LandingPage' });
    }
  }

  next();
});

export default router;
