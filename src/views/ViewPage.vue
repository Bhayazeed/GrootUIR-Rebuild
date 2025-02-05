<template>
  <div class="container">
    <div v-if="loading" class="loading-message">Loading...</div>
    <div v-else-if="error" class="error-message">{{ error }}</div>
    <extendcard
      v-else
      :title="activity.title"
      :description="activity.description"
      :creator="activity.created_by"
      :date="formattedDate"
      customClass=""
      headerColor="#1e3a8a"
      :image="activity.image || defaultImage"
    />
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import { useRoute } from "vue-router";
import extendcard from "../assets/accessory/extendcard.vue";
import defaultImage from "../assets/image/galery1.jpg";

const route = useRoute();
const id = route.params.id;


onMounted(() => {
  fetchActivity();
});

const activity = ref({});
const loading = ref(true);
const error = ref("");

const formattedDate = computed(() => {
  if (activity.value.created_at) {
    const date = new Date(activity.value.created_at);
    return date.toLocaleDateString("id-ID", {
      year: "numeric",
      month: "short",
      day: "numeric",
    });
  }
  return "";
});

const fetchActivity = async () => {
  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/activities/${id}`;

    const response = await fetch(apiUrl, {
      method: "GET",
      headers: {
        "x-api-key": `${import.meta.env.VITE_API_KEY}`,
        Accept: "application/json",
        "Content-Type": "application/json",
      },
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const result = await response.json();
    if (result.success && result.data) {
      activity.value = result.data;
    } else {
      throw new Error(result.message || "Gagal mengambil data aktivitas");
    }
  } catch (err) {
    error.value = `Gagal mengambil data: ${err.message}`;
    console.error("Error fetching activity:", err);
  } finally {
    loading.value = false;
  }
};

onMounted(() => {
  fetchActivity();
});
</script>

<style scoped>
/* Container utama */
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Membuat konten selalu berada di tengah secara vertikal */
  padding: 1rem;
  box-sizing: border-box;
}

/* Loading dan error message */
.loading-message,
.error-message {
  text-align: center;
  font-size: 1.2rem;
  color: #333;
  padding: 1rem;
}

/* Responsivitas */
@media (max-width: 768px) {
  .container {
    flex-direction: column; /* Jika layar kecil, tata letak menjadi kolom */
    padding: 0.5rem;
  }

  .loading-message,
  .error-message {
    font-size: 1rem;
  }
}

@media (max-width: 480px) {
  .loading-message,
  .error-message {
    font-size: 0.9rem; /* Ukuran font lebih kecil untuk layar kecil */
  }
}
</style>
