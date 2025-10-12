<template>
  <div class="gallery-page">
    <h1>Gallery</h1>
    <div class="gallery-grid">
      <div
        v-for="(image, index) in galleryImages"
        :key="index"
        class="gallery-item"
        @click="openLightbox(index)"
      >
        <img :src="image.src" :alt="image.alt" />
      </div>
    </div>

    <!-- Lightbox -->
    <div v-if="lightboxOpen" class="lightbox" @click="closeLightbox">
      <div class="lightbox-content">
        <img :src="currentImage.src" :alt="currentImage.alt" />
        <button @click.stop="prevImage" class="nav-btn prev"><</button>
        <button @click.stop="nextImage" class="nav-btn next">></button>
        <button @click.stop="closeLightbox" class="close-btn">&times;</button>
      </div>
    </div>

    <div class="virtual-tour">
      <h2>Virtual Tour</h2>
      <div class="tour-container">
      <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2412648755255!2d-73.98785368459375!3d40.75889697932781!2m3!1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1699123456789!5m2!1sen!2sus"
          width="100%"
          height="400"
          style="border:0;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'

const lightboxOpen = ref(false)
const currentIndex = ref(0)

const galleryImages = ref([
  { src: '/images/gallery1.jpg', alt: 'Coffee shop interior' },
  { src: '/images/gallery2.jpg', alt: 'Barista preparing coffee' },
  { src: '/images/gallery3.jpg', alt: 'Delicious pastries display' },
  { src: '/images/gallery4.jpg', alt: 'Cozy seating area' },
  { src: '/images/gallery5.jpg', alt: 'Coffee beans' },
  { src: '/images/gallery6.jpg', alt: 'Customer enjoying coffee' },
  // Add more images as needed
])

const currentImage = ref(galleryImages.value[0])

const openLightbox = (index) => {
  currentIndex.value = index
  currentImage.value = galleryImages.value[index]
  lightboxOpen.value = true
}

const closeLightbox = () => {
  lightboxOpen.value = false
}

const prevImage = () => {
  currentIndex.value = (currentIndex.value - 1 + galleryImages.value.length) % galleryImages.value.length
  currentImage.value = galleryImages.value[currentIndex.value]
}

const nextImage = () => {
  currentIndex.value = (currentIndex.value + 1) % galleryImages.value.length
  currentImage.value = galleryImages.value[currentIndex.value]
}
</script>

<style scoped>
.gallery-page {
  max-width: 1200px;
  margin: 0 auto;
}

.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 1rem;
  margin-bottom: 3rem;
}

.gallery-item {
  cursor: pointer;
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.gallery-item:hover {
  transform: scale(1.05);
}

.gallery-item img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.lightbox {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.9);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.lightbox-content {
  position: relative;
  max-width: 90%;
  max-height: 90%;
}

.lightbox-content img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}

.nav-btn,
.close-btn {
  position: absolute;
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  font-size: 2rem;
  cursor: pointer;
  padding: 0.5rem;
  border-radius: 50%;
  transition: background-color 0.3s;
}

.nav-btn:hover,
.close-btn:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

.prev {
  top: 50%;
  left: -50px;
  transform: translateY(-50%);
}

.next {
  top: 50%;
  right: -50px;
  transform: translateY(-50%);
}

.close-btn {
  top: -50px;
  right: 0;
  font-size: 3rem;
}

.virtual-tour {
  margin-top: 3rem;
}

.tour-container {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

@media (max-width: 768px) {
  .nav-btn {
    display: none;
  }
  .lightbox-content {
    max-width: 95%;
    max-height: 95%;
  }
}
</style>
