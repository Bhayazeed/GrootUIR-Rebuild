<template>
  <div class="page-container">
    <div class="project-container">
      <Projectcard
        v-for="(project) in filteredProjects"
        :key="project.id_project"
        :image="project.image"
        :title="project.title"
        :description="project.description"
        :fullDescription="project.fullDescription"
        :tag="project.tag"
      >
        <template #delete>
          <button class="del-button" @click="delProject(project.id_project)">
            Delete
          </button>
        </template>

        <template #edit>
          <button class="edit-button" @click="editProject(project.id_project)">
            edit
          </button>
        </template>
      </Projectcard>
    </div>
  </div>
</template>

<script setup>
import { useRouter } from "vue-router";
import { ref, computed, onMounted } from "vue";
import Projectcard from "../../../assets/accessory/projectcardAD.vue";

const token = localStorage.getItem("authToken");
const selectedTag = ref(null);
const router = useRouter();
const loading = ref(true);
const projects = ref([]);
const error = ref(null);

// Filter projects berdasarkan tag
const filteredProjects = computed(() => {
  if (!selectedTag.value) return projects.value;
  return projects.value.filter((project) => project.tag === selectedTag.value);
});

// Fetch data dari API
const fetchProject = async () => {
  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/projects`;
    const response = await fetch(apiUrl, {
      method: "GET",
      headers: {
        "x-api-key": import.meta.env.VITE_API_KEY,
        Accept: "application/json",
        "Content-Type": "application/json",
      },
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const result = await response.json();

    if (result.success && result.data && result.data.data) {
      // Map data API ke struktur yang sesuai
      projects.value = result.data.data.map((item) => ({
        id: item.id_project, // pastikan property id digunakan secara konsisten
        id_project: item.id_project, // jika template menggunakan project.id_project
        title: item.title,
        image: item.image,
        description: item.description,
        fullDescription: item.description, // Gunakan deskripsi sebagai default
        tag: item.tags,
      }));
    } else {
      throw new Error(result.message || "Gagal mengambil data");
    }
  } catch (err) {
    error.value = `Gagal mengambil data: ${err.message}`;
    console.error("Error fetching projects:", err);
  } finally {
    loading.value = false;
  }
};

const delProject = async (id_project) => {
  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/admin/projects/${id_project}`;

    const response = await fetch(apiUrl, {
      method: "DELETE", // Menggunakan method DELETE untuk menghapus data
      headers: {
        "x-api-key": import.meta.env.VITE_API_KEY,
        "Authorization": `Bearer ${token}`,
        "Accept": "application/json",
      },
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    projects.value = projects.value.filter(
      (project) => project.id_project !== id_project
    );
  } catch (err) {
    error.value = `Gagal menghapus data: ${err.message}`;
    console.error("Error deleting project:", err);
  }
};

function editProject(id_project) {
  router.push({ name: 'AdminEditPJ', params: { id: id_project } });
  console.log('id project : ', id_project);
}
// Panggil fetchProject saat komponen dimuat
onMounted(() => {
  fetchProject();
});
</script>

<style scoped>
.page-container {
  display: flex;
  justify-content: space-between;
  gap: 20px;
  width: 100%;
}

.project-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  min-width: 500px;
}

.right {
  display: flex;
  flex-direction: column;
  gap: 20px;
  max-width: 300px;
}

.tag-container {
  width: 100%;
}

.del-button {
  padding: 8px 16px;
  font-size: 14px;
  font-weight: bold;
  color: #33308e;
  background-color: transparent;
  border: 1px solid red;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  align-self: flex-start;
}

.del-button:hover {
  background-color: red;
  color: white;
}

.edit-button{
  padding: 8px 16px;
  font-size: 14px;
  font-weight: bold;
  color: #33308e;
  background-color: transparent;
  border: 1px solid green;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  align-self: flex-start;
  margin-left: 15px;
}

.edit-button:hover {
  background-color: green;
  color: white;
}

/* Responsif untuk tablet */
@media (max-width: 1024px) {
  .page-container {
    flex-direction: column;
    align-items: center;
  }

  .project-container {
    min-width: auto;
    justify-content: center;
  }

  .right {
    max-width: 100%;
    text-align: center;
  }
}

/* Responsif untuk mobile */
@media (max-width: 768px) {
  .tag-container {
    display: none;
  }

  .project-container {
    flex-direction: column;
    gap: 15px;
    width: 100%;
  }

  .right {
    margin-left: 0;
  }
}
</style>
