<template>
    <!-- Slogan Section -->
    <div class="slogan-section">
      <h2 class="slogan">We Are GROOT</h2>
    </div>
  
    <!-- Section 1 -->
    <div class="image-description-section">
      <div class="image-description-item">
        <div class="description">
          <!-- <h3 class="headline">Robotic Automation Research</h3> -->
          <p class="description-text">
            Dedicated to advancing the field of robotics and automation, this research focuses on innovative solutions for real-world challenges.
          </p>
        </div>
        <div class="image">
          <img src="@/assets/image/galery1.jpg" alt="Image 1" class="image-content" />
        </div>
      </div>
    </div>
  
    <!-- Section 2 -->
    <div class="image-description-section">
      <div class="image-description-item">
        <div class="description">
          <!-- <h3 class="headline">Community Outreach Programs</h3> -->
          <p class="description-text">
            Engaging the community by sharing knowledge about cutting-edge technologies and inspiring the next generation of innovators.
          </p>
        </div>
        <div class="image">
          <img src="@/assets/image/galery2.jpg" alt="Image 2" class="image-content" />
        </div>
      </div>
    </div>
  
    <!-- Footer Section -->
    <div class="footer-logo-container">
      <div class="footer-logo-section">
        <img src="../../components/icons/icon.png" alt="Community Logo" class="footer-logo" />
      </div>
      <div class="motivational-words-section">
        <p class="motivational-words">"As we look to the future, GROOT remains committed to growth and excellence. We are more than a community; we are a family united by a shared mission to inspire, innovate, and lead in the fields of robotics, networking, and automation. With unwavering determination, we will continue to rise, proving that our best is yet to come."</p>
      </div>
    </div>
</template>

<script setup>
  // No additional logic is needed for this static page.
</script>

<style scoped>
  /* === Slogan Section === */
  .slogan-section {
    text-align: center;
    margin-top: 20px;
    margin-bottom: 40px;
  }

  .slogan {
    font-size: 2rem;
    font-weight: bold;
    color: #f9a61d;
    padding: 10px 20px;
    border-radius: 10px;
  }

  /* === General Image-Description Sections === */
  .image-description-section {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 40px 0;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    width: 100%;
  }

  .image-description-item {
    display: flex;
    align-items: center;
    gap: 20px;
    flex-wrap: wrap;
    flex-direction: row; /* Description on the left, image on the right */
    width: 100%;
  }

  .image {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    
  }

  .image-content {
    width: 100%;
    max-width: 400px;
    height: auto;
    border-radius: 10px;
    width: 100%;
    height: auto; /* Maintain aspect ratio */
    object-fit: cover; /* Ensures image fills container without distortion */
    border-radius: 20px;
    border: 4px solid #f9a61d; /* Add border */
    max-height: 300px; /* Set a maximum height for larger screens */
  }

  .description {
    flex: 2;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;

  }

  .headline {
    font-size: 1.5rem;
    font-weight: bold;
    color: #33308e;
    margin-bottom: 10px;
  }

  .description-text {
    font-size: 1rem;
    color: #33308e;
    line-height: 1.6;
    text-align: left;
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
    color: #33308e;
    font-weight: normal;
  }

  /* === Responsive Design === */
  @media (max-width: 768px) {
    .slogan {
      font-size: 1.5rem;
    }

    .image-description-section {
      flex-direction: column;
      padding: 10px;
    }

    .image-description-item {
      flex-direction: column;
      gap: 10px;
    }

    .image-content {
      max-width: 100%;
    }

    .description {
      width: 100%;
      padding: 15px;
    }

    .footer-logo-container {
      margin-top: 30px;
    }

    .footer-logo {
      width: 120px;
    }

    .motivational-words {
      font-size: 16px;
    }
  }
</style>
