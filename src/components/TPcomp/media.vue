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
          :image="zacky"
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
          :image="syifa "
          name="Syifa"
          title="Software Engineer"
          position="Staff"
          :socialLinks="{
            instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
            linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
          }"
        />
        <profilcard
          :image="tiara"
          name="Tiara"
          title="Software Engineer"
          position="Staff"
          :socialLinks="{
            instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
            linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
          }"
        />
        <profilcard
          :image="anggun"
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
import zacky from '@/assets/image/profilkeren/zacky.png';
import tiara from '@/assets/image/profilkeren/tiara.png';
import syifa from '@/assets/image/profilkeren/syifa.png';
import anggun from '@/assets/image/profilkeren/anggun.png';
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

/* === Footer Section === */
.footer-logo-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 40px;
  width: 100%;
}

.footer-logo-section {
  margin-bottom: 10px;
}

.footer-logo {
  width: 150px;
  height: auto;
}

.motivational-words-section {
  text-align: center;
}

.motivational-words {
  font-size: 18px;
  color: #ffffff;
  font-weight: normal;
}

/* Responsive Styling */
@media (max-width: 768px) {
  .divider-text {
    font-size: 30px; /* Smaller font size for smaller screens */
    padding: 0 20px; /* Reduced padding */
  }

  .coordinator {
    margin-bottom: 15px; /* Reduced margin for smaller screens */
  }

  .staff {
    gap: 20px; /* Reduced gap between staff cards */
    justify-content: center;
  }

  .profilcard {
    width: 200px; /* Smaller profile cards */
    height: 300px; /* Adjusted height */
  }

  .footer-logo {
    width: 120px; /* Smaller logo for smaller screens */
  }

  .motivational-words {
    font-size: 16px; /* Smaller text size for the quote */
  }
}

@media (max-width: 480px) {
  .profile-container {
    gap: 20px; /* Reduced gap between elements */
  }

  .divider-text {
    font-size: 18px; /* Even smaller font size for very small screens */
    padding: 0 15px; /* Adjusted padding */
  }

  .coordinator {
    flex-direction: column; /* Stack coordinator profile vertically */
    align-items: center; /* Center align the profile */
    margin-bottom: 10px; /* Reduced margin */
  }

  .staff {
    flex-direction: column; /* Stack staff profiles vertically */
    align-items: center; /* Center align the profiles */
  }

  .profilcard {
    width: 180px; /* Further reduced width */
    height: 270px; /* Adjusted height */
  }

  .footer-logo {
    width: 100px; /* Further reduced logo size */
  }

  .motivational-words {
    font-size: 14px; /* Further reduced text size for very small screens */
  }
}
</style>