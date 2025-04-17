<template>
  <div class="project-header">
    <h1 class="project-title">Project</h1>
  </div>
  <div class="page-container">
    <div class="project-container">
      <Projectcard
        v-for="project in filteredProjects"
        :key="project.id_project"
        :image="project.image"
        :title="project.title"
        :description="project.description"
        :tag="project.tag"
        @button-click="() => handleButtonClick(project.id_project)"
      />
    </div>
    <div class="right">
      <div class="tag-container">
        <Tag :titles="tagTitle" @tagSelected="filterProjects" />
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from "vue";
import Projectcard from "../../assets/accessory/projectcard.vue";
import Tag from "../../assets/accessory/tags.vue";
import { useRouter } from "vue-router";

const tagTitle = ["ROBOTICS", "IOT", "AI", "AUTOMATION"];
const projects = ref([]);
const selectedTag = ref(null);
const error = ref(null);
const loading = ref(true);
const router = useRouter();

const filteredProjects = computed(() => {
  if (!selectedTag.value) return projects.value;
  return projects.value.filter(project => project.tag === selectedTag.value);
});

const filterProjects = (tag) => {
  selectedTag.value = tag;
};

function handleButtonClick(id_project) {
  router.push({ name: "View", params: { id: id_project, type: "projects" } });
}

const fetchProject = async () => {
  try {
    const apiUrl = `${import.meta.env.VITE_API_URL}/projects`;
    const response = await fetch(apiUrl, {
      method: "GET",
      headers: {
        "x-api-key": `${import.meta.env.VITE_API_KEY}`,
        Accept: "application/json",
        "Content-Type": "application/json",
      },
    });

    if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);

    const result = await response.json();
    if (result.success && result.data && result.data.data) {
      projects.value = result.data.data.map((item) => ({
        id_project: item.id_project,
        title: item.title,
        image: item.image,
        description: item.description,
        tag: item.tags,
      }));
    } else {
      throw new Error(result.message || "Gagal mengambil data");
    }
  } catch (err) {
    error.value = `Gagal mengambil data: ${err.message}`;
    console.error(err);
  } finally {
    loading.value = false;
  }
};

onMounted(() => {
  fetchProject();
});
</script>

<style scoped>
.project-title {
  font-size: 28px;
  font-weight: bold;
  color: #f9a61d;
  text-align: center;
  margin: 20px auto 40px;
  background-color: #33308e;
  padding: 10px;
  line-height: 1.2;
  width: fit-content;
}

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
  padding-left: 15vh;
}

.right {
  display: flex;
  flex-direction: column;
  gap: 20px;
  max-width: 300px;
}

.tag-container {
  margin-right: 5em;
  width: 100%;
  padding-right: 15vh;
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
    padding-inline: 20px;
  }

  .right {
    margin-left: 0;
  }
}
</style>
