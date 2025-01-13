<template>
    <div class="header-tag">
      <h2 class="tag-title">
        <span class="title-bar"></span> TAG
      </h2>
      <ul class="Tag-list">
        <li v-for="(tagTitle, index) in titles" :key="index" class="tag-item">
          <div class="tag-content">
            <p class="tag-title">{{ tagTitle }}</p>
          </div>
          <div v-if="index < titles.length - 1" class="divider"></div>
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from "vue";
  
  defineProps({
    titles: {
      type: Array,
      required: true,
      default: () => [],
    }
  });
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
    color: #ff9900; /* Orange color */
    margin-bottom: 20px;
    margin: 0;
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
    margin-bottom: 20px;
    color: #33308e;
  }
  
  .tag-content {
    display: flex;
    align-items: center;
  }
  
  
  .divider {
    height: 1px;
    background-color: #d3d3d3; /* Light gray line */
    margin: 10px 0;
  }
  </style>
  