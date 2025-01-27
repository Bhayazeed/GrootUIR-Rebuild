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
/* Ensure the page container takes full height and has space between components */
.page-container {
  display: flex;
  flex-direction: column; /* Arrange top and bottom vertically */
  justify-content: space-between; /* Add space between top and bottom components */
  height: 100vh;
  width: 100vw;
  padding: 25px;
  box-sizing: border-box;
}


/* Grid styles */
.card-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3 columns by default */
  grid-gap: 1rem;
  max-width: 1200px;
  width: 100%;
  margin: 0 auto;
}

/* Responsive design for tablets */
@media (max-width: 768px) {
  .card-grid {
    grid-template-columns: repeat(2, 1fr); /* 2 columns on tablets */
  }
  .custom-title {
    font-size: 16px; /* Adjust the title font size for tablets */
  }
  .custom-description {
    font-size: 12px; /* Adjust the description font size for tablets */
  }
  .custom-button {
    font-size: 14px; /* Adjust the button size for tablets */
    padding: 8px 14px;
    margin-top: 10px; /* Ensure button has space between content */
  }
}

/* Responsive design for small screens (phones) */
@media (max-width: 480px) {
  .card-grid {
    grid-template-columns: 1fr; /* 1 column on smaller screens */
    justify-items: center; /* Center the cards horizontally */
  }
  .custom-title {
    font-size: 14px; /* Adjust the title font size for phones */
  }
  .custom-description {
    font-size: 10px; /* Adjust the description font size for phones */
  }
  .custom-button {
    padding: 6px 12px;
    font-size: 12px; /* Adjust the button size for phones */
    margin-top: 8px; /* Add some margin to avoid collision */
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
  position: relative; /* Adjust button position */
  display: block;
  margin-top: 10px; /* Ensure button doesn't overlap with description */
  width: fit-content; /* Ensure button is sized properly */
}

.custom-button:hover {
  background-color: #f9a61d;
  color: #ffffff;
}
</style>
