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
  padding: 1.5rem 1rem;
  text-align: center;
  width: 100%;
  position: relative; /* Pastikan footer berada setelah konten */
  bottom: 0;
}

.footer-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: center;
  gap: 1rem;
  max-width: 1200px;
  margin: 0 auto;
}

.logo-section,
.contact-section,
.social-media-section {
  flex: 1 1 250px;
  text-align: center;
}

.logo {
  max-width: 80px;
  margin-bottom: 0.5rem;
}

p {
  font-size: 0.9rem;
}

h3 {
  font-size: 1rem;
  margin-bottom: 0.5rem;
}

address {
  font-style: normal;
  line-height: 1.5;
}

/* Social Media Icons */
ul {
  list-style: none;
  padding: 0;
  display: flex;
  gap: 1rem;
  justify-content: center;
}

ul li a {
  color: #ffffff;
  text-decoration: none;
  font-size: 1.8rem;
  transition: transform 0.3s ease;
}

ul li a:hover {
  transform: scale(1.2);
}

/* Tombol Scroll-Up */
.scroll-up {
  background-color: #f9a61d;
  color: #ffffff;
  border: none;
  border-radius: 50%;
  padding: 0.8rem;
  font-size: 1.2rem;
  cursor: pointer;
  position: fixed; /* Agar tetap terlihat saat scroll */
  bottom: 20px;
  right: 20px;
  z-index: 1000;
  transition: opacity 0.3s ease;
}

.scroll-up:hover {
  background-color: #ffb74d;
}

/* Responsive Design */
@media (max-width: 768px) {
  .footer-container {
    flex-direction: column;
    text-align: center;
  }

  .logo {
    max-width: 60px;
  }

  ul {
    flex-direction: row;
    justify-content: center;
  }

  .scroll-up {
    bottom: 15px;
    right: 15px;
    font-size: 1rem;
  }
}
</style>
