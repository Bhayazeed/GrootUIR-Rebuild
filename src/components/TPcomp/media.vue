<template>
  <div class="profile-wrapper">
    <div class="profile-container">
      <!-- Divider Line for Media & Information Section -->
      <div class="divider">
        <span class="divider-text">Media & Information</span>
      </div>
      <div class="coordinator">
        <!-- Coordinator Profile -->
        <profilcard
          :image="aku"
          name="Zacky"
          title="Software Engineer"
          position="Coordinator"
          :socialLinks="{
            instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
            linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
          }"
        />
      </div>
      <div class="staff">
        <!-- Staff Profiles -->
        <profilcard
          :image="aku"
          name="Syifa"
          title="Software Engineer"
          position="Staff"
          :socialLinks="{
            instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
            linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
          }"
        />
        <profilcard
          :image="aku"
          name="Tiara"
          title="Software Engineer"
          position="Staff"
          :socialLinks="{
            instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
            linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
          }"
        />
        <profilcard
          :image="aku"
          name="Anggun"
          title="Software Engineer"
          position="Staff"
          :socialLinks="{
            instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
            linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
          }"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
import profilcard from '@/assets/accessory/profilcard.vue';
import aku from '@/assets/image/profil.jpg';
</script>

<style scoped>
/* Wrapper for the entire profile section */
.profile-wrapper {
  padding: 20px; /* Adds padding around the section */
}

/* Container for profiles, centers and spaces elements */
.profile-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  margin: 0 auto;
  gap: 35px; /* Space between profiles and sections */
}

/* Divider styling with text overlay */
.divider {
  display: flex;
  align-items: center;
  justify-content: flex-start; /* Aligns content to the left */
  width: 100%;
  height: 20px;
  background-color: #33308e;
  margin: 10px 0;
  position: relative;
  padding: 0 0; /* Adds padding on the left */
}

.divider-text {
  font-size: 40px;
  font-weight: bold;
  color: #f9a61d;
  background-color: #fff;
  padding: 0 30px;
  position: relative;
  letter-spacing: 5px; /* Adds spacing between characters */
  text-align: left; /* Aligns text to the left */
}

/* Uniform styling for profile cards */
.profilcard {
  width: 250px; /* Fixed width for all cards */
  height: 350px; /* Fixed height for all cards */
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin-bottom: 20px; /* Space below each card */
}

/* Center the coordinator profile */
.coordinator {
  display: flex;
  justify-content: center;
  margin-bottom: 20px; /* Add spacing below coordinator */
}

/* Staff profiles displayed in a horizontal row */
.staff {
  display: flex;
  gap: 35px; /* Space between staff cards */
  justify-content: center;
  flex-wrap: wrap; /* Ensure cards wrap if space is limited */
}
</style>
