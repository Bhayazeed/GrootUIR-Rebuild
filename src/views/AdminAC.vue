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
    align-items: flex-start;
    padding-top: 3rem;
    box-sizing: border-box;
  }
  </style>
  