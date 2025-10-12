<template>
  <div class="ordering-page">
    <div class="order-tabs">
      <button @click="activeTab = 'cart'" :class="{ active: activeTab === 'cart' }">Current Order</button>
      <button @click="activeTab = 'history'" :class="{ active: activeTab === 'history' }">Order History</button>
    </div>
    <div v-if="activeTab === 'cart'">
      <h1>Your Order</h1>
      <div v-if="cartStore.items.length === 0" class="empty-cart">
        <p>Your cart is empty. <router-link to="/menu">Browse our menu</router-link> to add items.</p>
      </div>
      <div v-else class="order-content">
        <div class="cart-items">
          <div
            v-for="(item, index) in cartStore.items"
            :key="index"
            class="cart-item"
          >
            <img :src="item.image" :alt="item.name" />
            <div class="item-details">
              <h3>{{ item.name }}</h3>
              <p>${{ item.price.toFixed(2) }}</p>
              <div class="quantity-controls">
                <button @click="cartStore.updateQuantity(index, item.quantity - 1)">-</button>
                <span>{{ item.quantity }}</span>
                <button @click="cartStore.updateQuantity(index, item.quantity + 1)">+</button>
              </div>
            </div>
            <button @click="cartStore.removeItem(index)" class="remove-btn">Remove</button>
          </div>
        </div>
        <div class="order-summary">
          <h2>Order Summary</h2>
          <p>Subtotal: ${{ cartStore.total.toFixed(2) }}</p>
          <p>Tax: ${{ (cartStore.total * 0.08).toFixed(2) }}</p>
          <p class="total">Total: ${{ (cartStore.total * 1.08).toFixed(2) }}</p>
          <form @submit.prevent="placeOrder" class="order-form">
            <h3>Delivery Information</h3>
            <div class="form-group">
              <label for="name">Name:</label>
              <input v-model="orderForm.name" type="text" id="name" required />
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input v-model="orderForm.email" type="email" id="email" required />
            </div>
            <div class="form-group">
              <label for="phone">Phone:</label>
              <input v-model="orderForm.phone" type="tel" id="phone" required />
            </div>
            <div class="form-group">
              <label for="address">Address:</label>
              <textarea v-model="orderForm.address" id="address" required></textarea>
            </div>
            <div class="form-group">
              <label for="orderType">Order Type:</label>
              <select v-model="orderForm.orderType" id="orderType">
                <option value="pickup">Pickup</option>
                <option value="delivery">Delivery</option>
              </select>
            </div>
            <button type="submit" class="btn place-order-btn">Place Order</button>
          </form>
        </div>
      </div>
    </div>
    <div v-else-if="activeTab === 'history'">
      <h1>Order History</h1>
      <div v-if="cartStore.orderHistory.length === 0" class="empty-history">
        <p>You haven't placed any orders yet.</p>
      </div>
      <div v-else class="order-history">
        <div
          v-for="order in cartStore.orderHistory"
          :key="order.id"
          class="order-card"
        >
          <h3>Order #{{ order.id }}</h3>
          <p><strong>Date:</strong> {{ new Date(order.date).toLocaleDateString() }}</p>
          <p><strong>Total:</strong> ${{ order.total.toFixed(2) }}</p>
          <p><strong>Items:</strong></p>
          <ul>
            <li v-for="item in order.items" :key="item.id">
              {{ item.quantity }}x {{ item.name }} - ${{ (item.price * item.quantity).toFixed(2) }}
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useCartStore } from '../stores/cart.js'

const cartStore = useCartStore()
const activeTab = ref('cart')

const orderForm = ref({
  name: '',
  email: '',
  phone: '',
  address: '',
  orderType: 'pickup'
})

const placeOrder = () => {
  // Place order and add to history
  const order = cartStore.placeOrder(orderForm.value)
  alert(`Order placed successfully! Order ID: ${order.id}. You will receive a confirmation email shortly.`)
  orderForm.value = {
    name: '',
    email: '',
    phone: '',
    address: '',
    orderType: 'pickup'
  }
}
</script>

<style scoped>
.ordering-page {
  max-width: 1200px;
  margin: 0 auto;
}

.empty-cart {
  text-align: center;
  padding: 4rem 0;
}

.order-content {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: 2rem;
}

.cart-items {
  background-color: white;
  border-radius: 10px;
  padding: 2rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.cart-item {
  display: flex;
  align-items: center;
  padding: 1rem 0;
  border-bottom: 1px solid #eee;
}

.cart-item:last-child {
  border-bottom: none;
}

.cart-item img {
  width: 80px;
  height: 80px;
  object-fit: cover;
  border-radius: 5px;
  margin-right: 1rem;
}

.item-details {
  flex: 1;
}

.item-details h3 {
  margin: 0 0 0.5rem 0;
}

.quantity-controls {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  margin-top: 0.5rem;
}

.quantity-controls button {
  width: 30px;
  height: 30px;
  border: 1px solid #8B4513;
  background-color: white;
  cursor: pointer;
}

.remove-btn {
  background-color: #DC143C;
  color: white;
  border: none;
  padding: 0.5rem 1rem;
  border-radius: 5px;
  cursor: pointer;
}

.order-summary {
  background-color: white;
  border-radius: 10px;
  padding: 2rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  height: fit-content;
}

.order-summary h2 {
  margin-bottom: 1rem;
}

.total {
  font-weight: bold;
  font-size: 1.2rem;
  color: #8B4513;
}

.order-form {
  margin-top: 2rem;
}

.form-group {
  margin-bottom: 1rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: bold;
}

.form-group input,
.form-group textarea,
.form-group select {
  width: 100%;
  padding: 0.5rem;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.place-order-btn {
  width: 100%;
  margin-top: 1rem;
}

.order-tabs {
  display: flex;
  margin-bottom: 2rem;
}

.order-tabs button {
  flex: 1;
  padding: 0.75rem;
  background-color: #F5F5DC;
  border: 2px solid #8B4513;
  cursor: pointer;
  transition: all 0.3s;
}

.order-tabs button.active {
  background-color: #8B4513;
  color: #F5F5DC;
}

.empty-history {
  text-align: center;
  padding: 4rem 0;
}

.order-history {
  display: grid;
  gap: 2rem;
}

.order-card {
  background-color: white;
  border-radius: 10px;
  padding: 2rem;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.order-card h3 {
  margin-bottom: 1rem;
  color: #8B4513;
}

.order-card ul {
  list-style-type: none;
  padding: 0;
}

.order-card li {
  padding: 0.5rem 0;
  border-bottom: 1px solid #eee;
}

.order-card li:last-child {
  border-bottom: none;
}

@media (max-width: 768px) {
  .order-content {
    grid-template-columns: 1fr;
  }
}
</style>
