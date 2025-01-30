<template>
  <div id="app">
    <Navbar />
    <main>
      <router-view />
    </main>
    <Footer />
  </div>
</template>

<script setup>
import Navbar from './assets/accessory/navbar.vue';
import Footer from './assets/accessory/footer.vue';

</script>

<style>
body {
  background-color: #ffffff;
  font-family: Poppins;
  margin: 0;
}

#app {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
}

main {
  text-align: center;
  width: 100%;
  padding-top: 60px;
  padding-bottom: 60px; /* Tambahkan padding sesuai tinggi navbar */
}
</style>
