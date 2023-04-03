import { createApp } from 'vue'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router'
import VueChartsCSS from "vue.charts.css"

import './assets/main.css'
const pinia = createPinia()
const app = createApp(App)

app.use(router)
app.use(pinia)
app.use(VueChartsCSS)
app.mount('#app')