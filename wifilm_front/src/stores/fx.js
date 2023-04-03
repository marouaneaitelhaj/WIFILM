import { defineStore } from 'pinia';
import router from '../router';

export const useFxStore = defineStore('fx', {
    state: () => ({
        loading: false,
    }),
});
