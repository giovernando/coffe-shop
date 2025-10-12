import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router'
import { createPinia } from 'pinia'
import App from './App.vue'
import router from './router.js'
import { useAuthStore } from './stores/auth.js'

const app = createApp(App)
const pinia = createPinia()

app.use(router)
app.use(pinia)

// Check authentication on app start
const authStore = useAuthStore()
authStore.checkAuth()

app.mount('#app')
