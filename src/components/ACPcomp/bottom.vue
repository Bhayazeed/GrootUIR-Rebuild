<template>
  <div class="page-container">
    <div class="card-grid">
      <Card
        v-for="n in 6"
        :key="n"
        :day="days[n - 1]"
        :month="months[n - 1]"
        :title="titles[n - 1]"
        :description="descriptions[n - 1]"
        :buttonText="'Read More'"
        :headerColor="headerColors[n - 1]"
        :image="images[n - 1]"
        @button-click="handleButtonClick(n)"
      >
        <template #title>
          <h2 class="custom-title">Custom Title {{ n }}</h2>
        </template>
        <template #description>
          <p class="custom-description">This is a custom description for card {{ n }}.</p>
        </template>
        <template #button>
          <button class="custom-button">Read More</button>
        </template>
      </Card>
    </div>
  </div>
</template>

<script setup>
import Card from "@/assets/accessory/card.vue";
import image1 from "@/assets/image/galery1.jpg";
import image2 from "@/assets/image/galery2.jpg";
import image3 from "@/assets/image/galery3.jpg";
import image4 from "@/assets/image/galery4.jpg";
import image5 from "@/assets/image/galery1.jpg";
import image6 from "@/assets/image/galery2.jpg";


// Sample data for the cards
const days = ["01", "02", "03", "04", "05", "06"];
const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun"];
const titles = [
  "Card Title 1",
  "Card Title 2",
  "Card Title 3",
  "Card Title 4",
  "Card Title 5",
  "Card Title 6",
];
const descriptions = [
  "Description for card 1.",
  "Description for card 2.",
  "Description for card 3.",
  "Description for card 4.",
  "Description for card 5.",
  "Description for card 6.",
];
const headerColors = [
  "#1e3a8a",
  "#4a90e2",
  "#e91e63",
  "#009688",
  "#ff5722",
  "#673ab7",
];
const images = [
  image1,
  image2,
  image3,
  image4,
  image5,
  image6,

];

// Handle button click
function handleButtonClick(cardNumber) {
  console.log(`Button clicked on card ${cardNumber}`);
}
</script>

<style scoped>
/* Ensure the page container fills the entire viewport */
.page-container {
  display: flex;
  justify-content: center; /* Center the grid horizontally */
  align-items: center; /* Center the grid vertically */
  height: 100vh; /* Full height of the viewport */
  width: 100vw; /* Full width of the viewport */
  padding: 1rem; /* Padding for spacing on smaller screens */
  box-sizing: border-box; /* Include padding in width/height */
}

/* Grid styles */
.card-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3 columns */
  grid-gap: 1rem; /* Space between cards */
  max-width: 1200px; /* Optional: Limit grid width */
  width: 100%; /* Make the grid responsive */
}

/* Responsive design for smaller screens */
@media (max-width: 768px) {
  .card-grid {
    grid-template-columns: repeat(2, 1fr); /* 2 columns on tablets */
  }
}

@media (max-width: 480px) {
  .card-grid {
    grid-template-columns: 1fr; /* 1 column on smaller screens */
  }
}

/* Custom styles for slots */
.custom-title {
  font-size: 18px;
  color: #33308e;
}

.custom-description {
  font-size: 14px;
  color: #1C1C1C;
}

.custom-button {
  padding: 8px 16px;
  font-size: 14px;
  font-weight: bold;
  color: #33308e;
  background-color: transparent;
  border: 1px solid #f9a61d;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  position: absolute;
  left: 5%;
  bottom: 4px;
}

.custom-button:hover {
  background-color: #f9a61d;
  color: #ffffff;
}
</style>
