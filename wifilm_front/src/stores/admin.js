import { defineStore } from 'pinia';
import router from '../router';
import { useAuthStore } from './auth';

export const useadminStore = defineStore('admin', {
  state: () => ({
    token: localStorage.getItem('token') || null ,
    error: null,
  }),
  actions: {
    async logout() {
      localStorage.removeItem('token');
      this.token = null;
      router.push('/admin');
    },
    async getadmin(){
      if (this.token) {
        await axios.get("http://127.0.0.1:8000/api/user", {
        headers: {
          Authorization: "Bearer " + this.token,
        },
        
      })
      .then((res) => {
        useAuthStore().loding = false
        useAuthStore().role = res.data.who;
      })
      .catch((err) => {
        useAuthStore().loding = false
        console.log(err);
        localStorage.removeItem('token');
        this.token = null;
      });
      }
    },
    async login(myemail, mypassword ) {
      useAuthStore().loding = true
      await axios.post("http://127.0.0.1:8000/api/AdminLogin", {
        email: myemail,
        password: mypassword
      })
      .then((res) => {
        
        localStorage.setItem('token', res.data.token);
        this.token = res.data.token;
        this.getadmin();
        router.push('/admin');
      })
      .catch((err) => {
        useAuthStore().loding = false
        this.error = err.response.data.message;
      });
    }
  },
});
