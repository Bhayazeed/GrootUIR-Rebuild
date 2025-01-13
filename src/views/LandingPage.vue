<template>
  <div class="landing-page">
    <Banner />
    <div class="content-container">
      <Research />
      <VisiMisi />
    </div>
    <News />
  </div>
</template>

<script setup>
import Banner from '../components/LPcomp/banner.vue';
import Research from '../components/LPcomp/research.vue';
import News from '../components/LPcomp/news.vue';
import VisiMisi from '../components/LPcomp/visimisi.vue';
</script>
