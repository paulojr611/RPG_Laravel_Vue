import { createRouter, createWebHistory } from 'vue-router';
import count from '../views/Count.vue';
import rpg from '../views/rpg.vue';
import criarpersonagem from '../views/CriarPersonagem.vue';

const routes = [
  {
    path: '/',
    name: 'Nascimento',
    component: criarpersonagem,
  },
  {
    path: '/rpg',
    name: 'rpg',
    component: rpg,
    meta: { requiresClick: true },
  },
  {
    path: '/count',
    name: 'count',
    component: count,
  },

];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresClick) {
    const canAccess = sessionStorage.getItem('canAccessPage');
    
    if (!canAccess) {
      next('/'); // Redireciona para a home
      return;
    }
  }

  sessionStorage.removeItem('canAccessPage'); // Reseta após o acesso
  next();
});


export default router;
