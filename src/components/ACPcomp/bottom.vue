<template>
  <div class="page-container">
    <!-- Tampilkan pesan error jika terjadi kesalahan -->
    <div v-if="error" class="error-message">{{ error }}</div>

    <!-- Tampilkan indikator loading saat data sedang dimuat -->
    <div v-if="loading" class="loading-message">Loading...</div>

    <div class="card-grid" v-else>
      <!-- Iterasi data aktivitas yang didapat dari API -->
      <Card
        v-for="activity in activities"
        :key="activity.id_activity"
        class="card-item"
        :day="formatDate(activity.created_at).day"
        :month="formatDate(activity.created_at).month"
        :title="activity.title"
        :description="activity.description"
        buttonText="Read More"
        headerColor="#1e3a8a"
        :image="activity.image || defaultImage"
        @button-click="() => handleButtonClick(activity.id_activity)"
      >
        <!-- Slot title -->
        <template #title>
          <h2 class="custom-title">{{ activity.title }}</h2>
        </template>
        <!-- Slot button -->
        <template #button>
          <button class="custom-button" @click="handleButtonClick(activity.id_activity)">Read More</button>
        </template>
      </Card>

    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, nextTick } from "vue";
import { useRouter } from "vue-router";
import Card from "@/assets/accessory/card.vue";
import defaultImage from "../../assets/image/galery1.jpg";

// Variabel reaktif
const router = useRouter();
const activities = ref([]);
const loading = ref(true);
const error = ref("");

// Fungsi untuk mengformat tanggal dari API menjadi objek { day, month }
function formatDate(dateStr) {
  const date = new Date(dateStr);
  const day = ("0" + date.getDate()).slice(-2);
  const month = date.toLocaleString("default", { month: "short" });
  return { day, month };
}


function handleButtonClick(id_activity) {
  router.push({ name: 'View', params: { id: id_activity, type: 'activities' } });
}

// Fungsi untuk mengambil data aktivitas dari API
const fetchActivities = async () => {
  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/activities`;

    const response = await fetch(apiUrl, {
      method: "GET",
      headers: {
        "x-api-key": `${import.meta.env.VITE_API_KEY}`,
        "Accept": "application/json",
        "Content-Type": "application/json",
      },
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const result = await response.json();

    if (result.success && result.data && result.data.data) {
      activities.value = result.data.data;
    } else {
      throw new Error(result.message || "Gagal mengambil data");
    }
  } catch (err) {
    error.value = `Gagal mengambil data: ${err.message}`;
    console.error("Error fetching activities:", err);
  } finally {
    loading.value = false;
  }
};

onMounted(async () => {
  await fetchActivities();

  // Pastikan DOM sudah terupdate setelah data diterima
  await nextTick();

  // Terapkan IntersectionObserver untuk animasi fade-in pada card
  const cards = document.querySelectorAll(".card-item");
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        }
      });
    },
    { threshold: 0.2 }
  );

  cards.forEach((card) => observer.observe(card));
});
</script>

<style scoped>
/* Styling umum */
html, body {
  margin: 0;
  padding: 0;
  height: 100%;
}

.page-container {
  min-height: calc(100vh - 100px);
  padding: 25px;
  box-sizing: border-box;
}

/* Grid untuk card */
.card-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  grid-gap: 1rem;
  max-width: 1200px;
  width: 100%;
  margin: 0 auto;
}

/* Efek fade-in */
.card-item {
  opacity: 0;
  transform: translateY(30px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.card-item.visible {
  opacity: 1;
  transform: translateY(0);
}

/* Pesan error dan loading */
.error-message {
  color: red;
  text-align: center;
  margin-bottom: 1rem;
}

.loading-message {
  text-align: center;
  margin-bottom: 1rem;
}

/* Responsive design untuk tablet */
@media (max-width: 768px) {
  .card-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  .custom-title {
    font-size: 16px;
  }
  .custom-description {
    font-size: 12px;
  }
  .custom-button {
    font-size: 14px;
  }
  .card-item:first-child {
    display: none;
  }
}

/* Responsive design untuk ponsel */
@media (max-width: 480px) {
  .card-grid {
    grid-template-columns: 1fr;
    justify-items: center;
  }
  .custom-title {
    font-size: 14px;
  }
  .custom-description {
    font-size: 10px;
  }
  .custom-button {
    padding: 6px 12px;
    font-size: 12px;
    margin-top: 8px;
  }
  .card-item:first-child {
    display: none;
  }
}

/* Gaya kustom untuk slot konten card */
.custom-title {
  font-size: 18px;
  color: #33308e;
}

.custom-description {
  font-size: 14px;
  color: #1c1c1c;
}

.custom-button {
  padding: 8px 16px;
  font-size: 14px;
  font-weight: bold;
  color: #33308e;
  background-color: transparent;
  border: 1px solid #f9a61d;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  display: block;
  margin-top: 10px;
  width: fit-content;
}

.custom-button:hover {
  background-color: #f9a61d;
  color: #ffffff;
}
</style>
