<template>
    <div class="page-container">
      <div class="card-grid">
        <Card v-for="n in 6" :key="n" />
      </div>
    </div>
  </template>
  
  <script setup>
  import Card from '@/assets/accessory/card.vue';
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
  </style>
  