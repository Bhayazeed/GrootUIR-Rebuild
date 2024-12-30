<template>
    <!-- Card Container -->
    <div class="card-container">
      <Card />
      <Card />
      <Card />
    </div>
  </template>
  
  <script setup>
  import Card from '../assets/accessory/card.vue';
  </script>
  
  <style scoped>
  /* Card container to display cards horizontally */
  .card-container {
    display: flex;
    justify-content: space-between; /* Space between cards */
    gap: 20px; /* Optional: Adds space between cards */
    flex-wrap: wrap; /* Ensures cards wrap if the screen is too small */
    padding: 20px;
  }
  
  /* Card styling if needed (optional) */
  .card {
    flex: 1;
    min-width: 300px; /* Minimum width of each card */
    max-width: 350px; /* Optional: You can set a max-width */
    margin: 10px;
  }
  </style>
  