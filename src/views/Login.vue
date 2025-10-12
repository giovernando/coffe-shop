<template>
  <div class="login-page">
    <div class="login-container">
      <h1>Login</h1>
      <form @submit.prevent="handleLogin" class="login-form">
        <div class="form-group">
          <label for="email">Email:</label>
          <input v-model="form.email" type="email" id="email" required />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input v-model="form.password" type="password" id="password" required />
        </div>
        <button type="submit" class="btn login-btn">Login</button>
      </form>
      <p class="register-link">
        Don't have an account? <router-link to="/register">Register here</router-link>
      </p>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '../stores/auth.js'

const router = useRouter()
const authStore = useAuthStore()

const form = ref({
  email: '',
  password: ''
})

const handleLogin = () => {
  if (authStore.login(form.value.email, form.value.password)) {
    router.push('/')
  } else {
    alert('Invalid credentials')
  }
}
</script>

<style scoped>
.login-page {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 80vh;
  padding: 2rem;
}

.login-container {
  background-color: white;
  border-radius: 10px;
  padding: 2rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 100%;
}

.login-container h1 {
  text-align: center;
  margin-bottom: 2rem;
  color: #8B4513;
}

.login-form {
  display: flex;
  flex-direction: column;
}

.form-group {
  margin-bottom: 1rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: bold;
}

.form-group input {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 1rem;
}

.login-btn {
  width: 100%;
  margin-top: 1rem;
  padding: 0.75rem;
  background-color: #8B4513;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 1rem;
}

.login-btn:hover {
  background-color: #A0522D;
}

.register-link {
  text-align: center;
  margin-top: 1rem;
}

.register-link a {
  color: #8B4513;
  text-decoration: none;
}

.register-link a:hover {
  text-decoration: underline;
}
</style>
