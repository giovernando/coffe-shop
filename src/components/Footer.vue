<template>
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-section">
        <h3>Contact Us</h3>
        <p>123 Coffee Street, City, Country</p>
        <p>Phone: (123) 456-7890</p>
        <p>Email: info@coffeeshop.com</p>
      </div>
      <div class="footer-section">
        <h3>Follow Us</h3>
        <div class="social-links">
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
          <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
      <div class="footer-section">
        <h3>Quick Links</h3>
        <ul>
          <li><router-link to="/menu">Menu</router-link></li>
          <li><router-link to="/reservations">Reservations</router-link></li>
          <li><router-link to="/loyalty">Loyalty Program</router-link></li>
          <li><router-link to="/feedback">Feedback</router-link></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2023 Coffee Shop. All rights reserved.</p>
    </div>
  </footer>
</template>

<script setup>
// No script needed for this component
</script>

<style scoped>
.footer {
  background-color: #8B4513;
  color: #F5F5DC;
  padding: 2rem 0 1rem;
  margin-top: auto;
}

.footer-content {
  display: flex;
  justify-content: space-around;
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
}

.footer-section {
  flex: 1;
  margin: 0 1rem;
}

.footer-section h3 {
  margin-bottom: 1rem;
  color: #F5F5DC;
}

.footer-section p,
.footer-section ul {
  margin: 0.5rem 0;
}

.footer-section ul {
  list-style: none;
  padding: 0;
}

.footer-section a {
  color: #F5F5DC;
  text-decoration: none;
  transition: color 0.3s;
}

.footer-section a:hover {
  color: #A0522D;
}

.social-links {
  display: flex;
  gap: 1rem;
}

.social-links a {
  font-size: 1.5rem;
}

.footer-bottom {
  text-align: center;
  padding: 1rem 0;
  border-top: 1px solid #A0522D;
  margin-top: 2rem;
}

@media (max-width: 768px) {
  .footer-content {
    flex-direction: column;
    text-align: center;
  }
  .footer-section {
    margin: 1rem 0;
  }
}
</style>
