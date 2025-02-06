<template>
  <div id="app">
    <component v-if="!hideNavbar" :is="currentNavbar" />
    
    <main>
      <router-view />
    </main>
    
    <Footer v-if="!hideNavbar && !isAdminRoute" />
  </div>
</template>

<script setup>
import { computed } from 'vue'
import { useRoute } from 'vue-router'
import PublicNavbar from './assets/accessory/PublicNavbar.vue'
import AdminNavbar from './assets/accessory/AdminNavbar.vue'
import Footer from './assets/accessory/footer.vue'

const route = useRoute()

const isAdminRoute = computed(() => route.path.startsWith('/admin'))

const hideNavbar = computed(() => {
  return route.name === 'Login'
})

const currentNavbar = computed(() => (isAdminRoute.value ? AdminNavbar : PublicNavbar))
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
