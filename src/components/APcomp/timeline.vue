<template>
    <!-- Timeline Header -->
    <div class="timeline-header">
      <h1 class="timeline-title">Timeline</h1>
      <h2 class="timeline-deskripsi">A Quick Timeline of Our Journey as a Community</h2>
    </div>
    <div class="timeline-container">
      
      <!-- Vertical Line -->
      <div class="timeline-line"></div>
  
      <!-- Timeline Items -->
  
      <!-- Timeline Item: 2018 -->
      <div class="timeline-item">
        <!-- Year Label -->
        <div class="year-label">2018</div>
        <div class="timeline-content">
          <!-- Image Section -->
          <div class="content-image">
            <p class="content-date">November 24, 2018</p>
            <img src="@/assets/image/pertama.jpg" alt="Robotic Automation" />
          </div>
          <!-- Description Section -->
          <div class="content-description">
            <h3 class="content-title">Robotic Automation and Wireless Research Created</h3>
            <p class="content-text">
              Robotic Automation and Wireless Research Laboratory is a research unit under the auspices of Universitas Islam Riau (UIR). The laboratory was established at the initiative of Dr. Evizal, S.T., M.Eng., with Jerry Saputra as its first chairman.
            </p>
          </div>
        </div>
      </div>
  
      <!-- Timeline Item: 2019 -->
      <div class="timeline-item">
        <!-- Year Label -->
        <div class="year-label">2023</div>
        <div class="timeline-content">
          <!-- Description Section -->
          <div class="content-description">
            <h3 class="content-title">GROOT New Gen</h3>
            <p class="content-text">
              This laboratory had experienced a period of operational vacuum due to the COVID-19 pandemic. However, in 2023, laboratory activities were revived through the initiation of a new generation led by Tu Bagus Dwi Fikri under the name GROOT.
            </p>
          </div>
          <!-- Image Section -->
          <div class="content-image">
            <p class="content-date">May 1, 2023</p>
            <img src="@/assets/image/tu bagus.jpg" alt="GROOT Creation" />
          </div>
        </div>
      </div>
  
      <!-- Timeline Item: 2020 -->
      <div class="timeline-item">
        <!-- Year Label -->
        <div class="year-label">2024</div>
        <div class="timeline-content">
          <!-- Image Section -->
          <div class="content-image">
            <p class="content-date">May 6, 2024</p>
            <img src="@/assets/image/fadhlur.jpg" alt="Research Collaboration" />
          </div>
          <!-- Description Section -->
          <div class="content-description">
            <h3 class="content-title">New Spirit of GROOT</h3>
            <p class="content-text">
              Today, the leadership of the laboratory has passed to Fadhlur Rohman, who continues the baton of leadership with renewed vigor. Under his direction, GROOT is committed to continue to grow, expand its contribution in the field of research and technological innovation, and build a reputation as a center of excellence in robotic and automation development within Riau Islamic University and in the wider arena.
            </p>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  // Static content, no additional logic needed
  </script>
  
  <style scoped>
  /* General Layout */
  .timeline-container {
    position: relative;
    background-color: #ffffff;
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
  }
  
  /* Timeline Header Section */
  .timeline-header {
    text-align: center;
    margin-bottom: 0;
  }
  
  .timeline-deskripsi {
    text-align: center;
    margin-bottom: 0;
    color: #f9a61d;
    font-size: 15px;
  }
  
  .timeline-title {
    font-size: 28px;
    font-weight: bold;
    color: #f9a61d;
    text-align: center;
    margin-bottom: 10px;
    margin-top: 20px;
    max-width: fit-content;
    margin-left: auto;
    margin-right: auto;
    background-color: #33308e;
    padding: 10px;
    line-height: 1.2;
  }
  .bulat-keren{
    position: absolute;
    left: 50%;
  }
  /* Vertical Line Inside Container */
  .timeline-line {
    position: absolute;
    left: 50%;
    top: calc(40px + 20px);
    bottom: 0;
    width: 10px;
    background-color: #33308e;
    transform: translateX(-50%);
    z-index: 1;
  }
  
  /* Timeline Item */
  .timeline-item {
    display: flex;
    flex-direction: column;
    margin-bottom: 50px;
    position: relative;
  }
  
  /* Year Label */
  .year-label {
    font-size: 20px;
    font-weight: bold;
    color: #33308e;
    background-color: #f9a61d;
    padding: 5px 10px;
    width: fit-content;
    margin: 0 auto;
    z-index: 2;
    position: relative;
  }
  
  /* Timeline Content */
  .timeline-content {
    display: flex;
    align-items: center;
    gap: 20px;
    position: relative;
    z-index: 2;
  }
  
  /* Image and Description Section */
  .content-image,
  .content-description {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    max-width: 100%;
    margin-left: 100px;
    margin-right: 100px;
  }
  
  .content-image img {
    width: 100%;
    border-radius: 10px;
    width: 100%;
  height: auto; /* Maintain aspect ratio */
  object-fit: cover; /* Ensures image fills container without distortion */
  border-radius: 20px;
  border: 4px solid #f9a61d; /* Add border */
  max-height: 300px; /* Set a maximum height for larger screens */
  }
  
  .content-date {
    font-size: 0.9rem;
    font-weight: bold;
    color: #f9a61d;
    margin-bottom: 10px;
  }
  
  .content-description {
    background-color: #ffffff;
    padding: 15px;
    border-radius: 10px;
    text-align: left;
  }
  
  .content-title {
    font-size: 1.2rem;
    font-weight: bold;
    color: #f9a61d;
    margin-bottom: 8px;
    text-align: center;
  }
  
  .content-text {
    font-size: 0.9rem;
    color: #33308e;
    line-height: 1.4;
  }
  
  /* Responsive Design */
  @media (max-width: 768px) {
    .timeline-title {
      font-size: 1.5rem;
      padding: 10px;
    }
  
    .timeline-deskripsi {
      font-size: 0.8rem;
      padding: 5px;
    }
  
    .timeline-content {
      flex-direction: column;
      text-align: center;
      gap: 10px;
    }
  
    .content-image,
    .content-description {
      width: 100%;
      max-width: 100%;
      padding: 10px;
    }
  
    .content-image img {
      max-width: 90%;
      height: auto;
      margin: 0 auto;
    }
  
    .timeline-line {
      display: none;
    }
  
    .year-label {
      font-size: 1rem;
      padding: 5px;
      margin: 10px auto;
    }
  
    .content-title {
      font-size: 1rem;
    }
  
    .content-text {
      font-size: 0.8rem;
      line-height: 1.2;
    }
  }
  </style>
  