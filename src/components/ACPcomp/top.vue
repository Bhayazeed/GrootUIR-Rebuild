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
import recentpost from '../../assets/accessory/recentpost.vue'; // Import the recentpost component
import searchbar from '../../assets/accessory/searchbar.vue'; // Import the searchbar component
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

// Define the custom action to navigate to another page
function navigateToPage() {
  router.push({ name: "Test" }); // Replace 'TargetPage' with your route name or path
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
  justify-content: center; /* Center the container horizontally */
  align-items: center; /* Center the container vertically */
  height: 100vh; /* Full height of the viewport */
  width: 100vw; /* Full width of the viewport */
  padding: 20px; /* Optional: Add padding to prevent content from touching edges */
  box-sizing: border-box; /* Include padding in width/height */
}

/* Main content container */
.container {
  display: flex;
  justify-content: space-between; /* Space out the left and right sections */
  align-items: flex-start; /* Align items at the top */
  width: 100%; /* Take up full width of the page-container */
  max-width: 1200px; /* Optional: Limit the maximum width */
}

/* Left section styling */
.left {
  flex: 2; /* Main card takes up more space */
  padding-right: 20px; /* Space between left and right sections */
}

/* Right section styling */
.right {
  display: flex;
  flex-direction: column; /* Stack the searchbar and recentpost vertically */
  align-items: flex-end; /* Align them to the right */
  gap: 20px; /* Add space between the searchbar and recentpost */
  flex: 1; /* Right section takes up less space */
}

/* Containers for the searchbar and recentpost */
.searchbar-container, 
.recentpost-container {
  width: 100%; /* Full width of the right section */
  max-width: 400px; /* Optionally, set a maximum width for these elements */
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .container {
    flex-direction: column; /* Stack left and right sections vertically */
    align-items: center; /* Center them horizontally */
  }

  .left {
    padding-right: 0; /* Remove padding when stacked */
    margin-bottom: 20px; /* Add space between left and right sections */
  }

  .right {
    align-items: center; /* Center align content in the right section */
  }
}
</style>
