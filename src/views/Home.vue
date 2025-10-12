<template>
  <section class="hero">
    <div class="hero-content">
      <h1>Welcome to Our Coffee Shop</h1>
      <p>Experience the finest coffee and pastries in a cozy atmosphere.</p>
      <router-link to="/menu" class="btn">Explore Our Menu</router-link>
    </div>
    <div class="hero-image">
      <img src="/images/hero-coffee.jpg" alt="Delicious coffee and pastries" />
    </div>
  </section>

  <section class="features">
    <h2>Why Choose Us?</h2>
    <div class="feature-grid">
      <div class="feature-item">
        <i class="fas fa-coffee"></i>
        <h3>Freshly Brewed Coffee</h3>
        <p>Our beans are sourced from the finest plantations around the world.</p>
      </div>
      <div class="feature-item">
        <i class="fas fa-utensils"></i>
        <h3>Delicious Pastries</h3>
        <p>Baked fresh daily with premium ingredients.</p>
      </div>
      <div class="feature-item">
        <i class="fas fa-wifi"></i>
        <h3>Free Wi-Fi</h3>
        <p>Work or relax with our high-speed internet connection.</p>
      </div>
      <div class="feature-item">
        <i class="fas fa-clock"></i>
        <h3>Extended Hours</h3>
        <p>Open early for your morning coffee and late for evening gatherings.</p>
      </div>
    </div>
  </section>

  <section class="cta">
    <h2>Ready to Visit?</h2>
    <p>Make a reservation or order online for pickup.</p>
    <div class="cta-buttons">
      <router-link to="/reservations" class="btn">Make Reservation</router-link>
      <router-link to="/ordering" class="btn">Order Online</router-link>
    </div>
  </section>
</template>

<script setup>
// No script needed for this component
</script>

<style scoped>
.hero {
  display: flex;
  align-items: center;
  background-color: #8B4513;
  color: #F5F5DC;
  padding: 4rem 2rem;
  min-height: 50vh;
}

.hero-content {
  flex: 1;
  padding-right: 2rem;
}

.hero-content h1 {
  font-size: 3rem;
  margin-bottom: 1rem;
  color: #F5F5DC;
}

.hero-content p {
  font-size: 1.2rem;
  margin-bottom: 2rem;
}

.hero-image {
  flex: 1;
  text-align: center;
}

.hero-image img {
  max-width: 100%;
  height: auto;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.placeholder-image {
  width: 100%;
  height: 300px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  background-color: #f5f5f5;
}

.placeholder-image i {
  font-size: 4rem;
  color: #8B4513;
  margin-bottom: 0.5rem;
}

.placeholder-image p {
  color: #666;
  font-size: 0.9rem;
}

.features {
  padding: 4rem 0;
  background-color: #F5F5DC;
}

.features h2 {
  text-align: center;
  margin-bottom: 3rem;
}

.feature-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
  max-width: 1200px;
  margin: 0 auto;
}

.feature-item {
  text-align: center;
  padding: 2rem;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s, box-shadow 0.3s;
}

.feature-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.feature-item i {
  font-size: 3rem;
  color: #8B4513;
  margin-bottom: 1rem;
}

.cta {
  background-color: #A0522D;
  color: #F5F5DC;
  padding: 4rem 2rem;
  text-align: center;
}

.cta h2 {
  margin-bottom: 1rem;
  color: #F5F5DC;
}

.cta-buttons {
  display: flex;
  justify-content: center;
  gap: 2rem;
  margin-top: 2rem;
}

@media (max-width: 768px) {
  .hero {
    flex-direction: column;
    text-align: center;
    padding: 2rem 1rem;
  }
  .hero-content {
    padding-right: 0;
    margin-bottom: 2rem;
  }
  .hero-content h1 {
    font-size: 2rem;
  }
  .cta-buttons {
    flex-direction: column;
    align-items: center;
  }
}
</style>
