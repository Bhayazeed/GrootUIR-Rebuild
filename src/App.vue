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
  background-color: #ffffff; /* Light gray background for contrast */
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
}
</style>
