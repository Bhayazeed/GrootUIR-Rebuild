<template>
    <div class="container">
      <post />
      <PJcard />
    </div>
  </template>
  
  <script setup>
  import post from "@/components/Admincomp/Post/postPJ.vue";
  import PJcard from "@/components/Admincomp/card/PJcard.vue";
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
  