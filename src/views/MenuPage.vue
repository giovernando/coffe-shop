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

const categories = ['All', 'Coffee', 'Tea', 'Pastries', 'Sandwiches', 'Desserts', 'Breakfast']

const menuItems = ref([
  // Coffee
  { id: 1, name: 'Espresso', category: 'Coffee', price: 2.50, description: 'Rich and bold espresso shot', image: '/images/espresso.jpg' },
  { id: 2, name: 'Cappuccino', category: 'Coffee', price: 3.50, description: 'Espresso with steamed milk and foam', image: '/images/cappuccino.jpg' },
  { id: 3, name: 'Latte', category: 'Coffee', price: 4.00, description: 'Espresso with steamed milk', image: '/images/cappuccino.jpg' },
  { id: 4, name: 'Americano', category: 'Coffee', price: 3.00, description: 'Espresso diluted with hot water', image: '/images/espresso.jpg' },
  { id: 5, name: 'Mocha', category: 'Coffee', price: 4.50, description: 'Espresso with chocolate and steamed milk', image: '/images/cappuccino.jpg' },
  { id: 6, name: 'Macchiato', category: 'Coffee', price: 3.75, description: 'Espresso with a dollop of foam', image: '/images/espresso.jpg' },
  { id: 7, name: 'Cold Brew', category: 'Coffee', price: 3.25, description: 'Smooth, cold-brewed coffee', image: '/images/cappuccino.jpg' },
  { id: 8, name: 'Iced Coffee', category: 'Coffee', price: 3.00, description: 'Chilled coffee over ice', image: '/images/cappuccino.jpg' },

  // Tea
  { id: 9, name: 'Green Tea', category: 'Tea', price: 2.00, description: 'Refreshing green tea', image: '/images/green-tea.jpg' },
  { id: 10, name: 'Black Tea', category: 'Tea', price: 2.00, description: 'Classic black tea', image: '/images/green-tea.jpg' },
  { id: 11, name: 'Chamomile Tea', category: 'Tea', price: 2.25, description: 'Soothing chamomile herbal tea', image: '/images/green-tea.jpg' },
  { id: 12, name: 'Earl Grey Tea', category: 'Tea', price: 2.50, description: 'Bergamot-flavored black tea', image: '/images/green-tea.jpg' },
  { id: 13, name: 'Matcha Latte', category: 'Tea', price: 4.00, description: 'Premium Japanese matcha with milk', image: '/images/cappuccino.jpg' },
  { id: 14, name: 'Iced Tea', category: 'Tea', price: 2.50, description: 'Refreshing iced tea', image: '/images/green-tea.jpg' },

  // Pastries
  { id: 15, name: 'Croissant', category: 'Pastries', price: 2.50, description: 'Buttery, flaky croissant', image: '/images/croissant.jpg' },
  { id: 16, name: 'Blueberry Muffin', category: 'Pastries', price: 3.00, description: 'Fresh blueberry muffin', image: '/images/croissant.jpg' },
  { id: 17, name: 'Chocolate Chip Cookie', category: 'Pastries', price: 2.25, description: 'Chewy chocolate chip cookie', image: '/images/croissant.jpg' },
  { id: 18, name: 'Danish Pastry', category: 'Pastries', price: 3.50, description: 'Flaky danish with fruit filling', image: '/images/croissant.jpg' },
  { id: 19, name: 'Scone', category: 'Pastries', price: 2.75, description: 'Traditional English scone', image: '/images/croissant.jpg' },
  { id: 20, name: 'Cinnamon Roll', category: 'Pastries', price: 3.25, description: 'Sweet cinnamon roll with icing', image: '/images/croissant.jpg' },
  { id: 21, name: 'Éclair', category: 'Pastries', price: 4.00, description: 'Cream-filled pastry with chocolate', image: '/images/croissant.jpg' },
  { id: 22, name: 'Tart', category: 'Pastries', price: 3.75, description: 'Fresh fruit tart', image: '/images/croissant.jpg' },

  // Sandwiches
  { id: 23, name: 'Club Sandwich', category: 'Sandwiches', price: 8.50, description: 'Turkey, bacon, lettuce, tomato', image: '/images/club-sandwich.jpg' },
  { id: 24, name: 'BLT Sandwich', category: 'Sandwiches', price: 7.50, description: 'Bacon, lettuce, tomato', image: '/images/club-sandwich.jpg' },
  { id: 25, name: 'Tuna Salad Sandwich', category: 'Sandwiches', price: 7.00, description: 'Fresh tuna salad on bread', image: '/images/club-sandwich.jpg' },
  { id: 26, name: 'Grilled Cheese', category: 'Sandwiches', price: 6.00, description: 'Melted cheese on grilled bread', image: '/images/club-sandwich.jpg' },
  { id: 27, name: 'Chicken Salad Wrap', category: 'Sandwiches', price: 8.00, description: 'Chicken salad in a tortilla wrap', image: '/images/club-sandwich.jpg' },
  { id: 28, name: 'Vegetarian Panini', category: 'Sandwiches', price: 7.75, description: 'Grilled vegetables and cheese', image: '/images/club-sandwich.jpg' },
  { id: 29, name: 'Turkey Club', category: 'Sandwiches', price: 8.25, description: 'Turkey, avocado, bacon', image: '/images/club-sandwich.jpg' },
  { id: 30, name: 'Caprese Sandwich', category: 'Sandwiches', price: 7.25, description: 'Tomato, mozzarella, basil', image: '/images/club-sandwich.jpg' },

  // Desserts
  { id: 31, name: 'Tiramisu', category: 'Desserts', price: 5.50, description: 'Classic Italian dessert', image: '/images/croissant.jpg' },
  { id: 32, name: 'Cheesecake', category: 'Desserts', price: 5.00, description: 'Creamy New York cheesecake', image: '/images/croissant.jpg' },
  { id: 33, name: 'Chocolate Cake', category: 'Desserts', price: 5.25, description: 'Rich chocolate layer cake', image: '/images/croissant.jpg' },
  { id: 34, name: 'Fruit Salad', category: 'Desserts', price: 4.50, description: 'Fresh seasonal fruit salad', image: '/images/croissant.jpg' },
  { id: 35, name: 'Ice Cream Sundae', category: 'Desserts', price: 4.75, description: 'Vanilla ice cream with toppings', image: '/images/croissant.jpg' },

  // Breakfast
  { id: 36, name: 'Breakfast Burrito', category: 'Breakfast', price: 7.50, description: 'Eggs, cheese, potatoes, salsa', image: '/images/club-sandwich.jpg' },
  { id: 37, name: 'Avocado Toast', category: 'Breakfast', price: 6.50, description: 'Smashed avocado on artisan bread', image: '/images/club-sandwich.jpg' },
  { id: 38, name: 'Oatmeal Bowl', category: 'Breakfast', price: 5.00, description: 'Warm oatmeal with fruits and nuts', image: '/images/croissant.jpg' },
  { id: 39, name: 'Yogurt Parfait', category: 'Breakfast', price: 4.75, description: 'Greek yogurt with granola and berries', image: '/images/croissant.jpg' },
  { id: 40, name: 'Eggs Benedict', category: 'Breakfast', price: 9.00, description: 'Poached eggs on English muffin with hollandaise', image: '/images/club-sandwich.jpg' }
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
