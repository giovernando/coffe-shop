<template>
  <div class="feedback-page">
    <h1>Feedback & Reviews</h1>
    <div class="feedback-content">
      <div class="submit-review">
        <h2>Share Your Experience</h2>
        <form @submit.prevent="submitReview" class="review-form">
          <div class="form-group">
            <label for="name">Name:</label>
            <input v-model="newReview.name" type="text" id="name" required />
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input v-model="newReview.email" type="email" id="email" required />
          </div>
          <div class="form-group">
            <label>Rating:</label>
            <div class="star-rating">
              <span
                v-for="star in 5"
                :key="star"
                @click="newReview.rating = star"
                :class="{ active: star <= newReview.rating }"
                class="star"
              >
                ★
              </span>
            </div>
          </div>
          <div class="form-group">
            <label for="review">Review:</label>
            <textarea v-model="newReview.review" id="review" rows="4" required></textarea>
          </div>
          <button type="submit" class="btn">Submit Review</button>
        </form>
      </div>
      <div class="reviews-list">
        <h2>Customer Reviews</h2>
        <div class="review-stats">
          <div class="average-rating">
            <span class="rating-number">{{ averageRating.toFixed(1) }}</span>
            <div class="stars">
              <span v-for="star in 5" :key="star" :class="{ active: star <= Math.round(averageRating) }" class="star">★</span>
            </div>
            <span class="total-reviews">({{ reviews.length }} reviews)</span>
          </div>
        </div>
        <div v-for="review in reviews" :key="review.id" class="review-item">
          <div class="review-header">
            <h4>{{ review.name }}</h4>
            <div class="review-rating">
              <span v-for="star in 5" :key="star" :class="{ active: star <= review.rating }" class="star">★</span>
            </div>
            <span class="review-date">{{ review.date }}</span>
          </div>
          <p>{{ review.review }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

const newReview = ref({
  name: '',
  email: '',
  rating: 0,
  review: ''
})

const reviews = ref([
  {
    id: 1,
    name: 'Sarah Johnson',
    email: 'sarah@example.com',
    rating: 5,
    review: 'Amazing coffee and friendly staff! The latte art is incredible.',
    date: '2023-10-15'
  },
  {
    id: 2,
    name: 'Mike Chen',
    email: 'mike@example.com',
    rating: 4,
    review: 'Great atmosphere and delicious pastries. Will definitely come back!',
    date: '2023-10-10'
  },
  {
    id: 3,
    name: 'Emily Davis',
    email: 'emily@example.com',
    rating: 5,
    review: 'Best coffee shop in town! The espresso is perfect every time.',
    date: '2023-10-05'
  }
])

const averageRating = computed(() => {
  if (reviews.value.length === 0) return 0
  const sum = reviews.value.reduce((acc, review) => acc + review.rating, 0)
  return sum / reviews.value.length
})

const submitReview = () => {
  const review = {
    id: reviews.value.length + 1,
    ...newReview.value,
    date: new Date().toLocaleDateString()
  }
  reviews.value.unshift(review)
  newReview.value = { name: '', email: '', rating: 0, review: '' }
  alert('Thank you for your review!')
}
</script>

<style scoped>
.feedback-page {
  max-width: 1200px;
  margin: 0 auto;
}

.feedback-content {
  display: grid;
  grid-template-columns: 1fr 2fr;
  gap: 3rem;
}

.submit-review {
  background-color: white;
  padding: 2rem;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.review-form {
  max-width: 100%;
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: bold;
}

.form-group input,
.form-group textarea {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.star-rating {
  display: flex;
  gap: 0.25rem;
}

.star {
  font-size: 2rem;
  color: #ddd;
  cursor: pointer;
  transition: color 0.3s;
}

.star.active {
  color: #FFD700;
}

.reviews-list {
  background-color: white;
  padding: 2rem;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.review-stats {
  display: flex;
  align-items: center;
  margin-bottom: 2rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid #eee;
}

.average-rating {
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.rating-number {
  font-size: 2rem;
  font-weight: bold;
  color: #8B4513;
}

.stars {
  display: flex;
}

.total-reviews {
  color: #666;
}

.review-item {
  padding: 1.5rem 0;
  border-bottom: 1px solid #eee;
}

.review-item:last-child {
  border-bottom: none;
}

.review-header {
  display: flex;
  align-items: center;
  gap: 1rem;
  margin-bottom: 0.5rem;
}

.review-rating {
  display: flex;
}

.review-date {
  color: #666;
  font-size: 0.9rem;
}

@media (max-width: 768px) {
  .feedback-content {
    grid-template-columns: 1fr;
  }
}
</style>
