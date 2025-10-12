import { defineStore } from 'pinia'
import { ref } from 'vue'

export const useAuthStore = defineStore('auth', () => {
  const user = ref(null)
  const isAuthenticated = ref(false)

  const login = (email, password) => {
    // Simulate login - in real app, this would call an API
    if (email && password) {
      user.value = { email, name: email.split('@')[0] }
      isAuthenticated.value = true
      localStorage.setItem('user', JSON.stringify(user.value))
      return true
    }
    return false
  }

  const register = (name, email, password) => {
    // Simulate registration - in real app, this would call an API
    if (name && email && password) {
      user.value = { name, email }
      isAuthenticated.value = true
      localStorage.setItem('user', JSON.stringify(user.value))
      return true
    }
    return false
  }

  const logout = () => {
    user.value = null
    isAuthenticated.value = false
    localStorage.removeItem('user')
  }

  const checkAuth = () => {
    const storedUser = localStorage.getItem('user')
    if (storedUser) {
      user.value = JSON.parse(storedUser)
      isAuthenticated.value = true
    }
  }

  return {
    user,
    isAuthenticated,
    login,
    register,
    logout,
    checkAuth
  }
})
