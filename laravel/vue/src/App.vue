<template>
  <div class="flex flex-col h-screen">
    <!-- Navbar -->
    <Navbar />

    <!-- Sidebar e Conteúdo -->
    <div class="flex flex-1" style="margin-top: 56px;">
      <!-- Sidebar -->
      <Sidebar />

      <!-- Área Principal -->
      <main class="flex-1 bg-gray-800 text-white overflow-auto p-4">
        <RouterView />
      </main>
    </div>
  </div>
</template>

<script setup>
import { RouterView } from 'vue-router';
import Navbar from './components/Navbar.vue';
import Sidebar from './components/Sidebar.vue';
</script>

<style scoped>
/* Certifique-se que o body não tenha padding ou margens extras */
body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
</style>
