<template>
  <div class="reservations-page">
    <h1>Make a Reservation</h1>
    <form @submit.prevent="submitReservation" class="reservation-form">
      <div class="form-group">
        <label for="name">Name:</label>
        <input v-model="reservation.name" type="text" id="name" required />
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input v-model="reservation.email" type="email" id="email" required />
      </div>
      <div class="form-group">
        <label for="phone">Phone:</label>
        <input v-model="reservation.phone" type="tel" id="phone" required />
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input v-model="reservation.date" type="date" id="date" required :min="today" />
      </div>
      <div class="form-group">
        <label for="time">Time:</label>
        <select v-model="reservation.time" id="time" required>
          <option value="">Select a time</option>
          <option v-for="time in availableTimes" :key="time" :value="time">{{ time }}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="guests">Number of Guests:</label>
        <select v-model="reservation.guests" id="guests" required>
          <option value="">Select number of guests</option>
          <option v-for="num in 10" :key="num" :value="num">{{ num }}</option>
        </select>
      </div>
      <div class="form-group">
        <label for="specialRequests">Special Requests:</label>
        <textarea v-model="reservation.specialRequests" id="specialRequests" rows="4"></textarea>
      </div>
      <button type="submit" class="btn">Submit Reservation</button>
    </form>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue'

const reservation = ref({
  name: '',
  email: '',
  phone: '',
  date: '',
  time: '',
  guests: '',
  specialRequests: ''
})

const today = computed(() => {
  const date = new Date()
  return date.toISOString().split('T')[0]
})

const availableTimes = [
  '9:00 AM', '9:30 AM', '10:00 AM', '10:30 AM', '11:00 AM', '11:30 AM',
  '12:00 PM', '12:30 PM', '1:00 PM', '1:30 PM', '2:00 PM', '2:30 PM',
  '3:00 PM', '3:30 PM', '4:00 PM', '4:30 PM', '5:00 PM', '5:30 PM',
  '6:00 PM', '6:30 PM', '7:00 PM', '7:30 PM', '8:00 PM', '8:30 PM', '9:00 PM'
]

const submitReservation = () => {
  // Simulate reservation submission
  alert(`Reservation submitted for ${reservation.value.name} on ${reservation.value.date} at ${reservation.value.time} for ${reservation.value.guests} guests.`)
  // Reset form
  reservation.value = {
    name: '',
    email: '',
    phone: '',
    date: '',
    time: '',
    guests: '',
    specialRequests: ''
  }
}
</script>

<style scoped>
.reservations-page {
  max-width: 600px;
  margin: 0 auto;
}

.reservation-form {
  background-color: white;
  padding: 2rem;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: bold;
  color: #8B4513;
}

.form-group input,
.form-group select,
.form-group textarea {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #ddd;
  border-radius: 5px;
  font-size: 1rem;
}

.form-group textarea {
  resize: vertical;
}

.btn {
  width: 100%;
  padding: 0.75rem;
  background-color: #8B4513;
  color: #F5F5DC;
  border: none;
  border-radius: 5px;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s;
}

.btn:hover {
  background-color: #A0522D;
}
</style>
