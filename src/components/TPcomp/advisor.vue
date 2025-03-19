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
          :image="Evizal"
          name="Dr EVIZAL, ST., M.Eng"
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
import Evizal from '@/assets/image/profilkeren/evizal.png';
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

/* Advisor section styling */
.advisor {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

/* Teams title styling */
.teams-title {
  font-size: 28px;
  font-weight: bold;
  color: #f9a61d;
  text-align: center;
  margin-top: 20px;
  margin-bottom: 40px;
  max-width: fit-content;
  margin-left: auto;
  margin-right: auto;
  background-color: #33308e;
  padding: 10px;
  line-height: 1.2;
}

/* Responsive styling */
@media (max-width: 768px) {
  .divider-text {
    font-size: 30px; /* Smaller font size for smaller screens */
    padding: 0px 20px; /* Reduced padding */
  }

  .advisor {
    margin-bottom: 15px; /* Reduced margin for smaller screens */
  }

  .profilcard {
    width: 200px; /* Smaller profile cards */
    height: 300px; /* Adjusted height */
  }

  .teams-title {
    font-size: 24px; /* Smaller font size for title */
    margin-bottom: 30px; /* Reduced bottom margin */
  }
}

@media (max-width: 480px) {
  .profile-container {
    gap: 20px; /* Reduced gap between elements */
  }

  .divider-text {
    font-size: 24px; /* Even smaller font size for very small screens */
    padding: 0px 15px; /* Adjusted padding */
  }

  .advisor {
    flex-direction: column; /* Stack advisor profile vertically */
    align-items: center; /* Center align the profile */
    margin-bottom: 10px; /* Reduced margin */
  }

  .profilcard {
    width: 180px; /* Further reduced width */
    height: 270px; /* Adjusted height */
  }

  .teams-title {
    font-size: 18px; /* Further reduced font size for very small screens */
    margin-bottom: 20px; /* Reduced bottom margin */
  }
}
</style>
