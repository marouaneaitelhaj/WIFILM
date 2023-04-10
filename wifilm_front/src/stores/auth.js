import { defineStore } from 'pinia';
import router from '../router';
import { useFxStore } from './fx'

export const useAuthStore = defineStore('auth', {
  state: () => ({
    token: localStorage.getItem('token') || null,
    user: null,
    id: null,
    role: null,
    error: null,
    NotChecked: true,
  }),
  actions: {
    async logout() {
      localStorage.removeItem('token');
      this.token = null;
      this.user = null;
      router.push('/login');
    },
    async signup(name, email, password) {
      useFxStore().loading = true
      await axios.post('http://127.0.0.1:8000/api/register', {
        name: name,
        email: email,
        password: password
      })
        .then((res) => {

          localStorage.setItem('token', res.data.token);
          this.token = res.data.token;
          this.getUser();
          useFxStore().loading = false
          router.push('/');
        })
        .catch((err) => {
          this.error = err.response.data.message;
        })
        .finally(() => {
          useFxStore().loading = false
        })
    },
    async getUser() {
      useFxStore().loading = true;
      await axios.get("http://127.0.0.1:8000/api/user", {
        headers: {
          Authorization: "Bearer " + this.token,
        },

      })
        .then((res) => {
          this.user = res.data.name;
          this.id = res.data.id;
          this.role = res.data.role;
        })
        .catch((err) => {
          console.log(err);
          localStorage.removeItem('token');
          this.token = null;
        })
        .finally(() => {
          useFxStore().loading = false;
        })
    },
    async login(email, password) {
      useFxStore().loading = true
      await axios.post("http://127.0.0.1:8000/api/login", {
        email: email,
        password: password,
      })
        .then((res) => {
          // useFxStore().loading = false
          localStorage.setItem('token', res.data.token);
          this.token = res.data.token;
          this.getUser();
          this.error = null;
          router.push('/');
        })
        .catch((err) => {
          useFxStore().loading = false

          this.error = err.response.data.message;
        });
    },
  },
});
