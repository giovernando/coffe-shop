<template>
  <header class="header">
    <div class="logo">
      <router-link to="/">
        <i class="fas fa-coffee"></i>
        <span>Coffee Shop</span>
      </router-link>
    </div>
    <nav class="nav">
      <router-link to="/" class="nav-link">Home</router-link>
      <router-link to="/menu" class="nav-link">Menu</router-link>
      <router-link to="/ordering" class="nav-link">Order</router-link>
      <router-link to="/reservations" class="nav-link">Reservations</router-link>
      <router-link to="/gallery" class="nav-link">Gallery</router-link>
      <router-link to="/blog" class="nav-link">Blog</router-link>
      <router-link to="/feedback" class="nav-link">Feedback</router-link>
      <router-link to="/about" class="nav-link">About</router-link>
    </nav>
    <div class="auth-section">
      <div v-if="!isAuthenticated" class="auth-links">
        <router-link to="/login" class="nav-link">Login</router-link>
        <router-link to="/register" class="nav-link">Register</router-link>
      </div>
      <div v-else class="user-section">
        <span class="welcome-text">Welcome, {{ user.name }}</span>
        <button @click="logout" class="logout-btn">Logout</button>
      </div>
      <div class="cart-icon">
        <router-link to="/ordering">
          <i class="fas fa-shopping-cart"></i>
          <span v-if="cartCount > 0" class="cart-count">{{ cartCount }}</span>
        </router-link>
      </div>
    </div>
  </header>
</template>

<script setup>
import { computed } from 'vue'
import { useCartStore } from '../stores/cart.js'
import { useAuthStore } from '../stores/auth.js'

const cartStore = useCartStore()
const authStore = useAuthStore()

const cartCount = computed(() => cartStore.items.length)
const isAuthenticated = computed(() => authStore.isAuthenticated)
const user = computed(() => authStore.user)

const logout = () => {
  authStore.logout()
}
</script>

<style scoped>
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 2rem;
  background-color: #8B4513;
  color: #F5F5DC;
  position: sticky;
  top: 0;
  z-index: 100;
}

.logo a {
  display: flex;
  align-items: center;
  text-decoration: none;
  color: #F5F5DC;
  font-size: 1.5rem;
  font-weight: bold;
}

.logo img {
  width: 40px;
  height: 40px;
  margin-right: 0.5rem;
}

.nav {
  display: flex;
  gap: 1rem;
}

.nav-link {
  text-decoration: none;
  color: #F5F5DC;
  padding: 0.5rem 1rem;
  border-radius: 5px;
  transition: background-color 0.3s;
}

.nav-link:hover,
.nav-link.router-link-active {
  background-color: #A0522D;
}

.cart-icon a {
  position: relative;
  color: #F5F5DC;
  font-size: 1.5rem;
}

.cart-count {
  position: absolute;
  top: -10px;
  right: -10px;
  background-color: #DC143C;
  color: white;
  border-radius: 50%;
  padding: 0.2rem 0.5rem;
  font-size: 0.8rem;
}

.auth-section {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.auth-links {
  display: flex;
  gap: 0.5rem;
}

.user-section {
  display: flex;
  align-items: center;
  gap: 1rem;
}

.welcome-text {
  color: #F5F5DC;
  font-weight: bold;
}

.logout-btn {
  background-color: #DC143C;
  color: white;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.logout-btn:hover {
  background-color: #B22222;
}

@media (max-width: 768px) {
  .nav {
    display: none;
  }
  .header {
    flex-direction: column;
    padding: 1rem;
  }
  .auth-section {
    margin-top: 1rem;
  }
}
</style>
