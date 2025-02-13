<script setup>
import { ref } from 'vue';
import axios from 'axios';

const nomepersonagem = ref('');

const criarpersonagem = async () => {
  if (nomepersonagem.value.trim() === '') {
    alert('Digite um nome válido para o personagem.');
    return;
  }

  try {
    const response = await axios.post('http://127.0.0.1:8000/api/personagem', {
      nome: nomepersonagem.value,
    });
    console.log('Personagem criado com sucesso:', response.data);
    nomepersonagem.value = '';
  } catch (error) {
    console.error('Erro ao criar personagem:', error);
    alert('Ocorreu um erro ao criar o personagem.');
  }
};
</script>

<template>
  <div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Criar Personagem</h1>
    <div class="flex items-center">
      <input
        type="text"
        v-model="nomepersonagem"
        placeholder="Digite o nome do personagem"
        class="border p-2 rounded text-black"
      />
      <button
        @click="criarpersonagem"
        class="ml-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
      >
        Salvar
      </button>
    </div>
  </div>
</template>



<style scoped></style>