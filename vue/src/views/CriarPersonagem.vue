<script setup>
import useGlobalImports from '@/composables/globalImports';

const { ref, onMounted, axios, useRouter, sidebar, AcademicCapIcon, BellSnoozeIcon, BellIcon} = useGlobalImports();

const menuStore = sidebar();

const removeSide = () => {
  menuStore.removeAllMenuItems();
};

const addRPG = () => {
  menuStore.addMenuItem({ label: 'RPG', icon: AcademicCapIcon, route: '/rpg' });
};

onMounted(() => {
  removeSide();
});
onMounted(() => {
  addRPG();
});
</script>

<template>
    <button @click="addRPG" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">Salve
    </button>
</template>