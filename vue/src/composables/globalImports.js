import { ref, onMounted } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router';
import { sidebar } from '../stores/menuSidebar';
import { AcademicCapIcon, BellSnoozeIcon, BellIcon } from '@heroicons/vue/24/solid';

export default function useGlobalImports() {
  return {
    ref,
    onMounted,
    axios,
    useRouter,
    sidebar,
    AcademicCapIcon,
    BellSnoozeIcon,
    BellIcon,
  };
}
