<template>
    <div class="container">
      <post />
      <ACcard />
    </div>
  </template>
  
  <script setup>
  import post from "@/components/Admincomp/Post/postAC.vue";
  import ACcard from "@/components/Admincomp/card/ACcard.vue";
  </script>
  
  <style scoped>
  .container {
    display: flex;
    flex-direction: row;
    gap: 1rem; 
    justify-content: space-between; 
    align-items: center; 
    padding: 1rem;
    box-sizing: border-box;
  }
  </style>
  