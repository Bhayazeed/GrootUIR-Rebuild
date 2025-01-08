<template>
    <div class="card">
      <!-- Top Blue Section -->
      <div class="card-header"></div>
  
      <!-- Date Badge -->
      <div class="date-badge">
        <p class="date-day">{{ day }}</p>
        <p class="date-month">{{ month }}</p>
      </div>
  
      <!-- Title and Description -->
      <div class="card-content">
        <slot name="title">
          <h2 class="card-title">{{ title }}</h2>
        </slot>
        <slot name="description">
          <p class="card-description">{{ description }}</p>
        </slot>
      </div>
  
      <!-- Read More Button -->
      <div class="card-footer">
        <slot name="button">
          <button class="read-more-btn">{{ buttonText }}</button>
        </slot>
      </div>
    </div>
  </template>
  
  <script setup>
  import { defineProps } from "vue";
  
  defineProps({
    day: {
      type: String,
      default: "01", // Default day
    },
    month: {
      type: String,
      default: "Jan", // Default month
    },
    title: {
      type: String,
      default: "Default Title", // Default title
    },
    description: {
      type: String,
      default: "Default description goes here.", // Default description
    },
    buttonText: {
      type: String,
      default: "Read More", // Default button text
    },
  });
  </script>
  
  <style scoped>
  /* Card Container */
  .card {
    width: 720px; /* Set width to 720px */
    height: 520px; /* Set height to 520px */
    border-radius: 16px; /* Slightly larger border radius */
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Stronger shadow */
    overflow: hidden;
    border: 1px solid #e5e5e5;
    background-color: white;
    position: relative;
  }
  
  /* Top Blue Section */
  .card-header {
    height: 275px; /* Set height of card header to 250px */
    background-color: #1e3a8a;
  }
  
  /* Date Badge */
  .date-badge {
    position: absolute;
    top: 210px; /* Adjusted for new header height */
    left: 24px;
    background-color: #33308e;
    color: white;
    width: 70px; /* Increased width */
    height: 80px; /* Increased height */
    border-radius: 10px; /* Larger border radius */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.2); /* Stronger shadow */
  }
  
  .date-day {
    font-size: 20px; /* Larger font size */
    font-weight: bold;
    margin: 0;
  }
  
  .date-month {
    font-size: 14px; /* Larger font size */
    text-transform: uppercase;
    margin: 0;
  }
  
  /* Card Content */
  .card-content {
    padding: 40px 24px 24px; /* Adjusted padding */
    text-align: left;
  }
  
  .card-title {
    font-size: 28px; /* Larger title font size */
    font-weight: bold;
    margin: 0 0 20px 0; /* Increased margin */
    color: #333333;
  }
  
  .card-description {
    font-size: 18px; /* Larger description font size */
    color: #666666;
    margin: 0;
    line-height: 1.5; /* Increased line height for better readability */
    max-height: 120px; /* Set a max height for the description */
    overflow: hidden; /* Hide overflowed text */
    text-overflow: ellipsis; /* Add ellipsis for overflowed text */
  }
  
  /* Card Footer (Button Section) */
  .card-footer {
    padding: 24px;
    text-align: left; /* Align text to the left */
  }
  
  /* Read More Button */
  .read-more-btn {
    padding: 12px 24px; /* Larger padding */
    font-size: 18px; /* Larger font size */
    font-weight: bold;
    color: #33308e;
    background-color: transparent;
    border: 1px solid #f9a61d;
    border-radius: 30px; /* Larger border radius */
    cursor: pointer;
    transition: all 0.3s ease-in-out;
    margin-left: 0; /* Align button to the left */
  }
  
  .read-more-btn:hover {
    background-color: #f9a61d;
    color: #ffffff;
  }
  </style>
  