<template>
  <div class="card" :class="customClass">
    <!-- Top Section -->
    <div
      class="card-header"
      :style="{ backgroundColor: headerColor, backgroundImage: image ? `url(${image})` : 'none' }"
    ></div>

    <!-- Date Badge -->
    <div v-if="showDateBadge" class="date-badge">
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
        <button v-if="buttonText" class="read-more-btn" @click="onButtonClick">
          {{ buttonText }}
        </button>
      </slot>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits } from "vue";

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
  customClass: {
    type: String,
    default: "", // Custom class for styling
  },
  headerColor: {
    type: String,
    default: "#1e3a8a", // Default header background color
  },
  image: {
    type: String,
    default: "", // Optional image for the header
  },
  showDateBadge: {
    type: Boolean,
    default: true, // Whether to show the date badge
  },
});

const emit = defineEmits(["button-click"]);

function onButtonClick() {
  emit("button-click");
}
</script>

<style scoped>
/* Card Container */
.card {
  width: 320px;
  border-radius: 12px;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  border: 1px solid #e5e5e5;
  background-color: white;
  position: relative;
}

/* Top Section */
.card-header {
  height: 190px;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

/* Date Badge */
.date-badge {
  position: absolute;
  top: 160px;
  left: 16px;
  background-color: #33308e;
  color: #ffffff;
  width: 48px;
  height: 60px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
}

.date-day {
  font-size: 14px;
  font-weight: bold;
  margin: 0;
}

.date-month {
  font-size: 10px;
  text-transform: uppercase;
  margin: 0;
}

/* Card Content */
.card-content {
  padding: 32px 16px 16px;
  text-align: left;
}

.card-title {
  font-size: 16px;
  font-weight: bold;
  margin: 0 0 8px 0;
  color: #33308e ;
}

.card-description {
  font-size: 14px;
  color: #1C1C1C;
  margin: 0;
}

/* Card Footer (Button Section) */
.card-footer {
  padding: 16px;
  text-align: center;
}

.read-more-btn {
  padding: 8px 16px;
  font-size: 14px;
  font-weight: bold;
  color: #33308e;
  background-color: transparent;
  border: 1px solid #f9a61d;
  border-radius: 20px;
  cursor: pointer;
  transition: all 0.3s ease-in-out;
  position: absolute;
  left: 5%;
  bottom: 4px;
}

.read-more-btn:hover {
  background-color: #f9a61d;
  color: #ffffff;
}
</style>
