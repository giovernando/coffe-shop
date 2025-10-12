<template>
  <div class="blog-page">
    <h1>Blog & Events</h1>
    <div class="content-toggle">
      <button @click="activeContent = 'blog'" :class="{ active: activeContent === 'blog' }">Blog Posts</button>
      <button @click="activeContent = 'events'" :class="{ active: activeContent === 'events' }">Events</button>
    </div>
    <div v-if="activeContent === 'blog'" class="blog-posts">
      <article v-for="post in blogPosts" :key="post.id" class="blog-post">
        <img :src="post.image" :alt="post.title" />
        <div class="post-content">
          <h2>{{ post.title }}</h2>
          <p class="post-meta">By {{ post.author }} on {{ post.date }}</p>
          <p>{{ post.excerpt }}</p>
          <router-link :to="`/blog/${post.id}`" class="read-more">Read More</router-link>
        </div>
      </article>
    </div>
    <div v-else class="events">
      <div v-for="event in events" :key="event.id" class="event-card">
        <img :src="event.image" :alt="event.title" />
        <div class="event-content">
          <h3>{{ event.title }}</h3>
          <p class="event-date">{{ event.date }}</p>
          <p>{{ event.description }}</p>
          <button @click="rsvp(event)" class="btn rsvp-btn">RSVP</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const activeContent = ref('blog')

const blogPosts = ref([
  {
    id: 1,
    title: 'The Art of Coffee Roasting',
    author: 'Jane Smith',
    date: '2023-10-01',
    excerpt: 'Discover the secrets behind perfect coffee roasting and how it affects your morning brew.',
    image: '/images/blog1.jpg'
  },
  {
    id: 2,
    title: 'Sustainable Coffee Farming',
    author: 'John Doe',
    date: '2023-09-15',
    excerpt: 'Learn about our commitment to sustainable practices in coffee production.',
    image: '/images/blog2.jpg'
  },
  {
    id: 3,
    title: 'Brewing Methods: From French Press to Pour-Over',
    author: 'Alice Johnson',
    date: '2023-08-28',
    excerpt: 'Explore different brewing techniques and find your perfect cup.',
    image: '/images/blog3.jpg'
  }
])

const events = ref([
  {
    id: 1,
    title: 'Coffee Tasting Workshop',
    date: '2023-11-15',
    description: 'Join us for an interactive session exploring different coffee origins and flavors.',
    image: '/images/event1.jpg'
  },
  {
    id: 2,
    title: 'Latte Art Competition',
    date: '2023-12-01',
    description: 'Watch skilled baristas compete in creating stunning latte art designs.',
    image: '/images/event2.jpg'
  },
  {
    id: 3,
    title: 'Holiday Baking Class',
    date: '2023-12-10',
    description: 'Learn to bake festive treats perfect for the holiday season.',
    image: '/images/event3.jpg'
  }
])

const rsvp = (event) => {
  alert(`RSVP confirmed for ${event.title}! We'll send you a confirmation email.`)
}
</script>

<style scoped>
.blog-page {
  max-width: 1000px;
  margin: 0 auto;
}

.content-toggle {
  display: flex;
  margin-bottom: 2rem;
}

.content-toggle button {
  flex: 1;
  padding: 0.75rem;
  background-color: #F5F5DC;
  border: 2px solid #8B4513;
  cursor: pointer;
  transition: all 0.3s;
}

.content-toggle button.active {
  background-color: #8B4513;
  color: #F5F5DC;
}

.blog-posts {
  display: grid;
  gap: 2rem;
}

.blog-post {
  display: flex;
  background-color: white;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.blog-post:hover {
  transform: translateY(-5px);
}

.blog-post img {
  width: 300px;
  height: 200px;
  object-fit: cover;
}

.post-content {
  padding: 1.5rem;
  flex: 1;
}

.post-meta {
  color: #666;
  font-size: 0.9rem;
  margin-bottom: 0.5rem;
}

.read-more {
  color: #8B4513;
  text-decoration: none;
  font-weight: bold;
}

.events {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
  gap: 2rem;
}

.event-card {
  background-color: white;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.event-card:hover {
  transform: translateY(-5px);
}

.event-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.event-content {
  padding: 1.5rem;
}

.event-date {
  color: #8B4513;
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.rsvp-btn {
  margin-top: 1rem;
}

@media (max-width: 768px) {
  .blog-post {
    flex-direction: column;
  }
  .blog-post img {
    width: 100%;
    height: 200px;
  }
  .events {
    grid-template-columns: 1fr;
  }
}
</style>
