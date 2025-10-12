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
      <router-link to="/loyalty" class="nav-link">Loyalty</router-link>
      <router-link to="/blog" class="nav-link">Blog</router-link>
      <router-link to="/feedback" class="nav-link">Feedback</router-link>
      <router-link to="/about" class="nav-link">About</router-link>
    </nav>
    <div class="cart-icon">
      <router-link to="/ordering">
        <i class="fas fa-shopping-cart"></i>
        <span v-if="cartCount > 0" class="cart-count">{{ cartCount }}</span>
      </router-link>
    </div>
  </header>
</template>

<script setup>
import { computed } from 'vue'
import { useCartStore } from '../stores/cart.js'

const cartStore = useCartStore()
const cartCount = computed(() => cartStore.items.length)
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

@media (max-width: 768px) {
  .nav {
    display: none;
  }
  .header {
    flex-direction: column;
    padding: 1rem;
  }
}
</style>
