import { createRouter, createWebHistory } from 'vue-router'
import LandingPage from '../views/LandingPage.vue';
import About from '../views/AboutPage.vue';
import Activity from '../views/ActivityPage.vue';
import Projects from '../views/ProjectPage.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/home',
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
  ],
})

export default router
