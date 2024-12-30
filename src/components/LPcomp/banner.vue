<template>
<div class="landing-page">
    <div class="content-container">
      <!-- Banner Section -->
      <div class="banner">
        <img src="../../components/icons/mascoot.png" alt="GROOT Logo" class="logo" />
      </div>

      <!-- Tagline and Description Sections -->
      <div class="text-section">
        <div class="tagline-section">
          <h1 class="tagline">ROBOTIC AUTOMATION & WIRELESS RESEARCH</h1>
        </div>
        <div class="description-section">
          <p class="text-description">
            Nurturing Creativity and Innovation also Supporting students in overcoming challenges and exploring robotics technology.
          </p>
          <ReadMore buttonText="Read More" arrow="↓" :customAction="scrollToBottom"/>
        </div>
      </div>
    </div>
    </div>
</template>

<script setup>
import ReadMore from '../../assets/accessory/btnread.vue';
const scrollToBottom = () => {
  window.scrollTo({ top: 800, behavior: 'smooth' });
};
</script>

<style scoped>
/* General Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Landing Page Container */
.landing-page {
  width: 100%;
  background: #ffffff; /* Solid background with 30% opacity */
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 20px;
  flex-direction: column; /* Stack content vertically */
}

/* Content Container for Side-by-Side Layout */
.content-container {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
  max-width: 1200px;
  width: 100%;
  margin-bottom: 80px; /* Increased space between sections */
}

/* Banner Section */
.banner {
  flex: 1; /* Take up equal space */
  display: flex;
  align-items: center;
  justify-content: center;
}

.logo {
  width: 100%; /* Full width for the banner */
  max-width: 500px; /* Larger size for the banner */
  height: auto; /* Maintain aspect ratio */
}

/* Text Section */
.text-section {
  flex: 1; /* Take up equal space */
  display: flex;
  flex-direction: column;
  justify-content: center;
  gap: 20px; /* Space between tagline and description */
}

/* Tagline Section */
.tagline-section {
  text-align: left;
  padding: 20px;
  background-color: #33308e; /* Blue background for emphasis */
}

.tagline {
  font-size: 36px; /* Larger font size for tagline */
  font-weight: bold;
  text-transform: uppercase;
  color: #f9a61d; /* Yellow text for contrast */
  letter-spacing: 10px; /* Increased letter spacing */
  /* No shadow applied here */
}

/* Description Section */
.description-section {
  text-align: left;
  padding: 20px;
  color: #33308e; /* Darker text for readability */
  border-radius: 5px; /* Rounded corners */
}

.text-description {
  font-size: 18px; /* Font size for description */
  line-height: 1.6;
  color: #33308e;
  font-weight: bold;
  padding-bottom: 30px;
}
/* Responsive Design */
@media (max-width: 768px) {
  .content-container {
    flex-direction: column; /* Stack sections vertically */
  }

  .banner {
    flex: none;
    width: 100%; /* Full width on smaller screens */
    text-align: center; /* Center the banner */
  }

  .logo {
    max-width: 400px; /* Adjust logo size */
  }

  .text-section {
    gap: 15px; /* Adjust gap on smaller screens */
  }

  .tagline {
    font-size: 28px; /* Reduce tagline size */
  }

  .text-description {
    font-size: 16px; /* Reduce description size */
  }

  /* Adjust the new section layout for smaller screens */
  .photo-description-section {
    flex-direction: column; /* Stack the photos and description */
  }

  .photo-description-item {
    width: 80%; /* Adjust item width on smaller screens */
    margin-bottom: 20px;
  }

  .photo-image {
    width: 100%; /* Adjust photo size on smaller screens */
  }

  .description {
    width: 100%; /* Make description full width on smaller screens */
  }
}
</style>