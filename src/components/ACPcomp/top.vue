<template>
  <div class="activity-header">
    <h1 class="activity-title">Activity</h1>
  </div>
  <div class="page-container">
    <div class="container">
      <div class="left">
        <maincard
          v-if="latestPost"
          :image="latestPost.image || defaultImage"
          :day="formatDate(latestPost.created_at).day"
          :month="formatDate(latestPost.created_at).month"
          :title="latestPost.title"
          :description="latestPost.description"
          buttonText="Read More"
          customClass="custom-card-class"
          :showDateBadge="true"
          :id_activity="latestPost.id_activity" 
        />
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
import maincard from "../../assets/accessory/maincard.vue";
import recentpost from "../../assets/accessory/recentpost.vue";
import searchbar from "../../assets/accessory/searchbar.vue";
import defaultImage from "../../assets/image/galery1.jpg";

// Reaktif variabel untuk data
const activities = ref([]);
const latestPost = ref(null);
const recentPosts = ref([]);

const router = useRouter();

// Fungsi untuk menangani klik dan mengarahkan ke halaman view dengan ID aktivitas
function goToViewPage(post) {
  router.push({ name: 'View', params: { id: post.id_activity } });
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

      // Ambil data terbaru pertama untuk `maincard`
      latestPost.value = allActivities[0];

      // Sisanya untuk `recentpost`
      recentPosts.value = allActivities.slice(1);
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
  height: 100vh;
  width: 100vw;
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

/* Containers for the searchbar and recentpost */
.searchbar-container, 
.recentpost-container {
  width: 100%;
  max-width: 400px;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .activity-title {
    font-size: 24px; /* Adjust the font size for the title */
    padding: 8px;
  }
  
  .searchbar-container, 
  .recentpost-container {
    display: none;
  }

  .container {
    flex-direction: column; /* Stack the left and right sections */
    align-items: center;
  }

  .left {
    padding-right: 0;
    margin-bottom: 20px;
    max-width: 100%;
  }

  .right {
    align-items: center;
    width: 100%;
  }

  .searchbar-container {
    margin-bottom: 20px; /* Add space between searchbar and recent posts */
  }

  /* Resize the main card and adjust for mobile */
  .maincard-class {
    max-width: 100%;
    margin: 0 auto;
  }
}

/* Additional styling for the recent posts and searchbar on smaller screens */
@media (max-width: 480px) {
  .searchbar-container {
    margin-bottom: 10px;
  }

  .recentpost-container {
    margin-top: 10px;
  }

  .activity-title {
    font-size: 22px; /* Further reduce title size on very small screens */
  }
}
</style>
