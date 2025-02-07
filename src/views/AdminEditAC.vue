<template>
    <div class="container">
      <editAC />
    </div>
  </template>
  
  <script setup>
  import editAC from '@/components/Admincomp/edit/editAC.vue';
  </script>
  
  <style scoped>
  .container {
    display: flex;
    flex-direction: column;
    gap: 1rem; 
    justify-content: space-between; 
    align-items: center; 
    padding: 1rem;
    box-sizing: border-box;
  }
  </style>
  