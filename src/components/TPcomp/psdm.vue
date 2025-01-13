<template>
  <div class="profile-wrapper">
    <div class="profile-container">
      <!-- Divider Line for Human Resource Section -->
      <div class="divider">
        <span class="divider-text">Human Resource</span>
      </div>

      <!-- Coordinator Profile -->
      <div class="coordinator">
        <profilcard
          :image="aku"
          name="Cipa"
          title="Software Engineer"
          position="Coordinator"
          :socialLinks="{
            instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
            linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
          }"
        />
      </div>

      <!-- Staff Profiles -->
      <div class="staff">
        <profilcard
          :image="aku"
          name="Haiqal"
          title="Software Engineer"
          position="Staff"
          :socialLinks="{
            instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
            linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
          }"
        />
        <profilcard
          :image="aku"
          name="Yona"
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
  width: 100%;
  margin: 0 auto;
  gap: 35px; /* Space between profiles and sections */
}

/* Divider styling with text overlay */
.divider {
  display: flex;
  align-items: center;
  justify-content: space-between; /* Adjusts the alignment */
  width: 100%;
  height: 20px;
  background-color: #33308e;
  margin: 10px 0;
  position: relative;
  padding: 0 0; /* Adds spacing on the sides */
}

.divider-text {
  font-size: 40px;
  font-weight: bold;
  color: #f9a61d;
  background-color: #fff;
  padding: 0 30px;
  position: relative;
  letter-spacing: 5px; /* Adds spacing between characters */
  text-align: right; /* Aligns text to the right */
  margin-left: auto; /* Pushes text to the right side */
}

/* Profile card styling */
.profilcard {
  width: 250px;
  height: 350px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin-bottom: 20px;
}

/* Center the coordinator profile */
.coordinator {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

/* Staff profiles displayed in a horizontal row */
.staff {
  display: flex;
  gap: 35px; /* Space between staff cards */
  justify-content: center;
  flex-wrap: wrap; /* Ensure cards wrap if space is limited */
}
</style>
