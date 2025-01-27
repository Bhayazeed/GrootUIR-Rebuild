<template>
  <nav class="navbar">
    <div class="navbar-left">
      <router-link to="/">
        <img src="../../components/icons/logo.png" alt="GROOT logo" class="logo" />
      </router-link>
    </div>
    <button class="hamburger" @click="toggleMenu">
      <span></span>
      <span></span>
      <span></span>
    </button>
    <ul class="navbar-links" :class="{ 'navbar-links--active': isMenuOpen }">
      <li><router-link to="/">Home</router-link></li>
      <li><router-link to="/about">About</router-link></li>
      <li><router-link to="/activity">Activity</router-link></li>
      <li><router-link to="/projects">Projects</router-link></li>
      <li><router-link to="/teams">Teams</router-link></li>
    </ul>
    <router-link to="/login">
      <button class="login-button">Login</button>
    </router-link>
  </nav>
</template>

<script setup>
import { ref, watch } from 'vue';
import { useRoute } from 'vue-router';

const isMenuOpen = ref(false); // Track whether the menu is open
const route = useRoute(); // Access the current route

// Close the menu when the route changes
watch(() => route.fullPath, () => {
  isMenuOpen.value = false;
});

// Toggle menu visibility
const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};
</script>

<style scoped>
/* General Styles */
.navbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 30px;
  background-color: #fff;
  box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
  width: 100%;
  box-sizing: border-box;
}

.navbar-left {
  display: flex;
  align-items: center;
}

.logo {
  height: 40px;
  margin-right: 15px;
}

.navbar-links {
  display: flex;
  list-style: none;
  margin: 0;
  padding: 0;
}

.navbar-links li {
  margin: 0 15px;
}

.navbar-links a {
  text-decoration: none;
  color: #33308e;
  font-weight: normal;
}

.navbar-links a:hover {
  text-decoration: none;
}

.login-button {
  background-color: #f9a61d;
  color: #fff;
  border: none;
  width: 55px;
  height: 35px;
  font-weight: normal;
  cursor: pointer;
  text-transform: uppercase;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 7px;
}

.login-button:hover {
  background-color: #f9a61d;
}

/* Hamburger Menu */
.hamburger {
  display: none;
  flex-direction: column;
  justify-content: space-between;
  width: 25px;
  height: 20px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 0;
  position: absolute; /* Position the hamburger */
  right: 20px; /* Align it to the right corner */
  top: 20px; /* Adjust the vertical position */
  z-index: 1100; /* Ensure it's above other elements */
}

.hamburger span {
  display: block;
  width: 100%;
  height: 3px;
  background-color: #33308e;
  border-radius: 2px;
}

/* Responsive Design */
@media (max-width: 768px) {
  .navbar {
    width: 100vw; /* Full width of the viewport */
    position: fixed; /* Make the navbar fixed at the top */
    top: 0;
    left: 0;
    z-index: 1100; /* Ensure the navbar stays in front */
  }

  .navbar-links {
    display: none;
    flex-direction: column;
    position: absolute;
    top: 60px;
    right: 20px; /* Align the menu dropdown to the right */
    background-color: #fff;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 10px 0;
    z-index: 1000; /* Ensure the menu is in front */
  }

  .navbar-links li {
    margin: 10px 20px; /* Add some padding for better spacing */
    text-align: left; /* Align the menu items to the left */
  }

  .navbar-links--active {
    display: flex;
  }

  .hamburger {
    display: flex;
    z-index: 1200; /* Ensure the hamburger icon is in front */
    position: absolute;
    right: 20px; /* Keep the hamburger aligned to the right */
    top: 20px;
  }

  .login-button {
    display: none; /* Hides the login button on small screens */
  }
}
</style>
