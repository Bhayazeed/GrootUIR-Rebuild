<template>
    <div :class="['card', { expanded: isExpanded }]">
      <div class="image-frame">
        <img class="card-image" :src="image" :alt="title" />
      </div>
      <div class="card-content">
        <h3 class="card-title">{{ title }}</h3>
        <p class="card-description">
          {{ isExpanded ? fullDescription : description }}
        </p>
        <button class="card-button" @click="toggleExpand">
          {{ isExpanded ? "Show Less" : "Read More" }}
        </button>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  import { defineProps } from "vue";
  
  defineProps({
    image: {
      type: String,
      required: true,
    },
    title: {
      type: String,
      required: true,
    },
    description: {
      type: String,
      required: true,
    },
    fullDescription: {
      type: String,
      required: true,
    },
  });
  
  const isExpanded = ref(false);
  
  function toggleExpand() {
    isExpanded.value = !isExpanded.value;
  }
  </script>
  
  <style scoped>
  .card {
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
    height: auto;
  }
  
  .card.expanded {
    width: 100%; /* Full width when expanded */
    max-width: 600px; /* Optional: Limit max width */
    height: auto; /* Adjust height for expanded content */
    padding: 20px; /* Add padding for better spacing */
  }
  
  .image-frame {
    padding: 10px;
    background-color: white;
    border: 1px solid #ddd;
    border-radius: 8px;
  }
  
  .card-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
    border-radius: 5px;
  }
  
  .card-content {
    padding: 15px;
    display: flex;
    flex-direction: column;
    flex-grow: 1; /* Allow content to grow */
  }
  
  .card-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  
  .card-description {
    font-size: 14px;
    color: #555;
    margin-bottom: 15px;
    flex-grow: 1;
    max-height: 200px; /* Limit the description height when collapsed */
    overflow: hidden; /* Hide overflow when collapsed */
  }
  
  .card-button {
    padding: 10px 20px;
    background-color: #5c6bc0;
    color: white;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s;
    margin-top: auto; /* Ensure button is at the bottom */
  }
  
  .card-button:hover {
    background-color: #3949ab;
  }
  
  /* Responsive Styles */
  
  /* For smaller screens (tablets and mobile) */
  @media (max-width: 768px) {
    .card {
      width: 100%;
      margin: 10px 0;
    }
  
    .card-image {
      height: 150px;
    }
  
    .card-title {
      font-size: 16px;
    }
  
    .card-description {
      font-size: 13px;
    }
  
    .card-button {
      padding: 8px 16px;
      font-size: 12px;
    }
  }
  
  /* For very small screens (phones) */
  @media (max-width: 480px) {
    .card {
      width: 100%;
      margin: 5px 0;
    }
  
    .card-image {
      height: 130px;
    }
  
    .card-title {
      font-size: 14px;
    }
  
    .card-description {
      font-size: 12px;
    }
  
    .card-button {
      padding: 6px 12px;
      font-size: 10px;
    }
  }
  </style>
  