<template>
  <div class="register-page">
    <div class="register-container">
      <h1>Register</h1>
      <form @submit.prevent="handleRegister" class="register-form">
        <div class="form-group">
          <label for="name">Name:</label>
          <input v-model="form.name" type="text" id="name" required />
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input v-model="form.email" type="email" id="email" required />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input v-model="form.password" type="password" id="password" required />
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm Password:</label>
          <input v-model="form.confirmPassword" type="password" id="confirmPassword" required />
        </div>
        <button type="submit" class="btn register-btn">Register</button>
      </form>
      <p class="login-link">
        Already have an account? <router-link to="/login">Login here</router-link>
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
  name: '',
  email: '',
  password: '',
  confirmPassword: ''
})

const handleRegister = () => {
  if (form.value.password !== form.value.confirmPassword) {
    alert('Passwords do not match')
    return
  }

  if (authStore.register(form.value.name, form.value.email, form.value.password)) {
    router.push('/')
  } else {
    alert('Registration failed')
  }
}
</script>

<style scoped>
.register-page {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 80vh;
  padding: 2rem;
}

.register-container {
  background-color: white;
  border-radius: 10px;
  padding: 2rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  max-width: 400px;
  width: 100%;
}

.register-container h1 {
  text-align: center;
  margin-bottom: 2rem;
  color: #8B4513;
}

.register-form {
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

.register-btn {
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

.register-btn:hover {
  background-color: #A0522D;
}

.login-link {
  text-align: center;
  margin-top: 1rem;
}

.login-link a {
  color: #8B4513;
  text-decoration: none;
}

.login-link a:hover {
  text-decoration: underline;
}
</style>
