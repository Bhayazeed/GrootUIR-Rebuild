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
    flex-direction: row;
    gap: 2rem;
    justify-content: space-between; 
    align-items: flex-start; 
    box-sizing: border-box;
    margin-top: 50px;
  }
  </style>
  