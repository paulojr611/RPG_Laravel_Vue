<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';

const count = ref(0);

onMounted(async () => {
  const response = await axios.get('http://127.0.0.1:8000/api/counter');
  count.value = response.data.count;
});

const incrementCount = async () => {
  const response = await axios.post('http://127.0.0.1:8000/api/counter/increment');
  count.value = response.data.count;
};

const decrementCount = async () => {
  const response = await axios.post('http://127.0.0.1:8000/api/counter/decrement');
  count.value = response.data.count;
};

const decrementbigCount = async () => {
  const response = await axios.post('http://127.0.0.1:8000/api/counter/decrementbig');
  count.value = response.data.count;
};


const router = useRouter();

function goToOtherView() {
  router.push('/rpg'); 
}

</script>

<template>
  <div class="w-full h-screen p-6 bg-gray-100 flex flex-col items-center justify-center">
    <h1 class="text-3xl font-bold text-blue-500 mb-6">Contador com Banco de Dados</h1>
    <div class="bg-white shadow-md rounded-lg p-4 mb-6">
      <div class="flex justify-center space-x-4">

        <button type="button" @click="incrementCount"
          class="w-1/6 px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
          +1
        </button>

        <button type="button" @click="decrementCount"
          class="w-1/6 px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
          -1
        </button>

        <button type="button" @click="decrementbigCount"
          class="w-1/6 px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
          -5
        </button>
        <button @click="goToOtherView" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600">
        RPG
      </button>
      </div>
      <div class="mt-4 flex justify-center ">
        {{ count }}
      </div>
      <p class="mt-4 text-gray-600">
        O valor do contador é armazenado no banco de dados.
      </p>
    </div>
  </div>
</template>
