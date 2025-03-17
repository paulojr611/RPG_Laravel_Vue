<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import { sidebar } from '../stores/menuSidebar';
import { AcademicCapIcon, BellSnoozeIcon, BellIcon } from '@heroicons/vue/24/solid';


const menuStore = sidebar();

const personagens = ref([])

const removeSide = () => {
  menuStore.removeAllMenuItems();
};

const addRPG = () => {
  menuStore.addMenuItem({ label: 'RPG', icon: AcademicCapIcon, route: '/rpg' });
  menuStore.addMenuItem({ label: 'Jaburu', icon: BellSnoozeIcon, route: '/' });
  menuStore.addMenuItem({ label: 'Commit do dia', icon: BellIcon, route: '/' });
};




const novoPersonagem = ref({
  nome: '',
  vida: 10,
  vidaMax: 10,
  mana: 5,
  manaMax: 5,
  ca: 10,
  DR: 0,
  nivel: 1,
  moedas: 0,
  xp: 0
})

const errorMsg = ref(null)

const carregarPersonagens = async () => {
  try {
    const { data } = await axios.get('/api/personagem')
    personagens.value = data
  } catch (error) {
    errorMsg.value = 'Erro ao carregar personagens.'
    console.error(error)
  }
}

const criarPersonagem = async () => {
  if (novoPersonagem.value.nome.trim() === '') {
    alert('Digite um nome válido para o personagem.')
    return
  }

  try {
    const { data } = await axios.post('/api/personagem', novoPersonagem.value)
    personagens.value.push(data)
    window.location.reload();
  } catch (error) {
    errorMsg.value = 'Erro ao criar personagem.'
    console.error(error)
  }
}

const atualizarPersonagem = async (personagem) => {
  try {
    const atualizado = { ...personagem, nivel: personagem.nivel + 1, xp: personagem.xp + 100 }
    await axios.put(`/api/personagem/${personagem.id}`, atualizado)
    carregarPersonagens()
  } catch (error) {
    errorMsg.value = 'Erro ao atualizar personagem.'
    console.error(error)
  }
}

// Deletar personagem
const deletarPersonagem = async (id) => {
  try {
    await axios.delete(`/api/personagem/${id}`)
    personagens.value = personagens.value.filter(p => p.id !== id)
  } catch (error) {
    errorMsg.value = 'Erro ao deletar personagem.'
    console.error(error)
  }
}

// Limpar formulário após criação
const limparFormulario = () => {
  novoPersonagem.value = {
    nome: '',
    vida: 10,
    vidaMax: 10,
    mana: 5,
    manaMax: 5,
    ca: 10,
    DR: 0,
    nivel: 1,
    moedas: 0,
    xp: 0
  }
}

// Carrega os personagens quando o componente é montado
onMounted(carregarPersonagens)
onMounted(() => {
  removeSide();
});
</script>

<template>
  <div class="max-w-4xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">RPG - Gerenciamento de Personagens</h1>

    <!-- Exibir mensagem de erro -->
    <div v-if="errorMsg" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
      {{ errorMsg }}
    </div>

    <!-- Formulário para criar novo personagem -->
    <div class="bg-white shadow rounded p-6 mb-8">
      <h2 class="text-2xl font-semibold text-gray-700 mb-4">Criar Novo Personagem</h2>
      <div class="mb-4">
        <label for="nome" class="block text-gray-600 mb-1">Nome</label>
        <input id="nome" type="text" v-model="novoPersonagem.nome" placeholder="Digite o nome do personagem"
          class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-900" />
      </div>
      <button @click="criarPersonagem" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
        Criar Personagem
      </button>
    </div>

    <!-- Listagem dos personagens -->
    <div class="bg-white shadow rounded p-6">
      <h2 class="text-2xl font-semibold text-gray-700 mb-4">Lista de Personagens</h2>
      <ul v-if="personagens.length">
        <li v-for="personagem in personagens" :key="personagem.id"
          class="border-b border-gray-200 py-4 flex flex-col md:flex-row md:items-center md:justify-between">
          <div>
            <h3 class="text-xl font-bold text-gray-800">{{ personagem.nome }}</h3>
            <p class="text-gray-600">Nível: {{ personagem.nivel }}</p>
            <p class="text-gray-600">Vida: {{ personagem.vida }} / {{ personagem.vidaMax }}</p>
            <p class="text-gray-600">Mana: {{ personagem.mana }} / {{ personagem.manaMax }}</p>
            <p class="text-gray-600">CA: {{ personagem.ca }} | DR: {{ personagem.DR }}</p>
            <p class="text-gray-600">Moedas: {{ personagem.moedas }} | XP: {{ personagem.xp }}</p>
          </div>
          <div class="mt-4 md:mt-0 flex space-x-2">
            <button @click="atualizarPersonagem(personagem)"
              class="bg-green-500 hover:bg-green-600 text-white py-2 px-3 rounded">
              + Nível
            </button>
            <button @click="deletarPersonagem(personagem.id)"
              class="bg-red-500 hover:bg-red-600 text-white py-2 px-3 rounded">
              Excluir
            </button>
          </div>
        </li>
      </ul>
      <p v-else class="text-center text-gray-500">
        Nenhum personagem encontrado.
      </p>
    </div>
    <button @click="addRPG"
    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded"
    >Salve
    </button>
  </div>
</template>

<style scoped>
</style>
