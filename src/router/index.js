import { createRouter, createWebHistory } from 'vue-router'
import LandingPage from '../views/LandingPage.vue';
import About from '../views/AboutPage.vue';
import Activity from '../views/ActivityPage.vue';
import Projects from '../views/ProjectPage.vue';
import Teams from '../views/TeamsPage.vue';
import Login from '../views/Loginpage.vue';
import View from '../views/ViewPage.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
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
      path: '/login',
      name: 'Login',
      component: Login,
    },
    {
      path: '/view',
      name: 'View',
      component: View,
    },
  ],
})

export default router
