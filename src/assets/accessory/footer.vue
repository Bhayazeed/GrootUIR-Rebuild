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
        <h3>Follow Us</h3>
        <ul>
          <li><a href="https://www.instagram.com/grootuir" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
          <li><a href="https://youtube.com/@grootuir7090" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a></li>
          <li><a href="https://www.facebook.com/groot.uir/" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
        </ul>
      </div>
    </div>
    <button v-show="showScroll" class="scroll-up" @click="scrollToTop">
      <i class="fa-solid fa-chevron-up"></i>
    </button>
  </footer>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from "vue";

const showScroll = ref(false);

const handleScroll = () => {
  showScroll.value = window.scrollY > 300;
};

const scrollToTop = () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
};

onMounted(() => {
  window.addEventListener("scroll", handleScroll);
});

onUnmounted(() => {
  window.removeEventListener("scroll", handleScroll);
});
</script>

<style scoped>
.footer {
  position: relative; /* Agar elemen footer tetap berada dalam alur halaman */
  left: 0; /* Pastikan elemen mulai dari sisi kiri */
  right: 0; /* Pastikan elemen berakhir di sisi kanan */
  width: 100vw; /* Lebar penuh termasuk margin dan padding browser */
  background-color: #33308e;
  color: #ffffff;
  padding: 2rem 1rem;
  text-align: center;
}

.footer-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1.5rem;
  max-width: 1200px;
  margin: 0 auto;
  text-align: center;
}

.logo-section {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.logo {
  max-width: 80px;
  margin-bottom: 0.5rem;
}

h3 {
  font-size: 1.1rem;
  margin-bottom: 0.5rem;
}

address {
  font-style: normal;
  line-height: 1.5;
  font-size: 0.95rem;
}

/* Social Media */
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
  transition: transform 0.3s ease, color 0.3s ease;
}

ul li a:hover {
  transform: scale(1.2);
  color: #f9a61d;
}

/* Scroll-Up Button */
.scroll-up {
  background-color: #f9a61d;
  color: #ffffff;
  border: none;
  border-radius: 50%;
  padding: 0.8rem;
  font-size: 1.2rem;
  cursor: pointer;
  position: fixed;
  bottom: 20px;
  right: 20px;
  z-index: 1000;
  opacity: 0.8;
  transition: opacity 0.3s ease, transform 0.3s ease;
}

.scroll-up:hover {
  background-color: #ffb74d;
  opacity: 1;
  transform: scale(1.1);
}

@media (max-width: 768px) {
  .footer-container {
    display: flex;
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
