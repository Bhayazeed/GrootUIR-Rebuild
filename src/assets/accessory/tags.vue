<template>
  <div class="header-tag">
    <h2 class="tag-title">
      <span class="title-bar"></span> TAG
    </h2>
    <ul class="tag-list">
      <li
        v-for="(tagTitle, index) in titles"
        :key="index"
        class="tag-item"
        :class="{ active: selectedTag === tagTitle }"
        @click="selectTag(tagTitle)"
      >
        <div class="tag-content">
          <p class="tag-title">{{ tagTitle }}</p>
        </div>
        <div v-if="index < titles.length - 1" class="divider"></div>
      </li>
    </ul>
  </div>
</template>

<script setup>
import { defineProps, defineEmits, ref } from "vue";

const props = defineProps({
  titles: {
    type: Array,
    required: true,
    default: () => [],
  },
});

const emit = defineEmits(["tagSelected"]);
const selectedTag = ref(null);

const selectTag = (tag) => {
  selectedTag.value = selectedTag.value === tag ? null : tag; // Klik ulang untuk reset filter
  emit("tagSelected", selectedTag.value);
};
</script>

<style scoped>
.header-tag {
  width: 100%;
  max-width: 400px;
  margin: 0 auto;
}

.tag-title {
  display: flex;
  align-items: center;
  font-size: 1rem;
  font-weight: bold;
  color: #ff9900; /* Orange */
  margin-bottom: 20px;
}

.title-bar {
  width: 5px;
  height: 30px;
  background-color: #33308e; /* Dark purple */
  margin-right: 10px;
}

.tag-list {
  list-style: none;
  padding: 0;
  margin: 0;
}

.tag-item {
  padding: 10px;
  cursor: pointer;
  color: #33308e;
  border-radius: 5px; /* Membuat sudut sedikit membulat */
  transition: background-color 0.3s ease, color 0.3s ease;
}

.tag-item:hover {
  background-color: #e0e0e0; /* Efek hover */
}

.tag-item.active {
  background-color: #33308e; /* Warna saat aktif */
  color: white;
  font-weight: bold;
}
  
.divider {
  height: 1px;
  background-color: #d3d3d3; /* Light gray */
  margin: 10px 0;
}
</style>
