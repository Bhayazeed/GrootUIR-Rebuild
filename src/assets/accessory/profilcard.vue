<template>
  <div class="profile-card">
    <!-- Position Label -->
    <div class="position-label">
      <span>{{ position }}</span>
    </div>

    <!-- Background Layer -->
    <div class="card-background"></div>

    <!-- Content Layer -->
    <div class="card-content">
      <!-- Profile Picture - Tanpa Bentuk Lingkaran -->
      <div class="profile-picture">
        <img :src="image" alt="Profile Picture" />
      </div>

      <!-- Name and Title -->
      <h2>{{ name }}</h2>
      <p>{{ title }}</p>

      <!-- Social Links -->
      <div class="social-links">
        <a v-for="(link, key) in socialLinks" :key="key" :href="link.url" target="_blank" class="social-icon" :class="key">
          <i :class="link.icon"></i>
        </a>
      </div>
    </div>
  </div>
</template>

<script setup>
defineProps({
  image: {
    type: String,
    required: true,
  },
  name: {
    type: String,
    required: true,
  },
  title: {
    type: String,
    required: true,
  },
  position: {
    type: String,
    required: true,
  },
  socialLinks: {
    type: Object,
    required: true,
  },
});
</script>

<style scoped>
/* Card Container */
.profile-card {
  position: relative;
  width: 250px;
  height: 350px;
  margin: 20px;
}

/* Position Label */
.position-label {
  position: absolute;
  top: 0; /* Aligns the label to the top */
  left: 0; /* Aligns the label to the left */
  z-index: 3; /* Ensure it appears above other elements */
  background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
  color: white;
  padding: 5px 10px;
  border-radius: 0 4px 4px 0; /* Rounded edges only on the right side */
  writing-mode: vertical-rl; /* Vertical text */
  text-orientation: mixed; /* Ensure text reads properly */
  font-size: 14px;
  font-weight: bold;
  text-transform: uppercase; /* Optional: Make text uppercase */
  letter-spacing: 2px; /* Add spacing between letters */
}

/* Background Layer */
.card-background {
  position: absolute;
  top: 15px;
  left: 10px;
  width: 100%;
  height: 100%;
  background-color: #f9a825; /* Orange color */
  border-radius: 8px;
  z-index: 1;
  transform: skewY(-5deg);
}

/* Content Layer */
.card-content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, #3f51b5, #673ab7);
  border-radius: 8px;
  z-index: 2;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  color: white;
  text-align: center;
  padding: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

/* Profile Picture - Tanpa Bentuk Lingkaran */
.profile-picture {
  width: 120px;
  height: auto;
  margin-top: 10px;
  /* Menghapus border-radius dan border */
}

.profile-picture img {
  width: 100%;
  height: auto;
  object-fit: cover;
  /* Menghapus semua batasan lingkaran */
}

/* Social Links */
.social-links {
  display: flex;
  gap: 15px;
  margin-bottom: 10px;
}

.social-icon {
  color: white;
  font-size: 1.5rem;
  text-decoration: none;
  transition: transform 0.3s ease, color 0.3s ease;
}

.social-icon:hover {
  transform: scale(1.2);
}

.social-icon.instagram:hover {
  color: #e4405f;
}

.social-icon.linkedin:hover {
  color: #0077b5;
}
</style>