import { defineStore } from 'pinia'
import { ref, computed } from 'vue'

export const useCartStore = defineStore('cart', () => {
  const items = ref([])
  const orderHistory = ref([])

  const total = computed(() => {
    return items.value.reduce((sum, item) => sum + (item.price * item.quantity), 0)
  })

  const addItem = (item) => {
    const existingItem = items.value.find(i => i.id === item.id && JSON.stringify(i.customizations) === JSON.stringify(item.customizations))
    if (existingItem) {
      existingItem.quantity += item.quantity
    } else {
      items.value.push({ ...item })
    }
  }

  const removeItem = (index) => {
    items.value.splice(index, 1)
  }

  const updateQuantity = (index, quantity) => {
    if (quantity <= 0) {
      removeItem(index)
    } else {
      items.value[index].quantity = quantity
    }
  }

  const clearCart = () => {
    items.value = []
  }

  const placeOrder = (orderDetails) => {
    const order = {
      id: Date.now(),
      date: new Date().toISOString(),
      items: [...items.value],
      total: total.value,
      ...orderDetails
    }
    orderHistory.value.push(order)
    clearCart()
    return order
  }

  return {
    items,
    orderHistory,
    total,
    addItem,
    removeItem,
    updateQuantity,
    clearCart,
    placeOrder
  }
})
