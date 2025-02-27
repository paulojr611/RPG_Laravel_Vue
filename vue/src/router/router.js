import { createRouter, createWebHistory } from 'vue-router';
import count from '../views/Count.vue';
import rpg from '../views/rpg.vue';

const routes = [
  {
    path: '/',
    name: 'count',
    component: count,
  },
  {
    path: '/rpg',
    name: 'rpg',
    component: rpg,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
