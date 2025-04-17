<template>
  <div class="main-project-card">
    <div class="image-frame">
      <img class="project-image" :src="image" :alt="title" />
    </div>
    <div class="project-details">
      <h3 class="project-title">{{ title }}</h3>
      <p class="project-description">{{ truncatedDescription }}</p>
      <button class="read-more-button" @click="onButtonClick">
        Read More
      </button>
      <div v-if="tag" class="project-tag">{{ tag }}</div>
    </div>
  </div>
</template>

<script setup>
import { computed } from "vue";
import { defineProps, defineEmits } from "vue";

const props = defineProps({
  image: String,
  title: String,
  description: String,
  tag: String,
});

const emit = defineEmits(["button-click"]);

const truncatedDescription = computed(() => {
  const maxLength = 73;
  return props.description.length > maxLength
    ? props.description.slice(0, maxLength) + "..."
    : props.description;
});

function onButtonClick() {
  emit("button-click");
}
</script>

<style scoped>
.main-project-card {
  width: 320px;
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  font-family: Arial, sans-serif;
  background-color: #f9f9f9;
  transition: all 0.3s ease-in-out;
  margin: 10px;
  display: flex;
  flex-direction: column;
}

.image-frame {
  padding: 10px;
  background-color: white;
  border-radius: 8px;
}

.project-image {
  width: 100%;
  height: 180px;
  object-fit: cover;
  border-radius: 5px;
}

.project-details {
  padding: 15px;
  display: flex;
  flex-direction: column;
}

.project-title {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
  color: #33308e;
}

.project-description {
  font-size: 14px;
  color: #555;
  margin-bottom: 10px;
  max-height: 100px; /* Limit the description height when collapsed */
  overflow: hidden; /* Hide overflow when collapsed */
}

.read-more-button {
  padding: 8px 16px;
  font-size: 14px;
  font-weight: bold;
  color: #33308e;
  background-color: transparent;
  border: 1px solid #f9a61d;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  align-self: flex-start;
}

.read-more-button:hover {
  background-color: #f9a61d;
  color: white;
}

/* Tag styles */
.project-tag {
  margin-top: 10px;
  padding: 5px 10px;
  background-color: #f9a61d;
  color: white;
  border-radius: 15px;
  font-size: 12px;
  font-weight: bold;
  align-self: flex-start;
}

/* Responsive Styles */

/* For smaller screens (tablets and mobile) */
@media (max-width: 768px) {
  .main-project-card {
    width: 100%;
    margin: 10px 0;
  }

  .project-image {
    height: 150px;
  }

  .project-title {
    font-size: 16px;
  }

  .project-description {
    font-size: 13px;
  }

  .read-more-button {
    font-size: 12px;
  }
}

/* For very small screens (phones) */
@media (max-width: 480px) {
  .main-project-card {
    width: 100%;
    margin: 5px 0;
  }

  .project-image {
    height: 130px;
  }

  .project-title {
    font-size: 14px;
  }

  .project-description {
    font-size: 12px;
  }

  .read-more-button {
    font-size: 10px;
  }
}
</style>
