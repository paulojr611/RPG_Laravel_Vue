<template>
  <nav class="flex flex-col min-w-[200px] w-64 h-full bg-indigo-600 text-white py-4 px-2">
    <router-link
      v-for="item in menuItems"
      :key="item.label"
      :to="item.route"
      class="flex items-center p-2 rounded transition-colors hover:bg-black/30 cursor-pointer"
    >
      <component :is="item.icon" class="w-5 mr-2 text-gray-300" aria-hidden="true" />
      <span class="text-xs">{{ item.label }}</span>
    </router-link>
  </nav>
</template>

<script setup>
import { AcademicCapIcon, BellSnoozeIcon } from '@heroicons/vue/24/solid';

const menuItems = [
  { label: 'RPG', icon: AcademicCapIcon, route: '/rpg' },
  { label: 'Jaburu', icon: BellSnoozeIcon, route: '/' }
];
</script>
