<template>
  <!-- Section with Photos, Headlines, and Their Descriptions -->
  <div class="photo-description-section">
    <h2 class="section-title">What is it?</h2>
    <div class="photo-description-item">
      <div class="photo">
        <img src="../../assets/image/pic1.jpg" alt="Photo 1" class="photo-image" />
      </div>
      <div class="description">
        <h3 class="photo-headline">ROBOTIC AUTOMATION & WIRELESS RESEARCH</h3>
        <p class="photo-description">
          Robotic Automation and Wireless Research is a laboratory facilitated by the Universitas Islam Riau (UIR). This laboratory was built to assist researchers in the field of technology and take part in technological competitions. UIR allowed the department of informatics engineering to manage this laboratory so that the department of informatics engineering created a community called GROOT.
        </p>
      </div>
    </div>
    <div class="photo-description-item">
      <div class="photo">
        <img src="../../assets/image/pic3.jpg" alt="Photo 2" class="photo-image" />
      </div>
      <div class="description">
        <h3 class="photo-headline">GROOT (Robotik and Automation Group)</h3>
        <p class="photo-description">
          GROOT (Grup Robotik dan Otomasi Teknik) is a community consisting of students from the department of informatics engineering, who are given responsibility by the Head of the department of informatics engineering to conduct research related to Robotic, Networking, and Automation. GROOT was guided by one of the UIR lecturers Dr. Evizal ST., M.Eng and Head of the department of informatics engineering Apri Siswanto, S.Kom, M.Kom, PhD and chaired by Fadhlur Rohman.
        </p>
      </div>
    </div>
  </div>

</template>

<script>

</script>

<style scoped>
/* Styling for the new H2 section */
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
/* Section with Photos, Headlines, and Their Descriptions */
.photo-description-section {
  
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: flex-start;
  margin: 60px auto; /* Add top and bottom space to the entire section */
  width: 90%; /* Center the section and add side spacing */
  max-width: 1200px; /* Prevent the section from becoming too wide */
}

/* Individual items with image and description */
.photo-description-item {
  display: flex;
  flex-direction: row;
  align-items: stretch;
  width: 100%;
  margin-bottom: 40px; /* Add space between items (Picture 1 and Picture 2) */
  gap: 20px; /* Add spacing between photo and description */
}

/* Photo container */
.photo {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.photo-image {
  width: 100%;
  height: auto; /* Maintain aspect ratio */
  object-fit: cover; /* Ensures image fills container without distortion */
  border-radius: 20px;
  border: 4px solid #f9a61d; /* Add border */
  max-height: 300px; /* Set a maximum height for larger screens */
}

/* Description container */
.description {
  flex: 2;
  padding: 20px;
  background-color: #ffffff;
  border-radius: 5px;
  text-align: left;
}

.photo-headline {
  font-size: 20px;
  font-weight: bold;
  color: #33308e;
  margin-bottom: 10px;
}

.photo-description {
  font-size: 16px;
  color: #f9a61d;
  line-height: 1.6;
}

/* Responsive adjustments for smaller screens */
@media (max-width: 768px) {
  .photo-description-item {
    flex-direction: column; /* Stack photo and description vertically */
    margin-bottom: 30px; /* Reduce spacing for smaller screens */
  }

  .photo {
    max-height: 200px; /* Reduce max height for smaller screens */
  }

  .photo-image {
    max-height: 200px;
  }

  .description {
    padding: 15px;
  }
}

@media (max-width: 480px) {
  .photo-headline {
    font-size: 18px;
  }

  .photo-description {
    font-size: 14px;
  }
}
</style>
