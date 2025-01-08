<template>
    <div class="project-container">
      <Projectcard
        :image="img1"
        title="Project 1"
        description="Write an amazing description in this dedicated card section. Each word counts."
        fullDescription="This is the full article about Project 1. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!"
      />
      <Projectcard
        :image="img2"
        title="Project 2"
        description="Write an amazing description in this dedicated card section. Each word counts."
        fullDescription="This is the full article about Project 2. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!"
      />
      <Projectcard
        :image="img3"
        title="Project 3"
        description="Write an amazing description in this dedicated card section. Each word counts."
        fullDescription="This is the full article about Project 3. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!"
      />
      <Projectcard
        :image="img4"
        title="Project 4"
        description="Write an amazing description in this dedicated card section. Each word counts."
        fullDescription="This is the full article about Project 4. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!"
      />
    </div>
  </template>
  
  <script setup>
  import Projectcard from "../../assets/accessory/projectcard.vue";
  import img1 from "../../assets/image/galery1.jpg";
  import img2 from "../../assets/image/galery2.jpg";
  import img3 from "../../assets/image/galery3.jpg";
  import img4 from "../../assets/image/galery4.jpg";
  </script>
  
  <style scoped>
  /* Ensure the body and html take full height */
  html, body {
    height: 100%;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  
  /* Project container setup */
  .project-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* 2 columns by default */
    gap: 20px; /* space between cards */
    margin: 20px;
    height: 100%; /* take full viewport height */
    width: 100%; /* take full width */
    max-width: 1200px; /* optional: limit the width of the grid */
    justify-items: center; /* center items horizontally */
    align-items: center; /* center items vertically */
    overflow-y: auto; /* ensures content is scrollable if needed */
    padding: 20px;
  }
  
  /* Card styling */
  .project-container .projectcard {
    border-radius: 8px; /* rounded corners for cards */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* shadow for depth */
    overflow: hidden; /* ensures the image doesn't overflow */
    transition: transform 0.3s ease; /* smooth hover effect */
    padding: 20px; /* Add padding inside the card */
    margin-top: 20px; /* Add space above the card */
    margin-bottom: 20px; /* Add space below the card */
    max-width: 100%; /* Ensure the card doesn't exceed its container width */
  }
  
  .project-container .projectcard:hover {
    transform: scale(1.05); /* slightly enlarge on hover */
  }
  
  /* Responsive Styles */
  @media (max-width: 768px) {
    /* For small screens (tablets, phones), display 1 column */
    .project-container {
      grid-template-columns: 1fr; /* 1 column */
    }
  }
  
  @media (max-width: 480px) {
    /* For very small screens (phones), adjust card margins and other spacing */
    .project-container {
      gap: 10px; /* reduce space between cards */
      margin: 10px; /* reduce margin */
    }
  
    .project-container .projectcard {
      padding: 10px; /* optional: reduce padding inside cards */
      margin-top: 10px; /* smaller top margin */
      margin-bottom: 10px; /* smaller bottom margin */
    }
  }
  </style>
  