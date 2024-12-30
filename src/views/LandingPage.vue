<template>
  <div class="landing-page">
    <!-- Banner Section -->
    <Banner />
    
    <!-- Content Container for Side-by-Side Layout -->
    <div class="content-container">
      <Research />
      <!-- Left Side: Vision and Mission Section -->
      
      <!-- Right Side: Research Section -->
      <VisiMisi />
    </div>
    
    <!-- News Section -->
    <News />
  </div>
</template>

<script setup>
import Banner from '../components/LPcomp/banner.vue';
import Research from '../components/LPcomp/research.vue';
import News from '../components/LPcomp/news.vue';
import VisiMisi from '../components/LPcomp/visimisi.vue';
</script>
