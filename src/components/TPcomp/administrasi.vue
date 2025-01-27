<template>
  <div class="profile-wrapper">
    <div class="profile-container">
      <!-- Leader Profile Section -->
      <profilcard
        :image="aku"
        name="Fadhlur Rohman"
        title="Software Engineer"
        position="Leader"
        :socialLinks="{
          instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
          linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
        }"
      />

      <!-- Divider Line for Administration Section -->
      <div class="divider">
        <span class="divider-text">ADMINISTRATION</span>
      </div>

      <!-- Treasurer and Secretary Profiles -->
      <div class="admin-row">
        <profilcard
          :image="aku"
          name="Cici"
          title="Software Engineer"
          position="Treasurer"
          :socialLinks="{
            instagram: { url: 'https://instagram.com/johndoe', icon: 'fab fa-instagram' },
            linkedin: { url: 'https://linkedin.com/in/johndoe', icon: 'fab fa-linkedin' },
          }"
        />
        <profilcard
          :image="aku"
          name="Vania"
          title="Software Engineer"
          position="Secretary"
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

/* Flexbox layout for admin roles */
.admin-row {
  display: flex;
  gap: 35px;
  justify-content: center;
  flex-wrap: wrap; /* Allows wrapping of profile cards on smaller screens */
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

/* Responsive styling */
@media (max-width: 768px) {
  .divider-text {
    font-size: 30px; /* Smaller font size for smaller screens */
    padding: 0px 20px; /* Reduced padding */
  }

  .admin-row {
    gap: 20px; /* Reduced gap between cards */
  }

  .profilcard {
    width: 200px; /* Smaller profile cards */
    height: 300px; /* Adjusted height */
  }
}

@media (max-width: 480px) {
  .profile-container {
    gap: 20px; /* Reduced gap between elements */
  }

  .divider-text {
    font-size: 18px; /* Even smaller font size for very small screens */
    padding: 0px 15px; /* Adjusted padding */
  }

  .admin-row {
    gap: 10px; /* Even smaller gap between cards */
    flex-direction: column; /* Stack profile cards vertically */
    align-items: center; /* Center align the profile cards */
  }

  .profilcard {
    width: 180px; /* Further reduced width */
    height: 270px; /* Adjusted height */
  }
}
</style>
