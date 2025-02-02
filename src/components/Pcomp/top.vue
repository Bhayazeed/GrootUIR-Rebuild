<template>
  <div class="project-header">
    <h1 class="project-title">Project</h1>
  </div>
  <div class="page-container">
    <div class="project-container">
      <Projectcard
        v-for="(project, index) in filteredProjects"
        :key="index"
        :image="project.image"
        :title="project.title"
        :description="project.description"
        :fullDescription="project.fullDescription"
        :tag="project.tag"
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
    description: "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription: "This is the full article about Project 1. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag: "AI",
  },
  {
    image: img2,
    title: "Project 2",
    description: "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription: "This is the full article about Project 2. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag: "IOT",
  },
  {
    image: img3,
    title: "Project 3",
    description: "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription: "This is the full article about Project 3. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag: "ROBOTICS",
  },
  {
    image: img4,
    title: "Project 4",
    description: "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription: "This is the full article about Project 4. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag: "AUTOMATION",
  },
];

const selectedTag = ref(null);

// Filter projects based on selected tag
const filteredProjects = computed(() => {
  if (!selectedTag.value) return projects;
  return projects.filter((project) => project.tag === selectedTag.value);
});

// Method to handle tag selection
const filterProjects = (tag) => {
  selectedTag.value = tag;
};
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
  min-width: 500px; /* Menjaga agar konten tidak terlalu kecil */
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
