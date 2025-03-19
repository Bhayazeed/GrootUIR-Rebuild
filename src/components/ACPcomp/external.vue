<template>
  <div class="activity-header">
    <h1 class="activity-title">Activity</h1>
  </div>
  
  <div class="page-container">
    <div class="container">
      <div class="left">
        <div class="card">
          <div class="card-header"></div>
          <div class="card-content">
            <h2 class="card-title">{{ title }}</h2>
            <div class="card-meta">
              <p class="card-creator">By {{ creator }}</p>
              <div class="divider"></div>
              <div class="card-date">
                <i class="fa-solid fa-calendar-days"></i>
                <p>{{ date }}</p>
              </div>
            </div>
            <p class="card-description">{{ description }}</p>
          </div>
          <button @click="goBack">Back</button>
        </div>
      </div>
      
      <div class="right">
        <div class="searchbar-container">
          <searchbar />
        </div>
        
        <div class="recentpost-container">
          <recentpost
            v-if="recentPosts.length"
            :titles="recentPosts.map(post => post.title)"
            :images="recentPosts.map(post => post.image || defaultImage)"
            :postUrls="recentPosts.map(post => post.id_activity)"
            @click="goToViewPage"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import recentpost from "../../assets/accessory/recentpost.vue";
import searchbar from "../../assets/accessory/searchbar.vue";
import defaultImage from "../../assets/image/galery1.jpg";

const title = "Kunjungan Penilai ASIC ke Laboratorium Teknik Informatika UIR";
const creator = "Admin";
const description = "Pada tanggal 19 November 2019, Universitas Islam Riau (UIR) menerima kunjungan dari para asesor ASIC (Accreditation Service for International Schools, Colleges, and Universities) sebagai bagian dari proses akreditasi internasional. Dalam kunjungan ini, Mr. Lee dan Mrs. Florence sebagai perwakilan ASIC mengunjungi Laboratorium Riset Fakultas Teknik, khususnya di bidang Teknik Informatika, untuk menilai kualitas penelitian, fasilitas, serta inovasi yang telah dikembangkan oleh mahasiswa dan dosen. Selama kunjungan, mereka tampak tertarik dengan berbagai proyek penelitian yang dipresentasikan oleh mahasiswa. Salah satu yang menarik perhatian mereka adalah robot Line Follower yang dikembangkan oleh tim GROOT-IT UIR. Robot ini dirancang untuk mengikuti jalur tertentu dengan presisi tinggi menggunakan sensor canggih, yang menunjukkan keterampilan mahasiswa dalam bidang kecerdasan buatan dan sistem kontrol. Mr. Lee dan Mrs. Florence terlihat berdiskusi dengan para pengembang robot ini, menanyakan detail teknis dan tantangan yang dihadapi dalam proses pembuatannya. Selain itu, mereka juga mendengarkan penjelasan mengenai sistem pemantauan bayi yang dikembangkan di laboratorium tersebut. Sistem ini dirancang untuk membantu orang tua dalam memonitor kondisi bayi secara real-time menggunakan teknologi sensor dan komunikasi nirkabel. Kedua asesor tampak memberikan apresiasi terhadap inovasi ini dan bertanya lebih lanjut mengenai potensi penerapannya di dunia nyata. Kunjungan ini menjadi momen penting bagi Fakultas Teknik UIR, karena menunjukkan upaya universitas dalam mencapai standar pendidikan dan penelitian yang diakui secara global. Dengan adanya penilaian dari ASIC, diharapkan UIR dapat memperoleh akreditasi internasional yang semakin meningkatkan reputasi serta daya saingnya di tingkat global. Selain itu, kunjungan ini juga memberikan motivasi bagi mahasiswa dan dosen untuk terus berinovasi dan mengembangkan teknologi yang bermanfaat bagi masyarakat.";
const date = "19 November 2019";

// Variabel reaktif untuk data
const activities = ref([]);
const latestPost = ref(null);
const recentPosts = ref([]);

const router = useRouter();

// Fungsi untuk menangani klik dan mengarahkan ke halaman view berdasarkan id_activity
function goToViewPage(id_activity) {
  router.push({ name: "View", params: { id: id_activity } });
}

function goBack() {
  router.go(-1);
}

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

    if (result.success && result.data && result.data.data) {
      const allActivities = result.data.data;

      // Ambil data terbaru pertama untuk maincard
      latestPost.value = allActivities[0];

      // Sisanya untuk recentpost, dibatasi 4 baris data
      recentPosts.value = allActivities.slice(1, 5);
    }
  } catch (err) {
    console.error("Error fetching activities:", err);
  }
}

// Fungsi format tanggal
function formatDate(dateStr) {
  const date = new Date(dateStr);
  const day = ("0" + date.getDate()).slice(-2);
  const month = date.toLocaleString("default", { month: "short" });
  return { day, month };
}

// Ambil data saat komponen dimuat
onMounted(() => {
  fetchActivities();
});
</script>

<style scoped>
.activity-title {
  font-size: 28px;
  font-weight: bold;
  color: #f9a61d;
  text-align: center;
  margin-top: 20px;
  max-width: fit-content;
  margin-left: auto;
  margin-right: auto;
  background-color: #33308e;
  padding: 10px;
  line-height: 1.2;
}

/* Full-page container */
.page-container {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  width: 100%;
  padding: 10px;
  box-sizing: border-box;
}

/* Main content container */
.container {
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  width: 100%;
  max-width: 1200px;
  gap: 20px;
}

/* Left section styling */
.left {
  flex: 2;
  padding-right: 20px;
  max-width: 100%;
}

/* Right section styling */
.right {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 20px;
  flex: 1;
  max-width: 100%;
}

/* Card styling */
.card {
  background-color: white;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

/* Card header with background image */
.card-header {
  height: 200px;
  background-color: #33308e;
  background-size: cover;
  background-position: center;
}

/* Card content area */
.card-content {
  padding: 20px;
}

/* Card title */
.card-title {
  font-size: 24px;
  margin-bottom: 10px;
  color: #33308e;
}

/* Meta information row */
.card-meta {
  display: flex;
  align-items: center;
  margin-bottom: 15px;
  font-size: 14px;
  color: #666;
}

.card-creator {
  margin: 0;
}

.divider {
  width: 1px;
  height: 20px;
  background-color: #ddd;
  margin: 0 15px;
}

.card-date {
  display: flex;
  align-items: center;
  gap: 5px;
}

/* Main content text */
.card-description {
  line-height: 1.6;
  color: #333;
  text-align: justify;
}

/* Back button */
button {
  background-color: #f9a61d;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 4px;
  margin: 20px;
  cursor: pointer;
  font-weight: bold;
}

/* Containers for the searchbar and recentpost */
.searchbar-container, 
.recentpost-container {
  width: 100%;
  max-width: 400px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .activity-title {
    font-size: 24px;
    padding: 8px;
  }
  
  .searchbar-container, 
  .recentpost-container {
    display: none;
  }

  .container {
    flex-direction: column;
    align-items: center;
  }

  .right {
    align-items: center;
    width: 100%;
  }

  .left {
    padding-right: 0;
    width: 100%;
  }
}

/* Additional styling for smaller screens */
@media (max-width: 480px) {
  .searchbar-container {
    margin-bottom: 10px;
  }

  .recentpost-container {
    margin-top: 10px;
  }

  .activity-title {
    font-size: 22px;
  }
}
</style>