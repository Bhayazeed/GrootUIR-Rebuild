<template>
    <div class="teams-header">
      <h1 class="teams-title">The teams!</h1>
    </div>
    <div class="profile-wrapper">
      <div class="profile-container">
        <!-- Divider Line for Public Relations Section -->
        <div class="divider">
          <span class="divider-text">ADVISOR</span>
        </div>
  
        <!-- Coordinator Profile -->
        <div class="advisor">
          <profilcard
            :image="aku"
            name="Evizal"
            title="Software Engineer"
            position="advisor"
            :socialLinks="{
              instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
              linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
            }"
          />

        </div>
        <div class="divider">
          <span class="divider-text">LEADER</span>
        </div>
      </div>
    </div>
    </template>

<script setup>
import profilcard from '@/assets/accessory/profilcard.vue';
import aku from '@/assets/image/profil.jpg';
</script>

<style scoped>
/* Wrapper for the profile section */
.profile-wrapper {
  padding: 20px;
}

/* Container for profiles, centers content */
.profile-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
  margin: 0 auto;
  gap: 35px; /* Spacing between elements */
}

/* Divider styling with text overlay */
.divider {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 20px;
  background-color: #33308e;
  margin: 10px 0;
  position: relative;
}

.divider-text {
  font-size: 40px;
  font-weight: bold;
  color: #f9a61d;
  background-color: #fff;
  padding: 0px 30px;
  position: absolute;
  letter-spacing: 5px; /* Adds spacing between characters */
}

/* Profile card styling for uniform appearance */
.profilcard {
  width: 250px; /* Fixed width */
  height: 350px; /* Fixed height */
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  margin-bottom: 20px;
}
.advisor {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}
.teams-title {
    font-size: 28px;
    font-weight: bold;
    color: #f9a61d;
    text-align: center;
    margin-top: 20px;
    margin-bottom:40px ;
    max-width: fit-content;
    margin-left: auto;
    margin-right: auto;
    background-color: #33308e;
    padding: 10px;
    line-height: 1.2;
  }
</style>
