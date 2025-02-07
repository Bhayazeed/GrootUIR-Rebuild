<template>
  <div class="recent-post">
    <h2 class="recent-post-title">
      <span class="title-bar"></span> RECENT POST
    </h2>
    <ul class="post-list">
      <li v-for="(postTitle, index) in titles" :key="index" class="post-item">
        <div class="post-content" @click="savePostUrl(postUrls[index])">
          <div
            class="post-image"
            :style="{ backgroundImage: `url(${images[index] || placeholderImage})` }"
          ></div>
          <p class="post-title">{{ postTitle }}</p>
        </div>
        <div v-if="index < titles.length - 1" class="divider"></div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { defineProps, ref, defineEmits } from "vue";

// Mendefinisikan props
defineProps({
  titles: {
    type: Array,
    required: true,
    default: () => [],
  },
  images: {
    type: Array,
    required: false,
    default: () => [],
  },
  postUrls: {
    type: Array,
    required: true,
    default: () => [],
  },
});

// Mendefinisikan emit untuk mengirim event ke komponen induk
const emit = defineEmits(["click"]);

const placeholderImage = "https://via.placeholder.com/60"; // Gambar cadangan

// Fungsi untuk memancarkan URL ketika postingan diklik
const savePostUrl = (url) => {
  emit("click", url);
};
</script>

<style scoped>
.recent-post {
  width: 100%;
  max-width: 400px;
  margin: 0 auto;
}

.recent-post-title {
  display: flex;
  align-items: center;
  font-size: 1.5rem;
  font-weight: bold;
  color: #ff9900;
  margin-bottom: 20px;
}

.title-bar {
  width: 5px;
  height: 30px;
  background-color: #33308e;
  margin-right: 10px;
}

.post-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.post-item {
  margin-bottom: 20px;
}

.post-content {
  display: flex;
  align-items: center;
  cursor: pointer;
}

.post-image {
  width: 60px;
  height: 60px;
  background-color: #d3d3d3;
  background-size: cover;
  background-position: center;
  margin-right: 15px;
  flex-shrink: 0;
  border-radius: 8px;
}

.post-title {
  font-size: 1rem;
  font-weight: bold;
  color: #33308e;
  margin: 0;
}

.divider {
  height: 1px;
  background-color: #d3d3d3;
  margin: 15px 0;
}
</style>
