<template>
  <!-- News Section -->
  <div class="news-section">
    <div class="news-container">
      <h2 class="section-title">What's News</h2>
      <div class="news-items">
        <div class="news-item" v-for="(news, index) in newPosts" :key="index">
          <div class="news-image">
            <img :src="news.image" alt="news image" class="news-img" />
          </div>
          <div class="news-content">
            <h3 class="news-headline">{{ news.title }}</h3>
            <p class="news-description">{{ news.description }}</p>
          </div>
        </div>
      </div>
      <div class="bot-buttom">
        <ReadMore text="Click here" arrow="↓" :customAction="navigateToPage" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import ReadMore from "../../assets/accessory/btnread.vue";

const router = useRouter();

// Navigasi ke halaman aktivitas
function navigateToPage() {
  router.push({ name: "Activity" });
}

// Menyimpan data dari API
const newPosts = ref([]);

// Fetch data dari API
async function fetchActivities() {
  try {
    const response = await fetch(`${import.meta.env.VITE_API_URL}/activities`, {
      method: "GET",
      headers: {
        "x-api-key": `${import.meta.env.VITE_API_KEY}`,
        "Accept": "application/json",
        "Content-Type": "application/json",
      },
    });
    const result = await response.json();

    if (result.success && result.data?.data) {
      newPosts.value = result.data.data.slice(0, 3);
    }
  } catch (err) {
    console.error("Error fetching activities:", err);
  }
}

// Panggil API saat komponen dimuat
onMounted(fetchActivities);
</script>


<style scoped>
/* News Section */
.news-section {
margin-top: 80px; /* Space from previous sections */
width: 100%;
text-align: center;
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

.news-items {
display: flex;
width: 80%;
justify-content: space-between;
flex-wrap: wrap;
margin: 0 auto;
text-align: center;
gap: 20px;
}

.news-item {
background-color: #ffffff;
border: 1px solid #f9a61d;
border-radius: 5px;
padding: 20px;
width: 30%; /* Each news item takes up 30% of the container */
box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
display: flex;
flex-direction: column;
}

.news-image {
width: 100%;
height: 200px; /* Fixed height for images */
overflow: hidden;
border-radius: 5px;
}

.news-img {
width: 100%;
height: 100%;
object-fit: cover;
}

.news-content {
padding-top: 15px;
}

.news-headline {
font-size: 20px;
font-weight: bold;
color: #33308e;
margin-bottom: 10px;
}

.news-description {
font-size: 16px;
color: #33308e;
line-height: 1.5;
}
.bot-buttom{
  padding-top: 40px;
}

/* Responsive Design */
@media (max-width: 768px) {
.news-items {
  flex-direction: column;
  align-items: center;
}

.news-item {
  width: 90%; /* Make news items take up more space on smaller screens */
  margin-bottom: 20px; /* Add space between items */
}

.section-title {
  font-size: 24px; /* Slightly smaller title on mobile */
  margin-bottom: 50px;
}

.news-headline {
  font-size: 18px; /* Adjust headline font size */
}

.news-description {
  font-size: 14px; /* Adjust description font size */
}
}

@media (max-width: 480px) {
.news-item {
  width: 100%; /* Full-width for even smaller screens */
  padding: 15px; /* Reduce padding */
}

.news-headline {
  font-size: 16px; /* Further adjust headline font size */
}

.news-description {
  font-size: 12px; /* Further adjust description font size */
}
}
</style>
