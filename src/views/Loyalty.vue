<template>
  <div class="loyalty-page">
    <h1>Loyalty Program</h1>
    <div v-if="!isLoggedIn" class="auth-section">
      <div class="auth-tabs">
        <button @click="activeTab = 'login'" :class="{ active: activeTab === 'login' }">Login</button>
        <button @click="activeTab = 'register'" :class="{ active: activeTab === 'register' }">Register</button>
      </div>
      <form v-if="activeTab === 'login'" @submit.prevent="login" class="auth-form">
        <h2>Login</h2>
        <div class="form-group">
          <label for="loginEmail">Email:</label>
          <input v-model="loginForm.email" type="email" id="loginEmail" required />
        </div>
        <div class="form-group">
          <label for="loginPassword">Password:</label>
          <input v-model="loginForm.password" type="password" id="loginPassword" required />
        </div>
        <button type="submit" class="btn">Login</button>
      </form>
      <form v-else @submit.prevent="register" class="auth-form">
        <h2>Register</h2>
        <div class="form-group">
          <label for="registerName">Name:</label>
          <input v-model="registerForm.name" type="text" id="registerName" required />
        </div>
        <div class="form-group">
          <label for="registerEmail">Email:</label>
          <input v-model="registerForm.email" type="email" id="registerEmail" required />
        </div>
        <div class="form-group">
          <label for="registerPassword">Password:</label>
          <input v-model="registerForm.password" type="password" id="registerPassword" required />
        </div>
        <button type="submit" class="btn">Register</button>
      </form>
    </div>
    <div v-else class="loyalty-dashboard">
      <div class="user-info">
        <h2>Welcome, {{ user.name }}!</h2>
        <p>Points: {{ user.points }}</p>
        <div class="points-bar">
          <div class="points-fill" :style="{ width: pointsPercentage + '%' }"></div>
          <span class="points-text">{{ user.points }} / 100</span>
        </div>
        <p v-if="user.points >= 100">Congratulations! You can redeem a free coffee!</p>
      </div>
      <div class="loyalty-actions">
        <button @click="earnPoints" class="btn">Earn Points (Simulate Purchase)</button>
        <button v-if="user.points >= 100" @click="redeemReward" class="btn">Redeem Free Coffee</button>
        <button @click="logout" class="btn logout-btn">Logout</button>
      </div>
      <div class="loyalty-benefits">
        <h3>Loyalty Program Benefits</h3>
        <ul>
          <li>Earn 1 point for every $1 spent</li>
          <li>Redeem 100 points for a free coffee</li>
          <li>Exclusive member discounts</li>
          <li>Birthday rewards</li>
          <li>Early access to new menu items</li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

const isLoggedIn = ref(false)
const activeTab = ref('login')
const user = ref({
  name: '',
  email: '',
  points: 0
})

const loginForm = ref({
  email: '',
  password: ''
})

const registerForm = ref({
  name: '',
  email: '',
  password: ''
})

const pointsPercentage = computed(() => {
  return Math.min((user.value.points / 100) * 100, 100)
})

const login = () => {
  // Simulate login
  user.value = {
    name: 'John Doe',
    email: loginForm.value.email,
    points: 75
  }
  isLoggedIn.value = true
  loginForm.value = { email: '', password: '' }
}

const register = () => {
  // Simulate registration
  user.value = {
    name: registerForm.value.name,
    email: registerForm.value.email,
    points: 0
  }
  isLoggedIn.value = true
  registerForm.value = { name: '', email: '', password: '' }
}

const earnPoints = () => {
  user.value.points += 10
  alert('10 points earned!')
}

const redeemReward = () => {
  if (user.value.points >= 100) {
    user.value.points -= 100
    alert('Free coffee redeemed! Enjoy your drink!')
  }
}

const logout = () => {
  isLoggedIn.value = false
  user.value = { name: '', email: '', points: 0 }
}
</script>

<style scoped>
.loyalty-page {
  max-width: 800px;
  margin: 0 auto;
}

.auth-section {
  background-color: white;
  padding: 2rem;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.auth-tabs {
  display: flex;
  margin-bottom: 2rem;
}

.auth-tabs button {
  flex: 1;
  padding: 0.75rem;
  background-color: #F5F5DC;
  border: 2px solid #8B4513;
  cursor: pointer;
  transition: all 0.3s;
}

.auth-tabs button.active {
  background-color: #8B4513;
  color: #F5F5DC;
}

.auth-form {
  max-width: 400px;
  margin: 0 auto;
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
  padding: 0.5rem;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.loyalty-dashboard {
  background-color: white;
  padding: 2rem;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.user-info {
  text-align: center;
  margin-bottom: 2rem;
}

.points-bar {
  width: 100%;
  height: 30px;
  background-color: #eee;
  border-radius: 15px;
  margin: 1rem 0;
  position: relative;
  overflow: hidden;
}

.points-fill {
  height: 100%;
  background-color: #8B4513;
  transition: width 0.3s;
}

.points-text {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
  font-weight: bold;
}

.loyalty-actions {
  display: flex;
  justify-content: center;
  gap: 1rem;
  margin-bottom: 2rem;
  flex-wrap: wrap;
}

.logout-btn {
  background-color: #DC143C;
}

.logout-btn:hover {
  background-color: #B22222;
}

.loyalty-benefits {
  margin-top: 2rem;
}

.loyalty-benefits ul {
  list-style-type: disc;
  padding-left: 2rem;
}

.loyalty-benefits li {
  margin-bottom: 0.5rem;
}

@media (max-width: 768px) {
  .loyalty-actions {
    flex-direction: column;
    align-items: center;
  }
}
</style>
