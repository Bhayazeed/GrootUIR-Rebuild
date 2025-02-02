<template>
  <div class="project-header">
    <h1 class="project-title">Project</h1>
  </div>
  <div class="page-container">
    <div class="project-container">
      <Projectcard
        v-for="(project, index) in filteredProjects"
        :key="index"
        v-bind="project"
      />
    </div>
    <aside class="right">
      <div class="tag-container">
        <Tag :titles="tagTitle" @tagSelected="filterProjects" />
      </div>
    </aside>
  </div>
</template>

<script setup>
import { ref, computed } from "vue";
import Projectcard from "../../assets/accessory/projectcard.vue";
import Tag from "../../assets/accessory/tags.vue";
import img1 from "../../assets/image/galery1.jpg";
import img2 from "../../assets/image/galery2.jpg";
import img3 from "../../assets/image/galery3.jpg";
import img4 from "../../assets/image/galery4.jpg";

const tagTitle = ["ROBOTICS", "IOT", "AI", "AUTOMATION"];

const projects = [
  {
    image: img1,
    title: "Project 1",
    description:
      "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription:
      "This is the full article about Project 1. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag: "AI",
  },
  {
    image: img2,
    title: "Project 2",
    description:
      "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription:
      "This is the full article about Project 2. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag: "IOT",
  },
  {
    image: img3,
    title: "Project 3",
    description:
      "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription:
      "This is the full article about Project 3. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag: "ROBOTICS",
  },
  {
    image: img4,
    title: "Project 4",
    description:
      "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription:
      "This is the full article about Project 4. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag: "AUTOMATION",
  },
];

const selectedTag = ref(null);

// Mengembalikan semua proyek jika tag belum dipilih, atau memfilter berdasarkan tag
const filteredProjects = computed(() =>
  !selectedTag.value
    ? projects
    : projects.filter((project) => project.tag === selectedTag.value)
);

const filterProjects = (tag) => {
  selectedTag.value = tag;
};
</script>

<style scoped>
.project-header {
  text-align: center;
  margin-bottom: 40px;
}

.project-title {
  font-size: 28px;
  font-weight: bold;
  color: #f9a61d;
  background-color: #33308e;
  padding: 10px;
  line-height: 1.2;
  width: fit-content;
  margin: 20px auto;
}

.page-container {
  display: flex;
  gap: 20px;
  width: 100%;
}

.project-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  flex: 1;
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

/* Mobile styles */
@media (max-width: 768px) {
  .tag-container {
    display: none;
  }
  .project-container {
    flex-direction: column;
    gap: 15px;
  }
  .right {
    display: none;
  }
}

/* Styles untuk project cards (jika diperlukan override pada card internal) */
.project-container .projectcard {
  flex: 1 1 calc(50% - 20px);
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.project-container .projectcard:hover {
  transform: scale(1.05);
}
</style>
