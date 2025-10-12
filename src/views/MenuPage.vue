<template>
  <div class="menu-page">
    <h1>Our Menu</h1>
    <div class="menu-controls">
      <div class="filter-buttons">
        <button
          v-for="category in categories"
          :key="category"
          @click="selectedCategory = category"
          :class="{ active: selectedCategory === category }"
          class="filter-btn"
        >
          {{ category }}
        </button>
      </div>
      <input
        v-model="searchQuery"
        type="text"
        placeholder="Search menu items..."
        class="search-input"
      />
    </div>
    <div class="menu-grid">
      <div
        v-for="item in filteredItems"
        :key="item.id"
        class="menu-item"
        @click="selectItem(item)"
      >
        <img :src="item.image" :alt="item.name" />
        <h3>{{ item.name }}</h3>
        <p>{{ item.description }}</p>
        <span class="price">${{ item.price.toFixed(2) }}</span>
        <button @click.stop="addToCart(item)" class="add-to-cart-btn">Add to Cart</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import { useCartStore } from '../stores/cart.js'

const cartStore = useCartStore()

const selectedCategory = ref('All')
const searchQuery = ref('')

const categories = ['All', 'Coffee', 'Tea', 'Pastries', 'Sandwiches']

const menuItems = ref([
  { id: 1, name: 'Espresso', category: 'Coffee', price: 2.50, description: 'Rich and bold espresso shot', image: '/images/espresso.jpg' },
  { id: 2, name: 'Cappuccino', category: 'Coffee', price: 3.50, description: 'Espresso with steamed milk and foam', image: '/images/cappuccino.jpg' },
  { id: 3, name: 'Green Tea', category: 'Tea', price: 2.00, description: 'Refreshing green tea', image: '/images/green-tea.jpg' },
  { id: 4, name: 'Croissant', category: 'Pastries', price: 2.50, description: 'Buttery, flaky croissant', image: '/images/croissant.jpg' },
  { id: 5, name: 'Club Sandwich', category: 'Sandwiches', price: 8.50, description: 'Turkey, bacon, lettuce, tomato', image: '/images/club-sandwich.jpg' },
  // Add more items as needed
])

const filteredItems = computed(() => {
  let items = menuItems.value
  if (selectedCategory.value !== 'All') {
    items = items.filter(item => item.category === selectedCategory.value)
  }
  if (searchQuery.value) {
    items = items.filter(item =>
      item.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
      item.description.toLowerCase().includes(searchQuery.value.toLowerCase())
    )
  }
  return items
})

const selectItem = (item) => {
  // For future customization modal
  console.log('Selected item:', item)
}

const addToCart = (item) => {
  cartStore.addItem({ ...item, quantity: 1, customizations: {} })
  alert(`${item.name} added to cart!`)
}
</script>

<style scoped>
.menu-page {
  max-width: 1200px;
  margin: 0 auto;
}

.menu-controls {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 2rem;
  flex-wrap: wrap;
  gap: 1rem;
}

.filter-buttons {
  display: flex;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.filter-btn {
  padding: 0.5rem 1rem;
  background-color: #F5F5DC;
  border: 2px solid #8B4513;
  border-radius: 5px;
  cursor: pointer;
  transition: all 0.3s;
}

.filter-btn:hover,
.filter-btn.active {
  background-color: #8B4513;
  color: #F5F5DC;
}

.search-input {
  padding: 0.5rem;
  border: 2px solid #8B4513;
  border-radius: 5px;
  width: 250px;
}

.menu-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 2rem;
}

.menu-item {
  background-color: white;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
  cursor: pointer;
}

.menu-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.menu-item img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.menu-item h3 {
  padding: 1rem;
  margin: 0;
}

.menu-item p {
  padding: 0 1rem;
  color: #666;
}

.price {
  display: block;
  padding: 0 1rem;
  font-weight: bold;
  color: #8B4513;
  font-size: 1.2rem;
}

.add-to-cart-btn {
  width: 100%;
  padding: 0.75rem;
  background-color: #8B4513;
  color: #F5F5DC;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s;
}

.add-to-cart-btn:hover {
  background-color: #A0522D;
}

@media (max-width: 768px) {
  .menu-controls {
    flex-direction: column;
    align-items: stretch;
  }
  .search-input {
    width: 100%;
  }
  .menu-grid {
    grid-template-columns: 1fr;
  }
}
</style>
