<template>
    <!-- Vision and Mission Section -->
    <div class="vision-mission-section">
      <div class="vision-mission-container">
        <h2 class="section-title">Our Goals</h2>
  
        <!-- Flex container to hold Vision/Mission (left) and Gallery (right) -->
        <div class="vision-mission-flex">
          <!-- Left Side: Vision and Mission stacked vertically -->
          <div class="left-column">
            <!-- Vision Box -->
            <div class="vision-box">
              <h3 class="vision-title">Vision</h3>
              <p class="vision-text">
                To provide education and training in robotics and automation, foster innovation through cutting-edge research, participate in competitions, empower the academic community, and collaborate with partners to deliver impactful advancements that benefit society and the economy.
              </p>
              <div class="kotakdivgambar">
                <img src="../../assets/accessory/house.svg" alt="" class="kotak-timpa">
              </div>
            </div>
            
            
  
            <!-- Mission Box -->
            <div class="mission-box">
              <h3 class="mission-title">Mission</h3>
              <ul class="mission-list">
                <li>Establish GROOT UIR as a leading institution in robotics and automation</li>
                <li>Drive innovation and excellence in science and technology.</li>
                <li>Contribute to societal progress through robotics and automation advancements.</li>
              </ul>
              <div class="kotakdivgambar">
                <img src="../../assets/accessory/Hand.svg" alt="" class="kotak-timpa-tangan">
              </div>
            </div>
          </div>
  
          <!-- Right Side: Gallery Section with Image Slider -->
          <div class="gallery-section">
            <h3 class="gallery-title">Our Research Gallery</h3>
            <div class="gallery-container">
              <div class="gallery-item">
                <!-- Image Slider -->
                <div class="slider">
                  <img :src="images[currentImage]" alt="Gallery Image" class="gallery-image" />
                  <div class="slider-controls">
                    <button @click="prevImage" class="slider-button">❮</button>
                    <button @click="nextImage" class="slider-button">❯</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  import image1 from '../../assets/image/galery1.jpg';
  import image2 from '../../assets/image/galery2.jpg';
  import image3 from '../../assets/image/galery3.jpg';
  import image4 from '../../assets/image/galery4.jpg';
  
  const images = [image1, image2, image3, image4];
  const currentImage = ref(0);
  
  const nextImage = () => {
    currentImage.value = (currentImage.value + 1) % images.length;
  };
  
  const prevImage = () => {
    currentImage.value = (currentImage.value - 1 + images.length) % images.length;
  };
  
  // Automatically change image every 3 seconds
  onMounted(() => {
    setInterval(() => {
      nextImage();
    }, 3000); // 3000ms = 3 seconds
  });
  </script>
  
  <style scoped>
  /* Vision and Mission Section Styles */
  .vision-mission-section {
    width: 100%;
    background-color: #ffffff; /* Light blue-gray background */
    padding: 40px 20px;
    margin-top: 80px; /* Space above the section */
  }
  
  .vision-mission-container {
    max-width: 1200px;
    margin: 0 auto;
    text-align: center;
  }
  .kotak-timpa-tangan{
    position: absolute;
    right: -3vw;
    top: 75%;
    height: 80px;
  }
  .section-title {
    font-size: 28px;
    font-weight: bold;
    color: #f9a61d; /* Matches the existing color scheme */
    text-align: center;
    margin-bottom: 50px; /* Adds spacing below the title */
    margin-top: 20px; /* Adds spacing above the title */
    display: flex;
    max-width: fit-content;
    margin-left: auto;
    margin-right: auto;
    background-color: #33308e;
    padding: 10px;
  }
  
  /* Flex container for Vision/Mission (left) and Gallery (right) */
  .vision-mission-flex {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    align-items: center; /* Align top */
  }
  
  /* Left Column: Vision and Mission stacked vertically */
  .left-column {
    display: flex;
    flex-direction: column;
    gap: 20px;
    flex: 1; /* Take up equal space */
  }
  
  /* Vision Box (Left) */
  .vision-box {
    background-color: #33308e;
    padding: 20px;
    border-radius: 20px;
    border: 4px solid #f9a61d; /* Updated border color */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
  }
  
  .vision-title {
    font-size: 22px;
    font-weight: bold;
    color: #f9a61d; /* Yellow color for titles */
    margin-bottom: 10px;
  }
  
  .vision-text {
    font-size: 16px;
    color: #ffffff;
    line-height: 1.6;
  }
  
  /* Mission Box (Left) */
  .mission-box {
    background-color: #33308e;
    position: relative;
    padding: 20px;
    border-radius: 20px;
    border: 4px solid #f9a61d; /* Updated border color */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  .mission-title {
    font-size: 22px;
    font-weight: bold;
    color: #f9a61d; /* Yellow color for titles */
    margin-bottom: 10px;
  }
  .kotak-timpa {
    position: absolute;
    left: -3vw;
    top: 75%;
    height: 80px;
  }

  .mission-list {
    list-style-type: disc;
    margin: 0 auto;
    padding: 0;
    text-align: left;
    max-width: 800px;
  }
  
  .mission-list li {
    font-size: 16px;
    color: #ffffff;
    line-height: 1.6;
    margin-bottom: 10px;
  }
  
  /* Gallery Section (Right) */
  .gallery-section {
    flex: 1;
    background-color: #33308e;
    padding: 20px;
    border-radius: 20px;
    border: 4px solid #f9a61d; /* Updated border color */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  
  .gallery-title {
    font-size: 24px;
    font-weight: bold;
    color: #f9a61d;
    margin-bottom: 20px;
  }
  
  .gallery-container {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .gallery-item {
    width: 100%;
    max-width: 500px;
    position: relative;
  }
  
  .image-wrapper {
    overflow: hidden;
    position: relative;
  }
  
  .gallery-image {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.5s ease-in-out; /* Smooth sliding effect */
  }
  
  .slider {
    position: relative;
  }
  
  .slider-controls {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
  }
  
  .slider-button {
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    font-size: 24px;
    border-radius: 5px;
  }
  
  .slider-button:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }
  
  @keyframes fade {
    100% {
      opacity: 0;
    }
    50% {
      opacity: 1;
    }
    0% {
      opacity: 0;
    }
  }
  
  .gallery-image {
    animation: fade 3s ease-in-out infinite;
  }
  
  /* Responsive Styles */
  @media screen and (max-width: 768px) {
    /* Stack the Vision and Mission section on smaller screens */
    .vision-mission-flex {
      flex-direction: column;
      align-items: center;
    }
  
    /* Make gallery section take full width */
    .gallery-section {
      width: 100%;
      margin-top: 20px;
    }
  
    /* Adjust font sizes for smaller screens */
    .section-title {
      font-size: 24px;
    }
  
    .vision-title,
    .mission-title {
      font-size: 20px;
    }
  
    .vision-text,
    .mission-list li {
      font-size: 14px;
    }
  
    /* Adjust image size in gallery */
    .gallery-image {
      height: 250px;
    }
  }
  
  @media screen and (max-width: 480px) {
    /* Further adjustments for mobile screens */
    .section-title {
      font-size: 20px;
    }
  
    .vision-title,
    .mission-title {
      font-size: 18px;
    }
  
    .vision-text,
    .mission-list li {
      font-size: 12px;
    }
  
    .gallery-image {
      height: 200px;
    }
  
    .slider-button {
      font-size: 18px;
      padding: 8px;
    }
  }
  </style>
  