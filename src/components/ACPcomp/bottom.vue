<template>
  <div class="page-container">
    <div class="card-grid">
      <Card
        v-for="n in 6"
        :key="n"
        class="card-item" 
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
import { ref, onMounted } from "vue";
import Card from "@/assets/accessory/card.vue";
import image1 from "@/assets/image/galery1.jpg";
import image2 from "@/assets/image/galery2.jpg";
import image3 from "@/assets/image/galery3.jpg";
import image4 from "@/assets/image/galery4.jpg";
import image5 from "@/assets/image/galery1.jpg";
import image6 from "@/assets/image/galery2.jpg";

// Data untuk card
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
const images = [image1, image2, image3, image4, image5, image6];

// Handle button click
function handleButtonClick(cardNumber) {
  console.log(`Button clicked on card ${cardNumber}`);
}

// Efek animasi saat scroll menggunakan IntersectionObserver
onMounted(() => {
  const cards = document.querySelectorAll(".card-item");
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    },
    { threshold: 0.2 }
  );

  cards.forEach((card) => observer.observe(card));
});
</script>

<style scoped>
/* Pastikan html dan body memiliki tinggi 100% agar min-height dapat berfungsi dengan baik */
html, body {
  margin: 0;
  padding: 0;
  height: 100%;
}

/* Container utama diberikan min-height dengan mengurangi tinggi footer (misalnya 100px) */
.page-container {
  min-height: calc(100vh - 100px); /* Sesuaikan 100px dengan tinggi footer Anda */
  padding: 25px;
  box-sizing: border-box;
}

/* Grid untuk card */
.card-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr); /* 3 kolom secara default */
  grid-gap: 1rem;
  max-width: 1200px;
  width: 100%;
  margin: 0 auto;
}

/* Efek fade-in untuk card */
.card-item {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.card-item.visible {
  opacity: 1;
  transform: translateY(0);
}

/* Responsive design untuk tablet */
@media (max-width: 768px) {
  .card-grid {
    grid-template-columns: repeat(2, 1fr); /* 2 kolom pada tablet */
  }
  .custom-title {
    font-size: 16px;
  }
  .custom-description {
    font-size: 12px;
  }
  .custom-button {
    font-size: 14px;
    padding: 8px 14px;
    margin-top: 10px;
  }
}

/* Responsive design untuk ponsel */
@media (max-width: 480px) {
  .card-grid {
    grid-template-columns: 1fr; /* 1 kolom pada layar kecil */
    justify-items: center;
  }
  .custom-title {
    font-size: 14px;
  }
  .custom-description {
    font-size: 10px;
  }
  .custom-button {
    padding: 6px 12px;
    font-size: 12px;
    margin-top: 8px;
  }
}

/* Custom styles untuk slot konten card */
.custom-title {
  font-size: 18px;
  color: #33308e;
}

.custom-description {
  font-size: 14px;
  color: #1c1c1c;
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
  display: block;
  margin-top: 10px;
  width: fit-content;
}

.custom-button:hover {
  background-color: #f9a61d;
  color: #ffffff;
}
</style>