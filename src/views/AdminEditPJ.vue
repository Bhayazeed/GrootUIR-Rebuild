<template>
    <div class="container">
      <editPJ />
    </div>
  </template>
  
  <script setup>
  import editPJ from '@/components/Admincomp/edit/editPJ.vue';
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
  