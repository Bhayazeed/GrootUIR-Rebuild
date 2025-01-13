<template>
  <nav class="navbar">
    <div class="navbar-left">
      <router-link to="/">
      <img src="../../components/icons/logo.png" alt="GROOT logo" class="logo" />
    </router-link>
    </div>
      <ul class="navbar-links">
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
// No changes to the script section since no interactivity was described
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
  height: 40px; /* Adjusted to match the image */
  margin-right: 15px;
  display: flex;
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
  color: #33308e; /* Dark blue for links */
  font-weight:normal;
}

.navbar-links a:hover {
  text-decoration:none;
}


.login-button {
  background-color: #f9a61d; /* Orange matching the image */
  color: #fff;
  border: none;
  width: 55px; /* Fixed width for a square */
  height: 35px; /* Fixed height for a square */
  font-weight: normal;
  cursor: pointer;
  text-transform: uppercase;
  display: flex; /* Center the text inside the button */
  justify-content: center; /* Center horizontally */
  align-items: center; /* Center vertically */
  border-radius: 7px; /* Ensure square corners */
}


.login-button:hover {
  background-color: #f9a61d; /* Slightly darker orange */
}

/* Responsive Design */
@media (max-width: 768px) {
  .navbar-links {
    display: none; /* Hide links on small screens */
  }

  .login-button {
    font-size: 14px; /* Adjust button size */
  }
}
</style>
