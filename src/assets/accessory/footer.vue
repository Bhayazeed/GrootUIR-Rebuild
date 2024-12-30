<template>
  <footer class="footer">
    <div class="footer-container">
      <div class="logo-section">
        <img src="../../components/icons/logo.png" alt="GROOT Logo" class="logo" />
        <p>©2024 ROBOTIC AUTOMATION & WIRELESS RESEARCH</p>
      </div>
      <div class="contact-section">
        <h3>Contact</h3>
        <address>
          grootuir@gmail.com<br />
          Jl. Kaharuddin Nasution<br />
          Pekanbaru<br />
        </address>
      </div>
      <div class="social-media-section">
        <h3>Social Media</h3>
        <ul>
          <li><a href="https://www.instagram.com/grootuir"><i class="fa-brands fa-instagram"></i></a></li>
          <li><a href="https://youtube.com/@grootuir7090"><i class="fa-brands fa-youtube"></i></a></li>
          <li><a href="https://www.facebook.com/groot.uir/"><i class="fa-brands fa-facebook"></i></a></li>
        </ul>
      </div>
    </div>
    <button class="scroll-up" @click="scrollToTop"><i class="fa-solid fa-chevron-up"></i></button>
  </footer>
</template>

<script setup>
const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
};
</script>

<style scoped>
.footer {
  background-color: #33308e;
  color: #ffffff;
  padding: 1rem 1rem;
  text-align: center;
  position: relative;
  width: 100%;
  bottom: 0;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 1rem;
}

.logo-section,
.contact-section,
.social-media-section {
  flex: 1 1 180px;
  color: #ffffff;
}

.logo {
  max-width: 80px;
  margin-bottom: 0.5rem;
  opacity: 1;
}

p {
  font-size: small;
  color: #ffffff;
}

h3 {
  margin-bottom: 0.5rem;
}

ul {
  list-style: none;
  padding: 0;
  display: flex;
  gap: 1rem;
  justify-content: center;
}

ul li {
  margin: 0;
}

ul li a {
  color: #ffffff;
  text-decoration: none;
}

/* Increase the size of social media icons */
ul li a i {
  font-size: 2rem; /* Increase the icon size */
  transition: transform 0.3s ease; /* Add smooth transition for hover effect */
}

ul li a:hover {
  text-decoration: underline;
}

ul li a i:hover {
  transform: scale(1.2); /* Slightly enlarge the icon on hover */
}

address {
  font-style: normal;
  line-height: 1.5;
}

/* Scroll-up Button inside the footer */
.scroll-up {
  background-color: #f9a61d;
  color: #ffffff;
  border: none;
  border-radius: 5px;
  padding: 0.5rem 1rem;
  font-size: 1.5rem;
  cursor: pointer;
  position: absolute;
  top: 50px; /* Place the button at the bottom of the footer */
  right: 20px;
  z-index: 1000; /* Ensure the button is on top */
}

.scroll-up:hover {
  background-color: #f9a61d;
}

/* Responsive Design */
@media (max-width: 768px) {
  .footer-container {
    flex-direction: column;
    text-align: center;
  }

  .social-media-section ul {
    flex-direction: column;
    gap: 0.5rem;
  }
}
</style>
