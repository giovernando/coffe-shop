import { createRouter, createWebHistory } from 'vue-router'
import Home from './views/Home.vue'
import MenuPage from './views/MenuPage.vue'
// import Customization from './views/Customization.vue' // TODO: Create this component
import Ordering from './views/Ordering.vue'
import Reservations from './views/Reservations.vue'
import Gallery from './views/Gallery.vue'
import Loyalty from './views/Loyalty.vue'
import Blog from './views/Blog.vue'
import Feedback from './views/Feedback.vue'
import About from './views/About.vue'

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/menu', name: 'Menu', component: MenuPage },
  // { path: '/customization', name: 'Customization', component: Customization }, // TODO: Enable when component is created
  { path: '/ordering', name: 'Ordering', component: Ordering },
  { path: '/reservations', name: 'Reservations', component: Reservations },
  { path: '/gallery', name: 'Gallery', component: Gallery },
  { path: '/loyalty', name: 'Loyalty', component: Loyalty },
  { path: '/blog', name: 'Blog', component: Blog },
  { path: '/feedback', name: 'Feedback', component: Feedback },
  { path: '/about', name: 'About', component: About }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
