<template>
  <div class="activity-header">
    <h1 class="activity-title">Activity</h1>
  </div>
  <div class="page-container">
    <div class="container">
      <div class="left">
        <maincard
          :image="image1"
          day="27"
          month="Feb"
          title="GROOT IT UIR GOES TO SUMBAR 2020"
          description="This card is highly reusable and flexible."
          buttonText="Read More"
          customClass="custom-card-class"
          :showDateBadge="true"
          :custom-action="navigateToPage"
        />
      </div>
      <div class="right">
        <div class="searchbar-container">
          <searchbar />
        </div>
        <div class="recentpost-container">
          <recentpost :titles="postTitles" :images="postImages" />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import maincard from '../../assets/accessory/maincard.vue';
import recentpost from '../../assets/accessory/recentpost.vue'; 
import searchbar from '../../assets/accessory/searchbar.vue'; 
import image1 from '../../assets/image/galery1.jpg';
import image2 from '../../assets/image/galery2.jpg';
import image3 from '../../assets/image/galery3.jpg';
import image4 from '../../assets/image/galery4.jpg';

const postTitles = [
  "GROOT IT UIR GOES TO SUMBAR",
  "AI CAN CHANGE THE FUTURE FOR THE BETTER OF US",
  "THE WORLD IS BETTER FUTURE AND IS GOOD!",
  "NBA PLAYER YAZIID IS GOING TO SACRAMENTO KINGS!",
];

const postImages = [
  image1,
  image2,
  image3,
  image4
];

import { useRouter } from "vue-router";
const router = useRouter();

function navigateToPage() {
  router.push({ name: "Test" });
}
</script>

<style scoped>
.activity-title {
  font-size: 28px;
  font-weight: bold;
  color: #f9a61d;
  text-align: center;
  margin-top: 20px;
  max-width: fit-content;
  margin-left: auto;
  margin-right: auto;
  background-color: #33308e;
  padding: 10px;
  line-height: 1.2;
}

/* Full-page container */
.page-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100vw;
  padding: 10px;
  box-sizing: border-box;
}

/* Main content container */
.container {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  width: 100%;
  max-width: 1200px;
  gap: 20px;
}

/* Left section styling */
.left {
  flex: 2;
  padding-right: 20px;
  max-width: 100%;
}

/* Right section styling */
.right {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 20px;
  flex: 1;
  max-width: 100%;
}

/* Containers for the searchbar and recentpost */
.searchbar-container, 
.recentpost-container {
  width: 100%;
  max-width: 400px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .activity-title {
    font-size: 24px; /* Adjust the font size for the title */
    padding: 8px;
  }
  
  .searchbar-container, 
  .recentpost-container {
    display: none;
  }

  .container {
    flex-direction: column; /* Stack the left and right sections */
    align-items: center;
  }

  .left {
    padding-right: 0;
    margin-bottom: 20px;
    max-width: 100%;
  }

  .right {
    align-items: center;
    width: 100%;
  }

  .searchbar-container {
    margin-bottom: 20px; /* Add space between searchbar and recent posts */
  }

  /* Resize the main card and adjust for mobile */
  .maincard-class {
    max-width: 100%;
    margin: 0 auto;
  }
}

/* Additional styling for the recent posts and searchbar on smaller screens */
@media (max-width: 480px) {
  .searchbar-container {
    margin-bottom: 10px;
  }

  .recentpost-container {
    margin-top: 10px;
  }

  .activity-title {
    font-size: 22px; /* Further reduce title size on very small screens */
  }
}
</style>
