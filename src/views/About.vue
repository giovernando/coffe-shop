<template>
  <div class="about-page">
    <section class="hero-about">
      <h1>About Our Coffee Shop</h1>
      <p>Passionate about serving exceptional coffee and creating memorable experiences since 2010.</p>
    </section>

    <section class="story">
    <div class="story-content">
      <h2>Our Story</h2>
      <p>Founded in 2010, our coffee shop began as a small dream in a cozy corner of the city. What started as a passion for perfectly brewed coffee has grown into a beloved community gathering place. We source our beans directly from sustainable farms around the world, ensuring every cup tells a story of quality and care.</p>
      <p>Our commitment to excellence extends beyond our beverages. We're dedicated to creating an inclusive space where everyone feels welcome, from early morning commuters to afternoon study groups and evening social gatherings.</p>
    </div>
    <img src="/images/about-story.jpg" alt="Our coffee shop story" />
    </section>

    <section class="values">
      <h2>Our Values</h2>
      <div class="values-grid">
        <div class="value-item">
          <i class="fas fa-leaf"></i>
          <h3>Sustainability</h3>
          <p>We prioritize eco-friendly practices, from our biodegradable packaging to our support for fair-trade coffee producers.</p>
        </div>
        <div class="value-item">
          <i class="fas fa-heart"></i>
          <h3>Community</h3>
          <p>Building connections and fostering a sense of belonging in our neighborhood.</p>
        </div>
        <div class="value-item">
          <i class="fas fa-coffee"></i>
          <h3>Quality</h3>
          <p>Every detail matters, from bean selection to the final sip in your cup.</p>
        </div>
        <div class="value-item">
          <i class="fas fa-users"></i>
          <h3>Inclusivity</h3>
          <p>A welcoming space for all, celebrating diversity and creating shared experiences.</p>
        </div>
      </div>
    </section>

    <section class="team">
      <h2>Meet Our Team</h2>
      <div class="team-grid">
        <div class="team-member">
          <img src="/images/team1.jpg" alt="Maria Rodriguez - Head Barista" />
          <h3>Maria Rodriguez</h3>
          <p>Head Barista</p>
          <p>Maria's passion for coffee began during her travels through Italy and Colombia. She brings 8 years of experience to every espresso shot.</p>
        </div>
        <div class="team-member">
          <img src="/images/team2.jpg" alt="Alex Thompson - General Manager" />
          <h3>Alex Thompson</h3>
          <p>General Manager</p>
          <p>Alex oversees our daily operations and ensures every customer leaves with a smile. His background in hospitality shines through in our service.</p>
        </div>
        <div class="team-member">
          <img src="/images/team3.jpg" alt="Lisa Chen - Pastry Chef" />
          <h3>Lisa Chen</h3>
          <p>Pastry Chef</p>
          <p>Lisa's creative pastries are the perfect complement to our coffee. Her innovative recipes keep our menu exciting and delicious.</p>
        </div>
      </div>
    </section>

    <section class="location">
      <h2>Visit Us</h2>
      <div class="location-content">
        <div class="location-info">
          <h3>Address</h3>
          <p>123 Coffee Street<br>City, State 12345</p>
          <h3>Hours</h3>
          <p>Monday - Friday: 6:00 AM - 8:00 PM<br>Saturday - Sunday: 7:00 AM - 9:00 PM</p>
          <h3>Contact</h3>
          <p>Phone: (123) 456-7890<br>Email: info@coffeeshop.com</p>
        </div>
        <div class="map-container">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2412648755255!2d-73.98785368459375!3d40.75889697932781!2m3!1f0!2f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25855c6480299%3A0x55194ec5a1ae072e!2sTimes%20Square!5e0!3m2!1sen!2sus!4v1699123456789!5m2!1sen!2sus"
            width="100%"
            height="300"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            title="Coffee Shop Location"
          ></iframe>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
// No script needed for this component
</script>

<style scoped>
.about-page {
  max-width: 1200px;
  margin: 0 auto;
}

.hero-about {
  background-color: #8B4513;
  color: #F5F5DC;
  padding: 4rem 2rem;
  text-align: center;
  margin-bottom: 3rem;
}

.hero-about h1 {
  font-size: 3rem;
  margin-bottom: 1rem;
}

.hero-about p {
  font-size: 1.2rem;
}

.story {
  display: flex;
  align-items: center;
  gap: 3rem;
  margin-bottom: 4rem;
}

.story-content {
  flex: 1;
}

.story-content h2 {
  margin-bottom: 1rem;
}

.story-content p {
  margin-bottom: 1rem;
  line-height: 1.6;
}

.story img {
  flex: 1;
  width: 100%;
  height: 300px;
  object-fit: cover;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}



.values {
  margin-bottom: 4rem;
}

.values h2 {
  text-align: center;
  margin-bottom: 3rem;
}

.values-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
}

.value-item {
  text-align: center;
  padding: 2rem;
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.value-item i {
  font-size: 3rem;
  color: #8B4513;
  margin-bottom: 1rem;
}

.team {
  margin-bottom: 4rem;
}

.team h2 {
  text-align: center;
  margin-bottom: 3rem;
}

.team-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 2rem;
}

.team-member {
  text-align: center;
  background-color: white;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.team-member img {
  width: 100%;
  height: 250px;
  object-fit: cover;
}

.team-member h3 {
  margin: 1rem 0 0.5rem 0;
}

.team-member p:first-of-type {
  color: #8B4513;
  font-weight: bold;
  margin-bottom: 0.5rem;
}

.team-member p:last-of-type {
  padding: 0 1rem 1rem;
  color: #666;
}

.location {
  margin-bottom: 4rem;
}

.location h2 {
  text-align: center;
  margin-bottom: 3rem;
}

.location-content {
  display: grid;
  grid-template-columns: 1fr 2fr;
  gap: 3rem;
}

.location-info h3 {
  margin: 2rem 0 1rem 0;
  color: #8B4513;
}

.location-info h3:first-child {
  margin-top: 0;
}

.location-info p {
  margin-bottom: 0.5rem;
}

.map-container {
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

@media (max-width: 768px) {
  .hero-about h1 {
    font-size: 2rem;
  }
  .story {
    flex-direction: column;
  }
  .location-content {
    grid-template-columns: 1fr;
  }
}
</style>
