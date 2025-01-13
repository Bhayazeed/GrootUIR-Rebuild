<template>
  <div class="project-header">
    <h1 class="project-title">Project</h1>
  </div>
  <div class="page-container">
    <div class="left">
      <div class="tag-container">
        <Tag :titles="tagTitle" />
      </div>
    </div>
    <div class="project-container">
      <Projectcard
        v-for="(project, index) in projects"
        :key="index"
        :image="project.image"
        :title="project.title"
        :description="project.description"
        :fullDescription="project.fullDescription"
        :tag="project.tag"
      />
    </div>
  </div>
</template>
<script setup>
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
    tag :"AI",
  },
  {
    image: img2,
    title: "Project 2",
    description: "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription: "This is the full article about Project 2. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag :"IOT",
  },
  {
    image: img3,
    title: "Project 3",
    description: "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription: "This is the full article about Project 3. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag :"ROBOTICS",
  },
  {
    image: img4,
    title: "Project 4",
    description: "Write an amazing description in this dedicated card section. Each word counts.",
    fullDescription: "This is the full article about Project 4. It provides detailed insights into the project's goals, implementation, and outcomes. Explore the complete story behind this amazing project here!",
    tag:"AUTOMATION"
  },
];
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
  flex-direction: row;
  justify-content: flex-start;
  gap: 20px;
  width: 100%;
}

.left {
  display: flex;
  flex-direction: column;
  gap: 20px;
  max-width: 300px;
}

.tag-container {
  width: 100%;
}

/* Hide tag on mobile */
@media (max-width: 768px) {
  .left {
    display: none;
  }
}

.project-container {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  width: 100%;
}

.project-container .projectcard {
  flex: 1 1 calc(50% - 20px);
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.project-container .projectcard:hover {
  transform: scale(1.05);
}

/* Responsive Styles */
@media (max-width: 768px) {
  .project-container {
    flex-direction: column;
    gap: 15px;
  }

  .project-container .projectcard {
    flex: 1 1 100%;
  }
}
</style>
